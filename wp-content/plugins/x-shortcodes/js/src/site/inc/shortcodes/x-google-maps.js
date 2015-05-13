// =============================================================================
// JS/SRC/SITE/INC/SHORTCODES/X-GOOGLE-MAPS.JS
// -----------------------------------------------------------------------------
// X data attribute API shortcode information.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. API Level Function
//   02. Google Maps
//   03. Google Maps Marker
//   04. Widgetbar Adjustment
// =============================================================================

// API Level Function
// =============================================================================

xData.fn.setMarkers = function(googleMap, googleMapID) {

  var googleMarkers     = [];
  var googleInfoWindows = [];
  var mapContainerID    = $('#' + googleMapID).parent().attr('id');

  $('#' + mapContainerID + ' .x-google-map-marker').each(function(i, e) {

    var params = $(e).data('x-params');

    googleMarkers[i] = new google.maps.Marker({
      map             : googleMap,
      position        : new google.maps.LatLng(params.lat, params.lng),
      infoWindowIndex : i,
      icon            : params.image
    });

    googleInfoWindows[i] = new google.maps.InfoWindow({
      content  : params.markerInfo,
      maxWidth : 200
    });

    google.maps.event.addListener(googleMarkers[i], 'click', function() {
      if ( params.markerInfo !== '' ) {
        googleInfoWindows[i].open(googleMap, this);
      }
    });

  });

};



// Google Maps
// =============================================================================

xData.api.map('google_map', function(element, params) {

  var $map            = $(element).find('.x-google-map-inner');
  var $mapID          = $map.attr('id');
  var $mapLat         = params.lat;
  var $mapLng         = params.lng;
  var $mapCoordinates = new google.maps.LatLng($mapLat, $mapLng);
  var $mapDrag        = params.drag;
  var $mapZoom        = parseInt(params.zoom);
  var $mapZoomControl = params.zoomControl;
  var $mapHue         = params.hue;

  var mapStyles = [
    {
      featureType : 'all',
      elementType : 'all',
      stylers     : [
        { hue : ( $mapHue ) ? $mapHue : null }
      ]
    },
    {
      featureType : 'water',
      elementType : 'all',
      stylers     : [
        { hue : ( $mapHue ) ? $mapHue : null },
        { saturation : 0  },
        { lightness  : 50 }
      ]
    },
    {
      featureType : 'poi',
      elementType : 'all',
      stylers     : [
        { visibility : 'off' }
      ]
    }
  ];

  var mapOptions = {
    scrollwheel            : false,
    draggable              : ( $mapDrag === true ),
    zoomControl            : ( $mapZoomControl === true ),
    disableDoubleClickZoom : false,
    disableDefaultUI       : true,
    zoom                   : $mapZoom,
    center                 : $mapCoordinates,
    mapTypeId              : google.maps.MapTypeId.ROADMAP
  };

  var googleStyledMap = new google.maps.StyledMapType(mapStyles, {name : 'Styled Map'});
  var googleMap       = new google.maps.Map(document.getElementById($mapID), mapOptions);
  googleMap.mapTypes.set('map_style', googleStyledMap);
  googleMap.setMapTypeId('map_style');

  if ( xData.fn.setMarkers ) {
    xData.fn.setMarkers(googleMap, $mapID);
  }

});



// Google Maps Marker
// =============================================================================

xData.api.map('google_map_marker', function(element, params) {
  // console.log( 'Map Marker Added: [LAT:' + params.lat + ', LNG:' + params.lng + ']' );
});



// Widgetbar Adjustment
// =============================================================================

$('.x-widgetbar').on('shown.bs.collapse', function() {
  if ( typeof google !== 'undefined' && google.hasOwnProperty('maps') ) {
    google.maps.event.trigger(window, 'resize', {});
  }
});