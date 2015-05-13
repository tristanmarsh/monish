<?php

// =============================================================================
// FUNCTIONS/ADMIN/SHORTCODE-GENERATOR/TEMPLATES.PHP
// -----------------------------------------------------------------------------
// Template file for our backbone views
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Modal
//   02. Default Window
// =============================================================================

// Modal Template
// =============================================================================

?>

<script type="text/html" id='tmpl-xsgModal'>
  <div class="xsg-modal">
    <header>
      <h1><?php _e( 'X &ndash; Shortcodes' , '__x__' ); ?></h1>
      <a class="xsg-modal-btn xsg-modal-toggle-advanced" href="#">
        <span class="dashicons dashicons-media-code"></span>
        <span class="tip"><?php _e( 'Toggle Advanced Controls' , '__x__' ); ?></span>
      </a>
      <a class="xsg-modal-btn xsg-modal-close" href="#">
        <span class="dashicons dashicons-no"></span>
      </a>
    </header>
    <div class="xsg-modal-content">
      <section class="xsg-modal-sidebar"></section>
      <section class="xsg-modal-main" role="main"></section>
    </div>
    <footer>
      <button id="btn-ok" disabled class="button button-primary button-large"><?php _e( 'Insert Shortcode' , '__x__' ); ?></button>
    </footer>
  </div>
  <div class="xsg-modal-backdrop">&nbsp;</div>
</script>



<?php

// Default Window
// =============================================================================

?>

<script type="text/html" id='tmpl-xsgDefaultWindow'>
  <div class="xsg-intro">
    <p><?php _e( 'Choose a Shortcode from the Sidebar to Get Started', '__x__' ); ?></p>
  </div>
</script>



<?php

// Preview
// =============================================================================

?>

<script type="text/html" id='tmpl-xsgPreview'>
  <h2 class="xsg-preview-title"><?php _e( 'Preview' , '__x__' ); ?></h2>
  <div class="xsg-preview-content">
    <p>
      <?php printf(
        __('You&apos;re using %s. Click the button below to check out a live example of the %s when using this Stack.','__x__'),
        '<strong>{{ data.activeStack }}</strong>',
        '<strong>{{ data.title }}</strong>'
      ); ?>
    </p>
    <p><a class="button" href="{{ data.activeDemo }}" target="_blank"><?php _e( 'Live Example' , '__x__' ); ?></a></p>
    <p><?php _e( 'Below are some additional examples of this shortcode when using different Stacks.' , '__x__' ); ?></p>
    <ul>
      <# _.each( data.otherDemos, function( demo ) { #>
        <li><a href="{{ demo.url }}" target="_blank">{{ demo.name }}</a></li>
      <# }); #>
    </ul>
  </div>
</script>



<?php

// Controls
// =============================================================================

?>

<script type="text/html" id='tmpl-xsgControlText'>
  <label for="param-{{ data.param_name }}"><strong>{{ data.heading }}</strong><span>{{ data.description }}</span></label>
  <input type="text" name="param-{{ data.param_name }}" id="param-{{ data.param_name }}" value="{{ data.value }}" size="30" />
</script>

<script type="text/html" id='tmpl-xsgControlTextArea'>
  <label for="param-{{ data.param_name }}"><strong>{{ data.heading }}</strong><span>{{ data.description }}</span></label>
  <textarea name="param-{{ data.param_name }}" id="param-{{ data.param_name }}" rows="8" cols="5"></textarea>
</script>

<script type="text/html" id='tmpl-xsgControlDropdown'>
  <label for="param-{{ data.param_name }}"><strong>{{ data.heading }}</strong><span>{{ data.description }}</span></label>
  <select name="param-{{ data.param_name }}" id="param-{{ data.param_name }}">
    <# _.each(data.value, function(option, name) { #>
      <option value="{{ option.value || option }}">{{ (option.value) ? name : option }} </option>
    <# }); #>
  </select>
</script>

<script type="text/html" id='tmpl-xsgControlCheckbox'>
  <label for="param-{{ data.param_name }}"><strong>{{ data.heading }}</strong><span>{{ data.description }}</span></label>
  <input type="checkbox" id="param-{{ data.param_name }}" name="param-{{ data.param_name }}" value="{{ data.value }}" />
</script>

<script type="text/html" id='tmpl-xsgControlColorpicker'>
  <label for="param-{{ data.param_name }}"><strong>{{ data.heading }}</strong><span>{{ data.description }}</span></label>
  <input type="text" name="param-{{ data.param_name }}" id="param-{{ data.param_name }}" class="wp-color-picker" value="" size="30" />
</script>

<script type="text/html" id='tmpl-xsgControlImageUpload'>
  <label for="param-{{ data.param_name }}"><strong>{{ data.heading }}</strong><span>{{ data.description }}</span></label>
  <div class="xsg-image-uploader">
    <a href="#" class="xsg-img-control set"><span class="dashicons dashicons-plus"></span></a>
    <a href="#" class="xsg-img-control remove hidden"><span class="dashicons dashicons-no"></span></a>
  </div>
  <input type="hidden" name="param-{{ data.param_name }}" id="param-{{ data.param_name }}" />
</script>