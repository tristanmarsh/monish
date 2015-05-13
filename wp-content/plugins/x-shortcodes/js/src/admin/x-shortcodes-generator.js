// =============================================================================
// JS/SRC/ADMIN/X-SHORTCODES-GENERATOR.JS
// -----------------------------------------------------------------------------
// Modal Controls
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Shortcode Model
//   02. Shortcode Collection
//   03. Modal View
//   0x. Controller
// =============================================================================

//
// =============================================================================

window.xsg = window.xsg || {};

(function( $, exports ){

	var Templates = [];

	$('script[data-xtemplate-name]').each(function(i,e) {
	  Templates[ $(e).data('xtemplate-name') ] = 	_.template( $(e).html() );
	});

	// Shortcode Model
	// =============================================================================

  var Shortcode = Backbone.Model.extend({
  	defaults: {
  		id: 'generic-shortcode',
  		title: 'Generic Shortcode',
  		icon: 'icon',
  		section: 'Generic',
  		description: 'A Shortcode Description',
  		params: [],
  	},

    setSelected:function() {
      this.collection.setSelected(this);
    }
  });



  // Shortcode Collection
  // =============================================================================

  var ShortcodeCollection = Backbone.Collection.extend({

    model: Shortcode,
  	url: window.xsg.data.shortcodeCollectionUrl,

    selected: null,

    initialize: function() {

    },

    section: function( section ) {

      bySection = this.filter( function( shortcode ) {
        return shortcode.get('section') === section;
      });

      return new ShortcodeCollection( bySection );
    },

    setSelected: function( shortcode ) {

      this.selected = shortcode;
      this.trigger('new_selection');

    }
  });

  // Control Model
  // =============================================================================

  var Control = Backbone.Model.extend({
    defaults: {
      param_name: 'generic-param',
      heading: 'Generic Control',
      description: 'This does something',
      type: 'Generic',
      default_value: "",
      value: null
    }
  });

  // Control Collection
  // =============================================================================

  var ControlCollection = Backbone.Collection.extend( { model: Control } );

  // Modal View
	// =============================================================================
  var ModalView = Backbone.View.extend({

    id: "xsgModal",
    className: "xsg",

    template: wp.template('xsgModal'),

  	events: {
  		"click .xsg-modal-close"           : "close" ,
      "click .xsg-modal-toggle-advanced" : "toggleAdvanced" ,
			"click #btn-ok"                    : "insertShortcode" ,
  	},

    controls: null,

  	initialize: function( options ) {
  		this.controller = options.controller;

      this.listenTo(this.collection, 'change:completed', this.render);
      this.listenTo(this.collection, 'reset', this.render);
      this.listenTo( this.collection, 'new_selection', this.setupControls );
      this.on('controls_ready', this.renderWindow);
      this.collection.fetch({reset: true});

      this.render();

  	},

  	render: function() {
  		this.$el.html( this.template() );

      this.$('.xsg-modal-sidebar').append( new NavView({ collection: this.collection }).render().$el );

      this.renderWindow();

      if (this.getAdvancedState()) {
        this.setAdvancedState( true );
      }
  		$( "body" ).append( this.$el ).css( { "overflow" : "hidden" } );
      this.$el.focus();

  		$( document ).on( "focusin" , function( e ){
        if ( this.$el[0] !== e.target && !this.$el.has( e.target ).length ) {
          this.$el.focus();
        }
      }.bind(this) );


  	},

    setupControls: function() {

      this.controls = new ControlCollection( this.collection.selected.get( 'params' ) );
      this.trigger( 'controls_ready' );
    },

    renderWindow: function() {

      if(this.collection.selected !== null) {
        this.$('#btn-ok').prop( 'disabled',false );
      }

      this.$('.xsg-modal-main').html( new WindowView({ collection: this.controls, shortcode: this.collection.selected }).render().$el );
    },

  	close: function( e ) {

      if (e) e.preventDefault();

      this.collection.selected = null;
  		this.undelegateEvents();

  		$( document ).off( "focusin", this.preserveFocus );
			$( "body" ).css( { "overflow" : "auto" } );

			this.remove();

			this.controller.deleteModal();
  	},

    toggleAdvanced: function( e ){

      if (e) e.preventDefault();
      this.setAdvancedState( !this.getAdvancedState());
    },

    getAdvancedState: function() {

      if(typeof(Storage) !== "undefined") {
        if (window.localStorage['xsg-advanced-mode'] === undefined) {
          window.localStorage['xsg-advanced-mode'] = false;
        }
        return (window.localStorage['xsg-advanced-mode'] == "true" );

      } else {
        return (this.$el.hasClass('xsg-advanced-enabled'));
      }

    },

    setAdvancedState: function( state ) {

      this.$('.xsg-modal-toggle-advanced').removeClass('active');
      this.$el.removeClass('xsg-advanced-enabled');

      if (state) {
        this.$('.xsg-modal-toggle-advanced').addClass('active');
        this.$el.addClass('xsg-advanced-enabled');
      }

      window.localStorage['xsg-advanced-mode'] = (state);

    },

    insertShortcode: function(){

      //
      // Summarize set controls
      //

      var atts = {};
      var content = '';
      this.controls.each(function(control){

        var data = control.get('data'),
            name = control.get('param_name');

        if ( data !== undefined && data != '' ) {

          if ( name == 'content' ) {
            content = data;
          } else {
            atts[name] = data;
          }

        }
      });

      //
      // Parse into shortcode syntax
      //

      var tag = this.collection.selected.get( 'id' );

      output = '[' + tag;
      closingTag = '';

      _(atts).each(function(value, name){
        output += ' '+name + '="' + value +'"';
      });

      output += ']';

      if (content) output += content;

      if (content || this.collection.selected.get( 'content_element' ) ) {

        closingTag = '[/' + tag + ']';
        output += closingTag;
      }

      console.log( "Inserting Shortcode: " + output );
      window.wp.media.editor.insert( output );
      this.close();
    }

  });

  // Window View
  // =============================================================================

  var WindowView = Backbone.View.extend({

    className: "xsg-modal-window",
    template: wp.template('xsgDefaultWindow'),

    initialize: function( options ) {
      this.shortcode = options.shortcode;
    },

    render: function() {

      if (this.shortcode == null) {
        this.$el.html( this.template() );
      }  else {
        this.$el.append( new ControlCollectionView({collection: this.collection }).render().$el );
        this.$el.append( new PreviewView( { model: this.shortcode } ).render().$el );
      }

      return this;

    }
  });

  var ControlCollectionView = Backbone.View.extend({

    className: "xsg-modal-controls",

    render: function(){
        this.collection.each( function( control ) {
          this.$el.append( ControlView.makeControl( control.get('type'), { model: control } ).render().$el );
        }, this );
        return this;
    },

  });

  var ControlView = Backbone.View.extend({

    className: "xsg-control",
    template: wp.template('xsgControlText'),

    renderSuper: function() {
      if (this.model.get('advanced') == true )
        this.$el.addClass('advanced');

      this.$el.html( this.template( this.model.toJSON() ) );

      return this;
    },

    render: function() {
      this.renderSuper();
      this.bindInput();
      return this;
    },

    bindInput: function() {

      var model = this.model;

      model.set( 'data', this.$( '#param-' + model.get('param_name') ).val() );

      this.$( '#param-' + model.get('param_name') ).on('change',function(){
        model.set( 'data', $(this).val() );
      });
    }
  },{

    makeControl: function( type, options ) {
      var View = (window.xsg.data.ControlTypes[type]) ? window.xsg.data.ControlTypes[type] : ControlView;
      return new View( options );
    }

  });

  var ControlTextView = ControlView.extend();

  var ControlTextAreaView = ControlView.extend({ template: wp.template('xsgControlTextArea') });

  var ControlCheckboxView = ControlView.extend({
    template: wp.template('xsgControlCheckbox'),

    bindInput: function() {

      var model = this.model;

      if (this.$( '#param-' + model.get('param_name') ).prop('checked')) {
        model.set( 'data', this.$( '#param-' + model.get('param_name') ).val() );
      }

      this.$( '#param-' + model.get('param_name') ).on('change',function(){
        if ($(this).prop('checked')) {
          model.set( 'data', $(this).val() );
        } else {
          model.unset( 'data' );
        }
      });

    }
  });

  var ControlDropdownView = ControlView.extend({
    template: wp.template('xsgControlDropdown'),

    initialize: function() {
      this.model.set('selected', this.model.get('default_value') || _(this.model.get('value')).find(function(){ return true; }) );
    }
  });


  var ControlImageUploadView = ControlView.extend({

    initialize: function() {
      ControlImageUploadView.createMediaFrame();
    },

    events: {
      'click a.xsg-img-control.set'    : 'setImage',
      'click a.xsg-img-control.remove' : 'removeImage',
    },

    template: wp.template('xsgControlImageUpload'),

    setImage: function(e) {

      if (e) e.preventDefault();

      var uploader = ControlImageUploadView.uploader;

      uploader.off( 'insert' );
      uploader.on( 'insert', function() {

        data = uploader.state().get( 'selection' ).first().toJSON();

        this.$('a.xsg-img-control.set').addClass('hidden');
        this.$('a.xsg-img-control.remove').removeClass('hidden');

        this.$('.xsg-image-uploader').css({ 'background-image': 'url('+ data.url +')' });
        this.$('input').val(data.url).change();

      }.bind( this ) );

      uploader.open();

    },

    removeImage: function(e) {

      if (e) e.preventDefault();

      this.$('a.xsg-img-control.set').removeClass('hidden');
      this.$('a.xsg-img-control.remove').addClass('hidden');

      this.$('.xsg-image-uploader').css({ 'background-image': 'none' });
      this.$('input').val('');
    }
  },{
    // Static methods

    uploader: null,

    createMediaFrame: function() {

      if ( this.uploader ==  null) {
        this.uploader = wp.media({ frame:    'post', state:    'insert', multiple: false });
      }

    }

  });


  var ControlColorpickerView = ControlView.extend({

    template: wp.template('xsgControlColorpicker'),

    render: function() {
      this.renderSuper();

      this.$('.wp-color-picker').wpColorPicker({ change: this.colorChange.bind(this) });

      return this;
    },

    colorChange: function( e, ui) {
      this.model.set('data', ui.color.toString() );
    },

    bindInput: function(){}

  });

  window.xsg.data.ControlTypes = {
    'textfield': ControlTextView,
    'textarea': ControlTextAreaView,
    'textarea_html': ControlTextAreaView,
    'dropdown': ControlDropdownView,
    'checkbox': ControlCheckboxView,
    'colorpicker': ControlColorpickerView,
    'attach_image': ControlImageUploadView,
  }


  //
  // Preview
  //

  var PreviewView = Backbone.View.extend({

    className: "xsg-preview",
    template: wp.template('xsgPreview'),

    initialize: function() {
      var demos = this.model.get('demos');

      otherDemos = [];

      _.chain(demos).omit(window.xsg.data['activeStack']).each(function(demo, name ){
        otherDemos.push({ name: window.xsg.data['stackNames'][name], url: demo });
      });

      this.data = {
        activeStack: window.xsg.data['stackNames'][window.xsg.data['activeStack']],
        activeDemo: demos[window.xsg.data['activeStack']],
        otherDemos: otherDemos
      }

    },

    render: function(){
      this.$el.html( this.template( _.extend( this.model.toJSON(), this.data ) ) );
      return this;
    }
  });


	// Navigation Views
	// =============================================================================

	var NavView = Backbone.View.extend({

    className: "xsg-navigation",

    events: {
      "click li.xsg-nav-item a" : "click"
    },

    render: function(){
      _(window.xsg.data.sectionNames).each(function(sectionName){

        this.$el.append('<h3>' + sectionName + '</h3>');
        this.$el.append( new NavSectionView( { collection: this.collection.section( sectionName ) } ).render().$el );

      }.bind(this));

      this.$el.accordion({ heightStyle: "content" });
      //this.$('.ui-accordion-header').hoverIntent( function() { $(this).click(); });

      return this;

    },

    click: function( e ) {
      this.$('li.xsg-nav-item a').removeClass( 'active' );
      this.$(e.target).addClass('active');
    }

	});

  var NavSectionView = Backbone.View.extend({

    className: "xsg-nav-section",

    render: function(){
        this.$el.append($('<ul></ul>'));
        this.collection.each( function( shortcode ) {
          this.$('ul').append( new NavItemView({model: shortcode}).render().$el );
        }, this );
        return this;
    },


  });

  var NavItemView = Backbone.View.extend({

    tagName: "li",
    events: {
      "click" : "click"
    },

    className: "xsg-nav-item",

    render: function() {
      this.$el.html( $('<a href="#">' + this.model.get('title') + '</a>') );
      return this;
    },

    click: function() { this.model.setSelected(); } //this.$el.addClass( 'active' ); }

  });

	// Controller
	// =============================================================================

  var shortcodes = new ShortcodeCollection();
  shortcodes.fetch( {reset: true } );

	var Controller = function( wrapper ) {

    $(document).on( 'click', '#xsg-media-modal-button', function(e){
      this.openModal();
    }.bind(this));

  }

  Controller.prototype.openModal = function() {
  	if ( this.modalView === undefined ) {
			this.modalView = new ModalView({ collection: shortcodes, controller: this });
		}
  }

  Controller.prototype.deleteModal = function() {
		this.modalView = undefined;
  }

  var controller = new Controller();

  exports.Controller = Controller;

})( jQuery, xsg );