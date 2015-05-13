<?php

// =============================================================================
// FUNCTIONS/ADMIN/MAP-SHORTCODES.PHP
// -----------------------------------------------------------------------------
// Register all X shortcodes.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Variables
//   02. Shortcodes
//   03. Defaults
// =============================================================================

// Variables
// =============================================================================

$param_icon_value        = array( 'glass', 'music', 'search', 'envelope-o', 'heart', 'star', 'star-o', 'user', 'film', 'th-large', 'th', 'th-list', 'check', 'times', 'search-plus', 'search-minus', 'power-off', 'signal', 'gear', 'cog', 'trash-o', 'home', 'file-o', 'clock-o', 'road', 'download', 'arrow-circle-o-down', 'arrow-circle-o-up', 'inbox', 'play-circle-o', 'rotate-right', 'repeat', 'refresh', 'list-alt', 'lock', 'flag', 'headphones', 'volume-off', 'volume-down', 'volume-up', 'qrcode', 'barcode', 'tag', 'tags', 'book', 'bookmark', 'print', 'camera', 'font', 'bold', 'italic', 'text-height', 'text-width', 'align-left', 'align-center', 'align-right', 'align-justify', 'list', 'dedent', 'outdent', 'indent', 'video-camera', 'photo', 'image', 'picture-o', 'pencil', 'map-marker', 'adjust', 'tint', 'edit', 'pencil-square-o', 'share-square-o', 'check-square-o', 'arrows', 'step-backward', 'fast-backward', 'backward', 'play', 'pause', 'stop', 'forward', 'fast-forward', 'step-forward', 'eject', 'chevron-left', 'chevron-right', 'plus-circle', 'minus-circle', 'times-circle', 'check-circle', 'question-circle', 'info-circle', 'crosshairs', 'times-circle-o', 'check-circle-o', 'ban', 'arrow-left', 'arrow-right', 'arrow-up', 'arrow-down', 'mail-forward', 'share', 'expand', 'compress', 'plus', 'minus', 'asterisk', 'exclamation-circle', 'gift', 'leaf', 'fire', 'eye', 'eye-slash', 'warning', 'exclamation-triangle', 'plane', 'calendar', 'random', 'comment', 'magnet', 'chevron-up', 'chevron-down', 'retweet', 'shopping-cart', 'folder', 'folder-open', 'arrows-v', 'arrows-h', 'bar-chart-o', 'twitter-square', 'facebook-square', 'camera-retro', 'key', 'gears', 'cogs', 'comments', 'thumbs-o-up', 'thumbs-o-down', 'star-half', 'heart-o', 'sign-out', 'linkedin-square', 'thumb-tack', 'external-link', 'sign-in', 'trophy', 'github-square', 'upload', 'lemon-o', 'phone', 'square-o', 'bookmark-o', 'phone-square', 'twitter', 'facebook', 'github', 'unlock', 'credit-card', 'rss', 'hdd-o', 'bullhorn', 'bell', 'certificate', 'hand-o-right', 'hand-o-left', 'hand-o-up', 'hand-o-down', 'arrow-circle-left', 'arrow-circle-right', 'arrow-circle-up', 'arrow-circle-down', 'globe', 'wrench', 'tasks', 'filter', 'briefcase', 'arrows-alt', 'group', 'users', 'chain', 'link', 'cloud', 'flask', 'cut', 'scissors', 'copy', 'files-o', 'paperclip', 'save', 'floppy-o', 'square', 'navicon', 'reorder', 'bars', 'list-ul', 'list-ol', 'strikethrough', 'underline', 'table', 'magic', 'truck', 'pinterest', 'pinterest-square', 'google-plus-square', 'google-plus', 'money', 'caret-down', 'caret-up', 'caret-left', 'caret-right', 'columns', 'unsorted', 'sort', 'sort-down', 'sort-desc', 'sort-up', 'sort-asc', 'envelope', 'linkedin', 'rotate-left', 'undo', 'legal', 'gavel', 'dashboard', 'tachometer', 'comment-o', 'comments-o', 'flash', 'bolt', 'sitemap', 'umbrella', 'paste', 'clipboard', 'lightbulb-o', 'exchange', 'cloud-download', 'cloud-upload', 'user-md', 'stethoscope', 'suitcase', 'bell-o', 'coffee', 'cutlery', 'file-text-o', 'building-o', 'hospital-o', 'ambulance', 'medkit', 'fighter-jet', 'beer', 'h-square', 'plus-square', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-double-down', 'angle-left', 'angle-right', 'angle-up', 'angle-down', 'desktop', 'laptop', 'tablet', 'mobile-phone', 'mobile', 'circle-o', 'quote-left', 'quote-right', 'spinner', 'circle', 'mail-reply', 'reply', 'github-alt', 'folder-o', 'folder-open-o', 'smile-o', 'frown-o', 'meh-o', 'gamepad', 'keyboard-o', 'flag-o', 'flag-checkered', 'terminal', 'code', 'mail-reply-all', 'reply-all', 'star-half-empty', 'star-half-full', 'star-half-o', 'location-arrow', 'crop', 'code-fork', 'unlink', 'chain-broken', 'question', 'info', 'exclamation', 'superscript', 'subscript', 'eraser', 'puzzle-piece', 'microphone', 'microphone-slash', 'shield', 'calendar-o', 'fire-extinguisher', 'rocket', 'maxcdn', 'chevron-circle-left', 'chevron-circle-right', 'chevron-circle-up', 'chevron-circle-down', 'html5', 'css3', 'anchor', 'unlock-alt', 'bullseye', 'ellipsis-h', 'ellipsis-v', 'rss-square', 'play-circle', 'ticket', 'minus-square', 'minus-square-o', 'level-up', 'level-down', 'check-square', 'pencil-square', 'external-link-square', 'share-square', 'compass', 'toggle-down', 'caret-square-o-down', 'toggle-up', 'caret-square-o-up', 'toggle-right', 'caret-square-o-right', 'euro', 'eur', 'gbp', 'dollar', 'usd', 'rupee', 'inr', 'cny', 'rmb', 'yen', 'jpy', 'ruble', 'rouble', 'rub', 'won', 'krw', 'bitcoin', 'btc', 'file', 'file-text', 'sort-alpha-asc', 'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-numeric-asc', 'sort-numeric-desc', 'thumbs-up', 'thumbs-down', 'youtube-square', 'youtube', 'xing', 'xing-square', 'youtube-play', 'dropbox', 'stack-overflow', 'instagram', 'flickr', 'adn', 'bitbucket', 'bitbucket-square', 'tumblr', 'tumblr-square', 'long-arrow-down', 'long-arrow-up', 'long-arrow-left', 'long-arrow-right', 'apple', 'windows', 'android', 'linux', 'dribbble', 'skype', 'foursquare', 'trello', 'female', 'male', 'gittip', 'sun-o', 'moon-o', 'archive', 'bug', 'vk', 'weibo', 'renren', 'pagelines', 'stack-exchange', 'arrow-circle-o-right', 'arrow-circle-o-left', 'toggle-left', 'caret-square-o-left', 'dot-circle-o', 'wheelchair', 'vimeo-square', 'turkish-lira', 'try', 'plus-square-o', 'space-shuttle', 'slack', 'envelope-square', 'wordpress', 'openid', 'institution', 'bank', 'university', 'mortar-board', 'graduation-cap', 'yahoo', 'google', 'reddit', 'reddit-square', 'stumbleupon-circle', 'stumbleupon', 'delicious', 'digg', 'pied-piper-square', 'pied-piper', 'pied-piper-alt', 'drupal', 'joomla', 'language', 'fax', 'building', 'child', 'paw', 'spoon', 'cube', 'cubes', 'behance', 'behance-square', 'steam', 'steam-square', 'recycle', 'automobile', 'car', 'cab', 'taxi', 'tree', 'spotify', 'deviantart', 'soundcloud', 'database', 'file-pdf-o', 'file-word-o', 'file-excel-o', 'file-powerpoint-o', 'file-photo-o', 'file-picture-o', 'file-image-o', 'file-zip-o', 'file-archive-o', 'file-sound-o', 'file-audio-o', 'file-movie-o', 'file-video-o', 'file-code-o', 'vine', 'codepen', 'jsfiddle', 'life-bouy', 'life-saver', 'support', 'life-ring', 'circle-o-notch', 'ra', 'rebel', 'ge', 'empire', 'git-square', 'git', 'hacker-news', 'tencent-weibo', 'qq', 'wechat', 'weixin', 'send', 'paper-plane', 'send-o', 'paper-plane-o', 'history', 'circle-thin', 'header', 'paragraph', 'sliders', 'share-alt', 'share-alt-square', 'bomb' );
$param_social_icon_value = array( 'thumb-up', 'thumb-down', 'rss', 'facebook', 'twitter', 'pinterest', 'github', 'path', 'linkedin', 'dribbble', 'stumble-upon', 'behance', 'reddit', 'google-plus', 'youtube', 'vimeo', 'flickr', 'slideshare', 'picassa', 'skype', 'steam', 'instagram', 'foursquare', 'delicious', 'chat', 'torso', 'tumblr', 'video-chat', 'digg', 'wordpress' );

sort( $param_icon_value );
sort( $param_social_icon_value );



// Shortcodes
// =============================================================================

//
// Content band.
//

xsg_map(
  array(
    'id'              => 'content_band',
    'title'           => __( 'Content Band', '__x__' ),
    'icon'            => 'content-band',
    'section'         => __( 'Structure', '__x__' ),
    'description'     => __( 'Place and structure your shortcodes inside of a row.', '__x__' ),
    'content_element' => true,
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/content-band/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/content-band/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/content-band/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/content-band/'
    ),
    'params' => array(
      array(
        'param_name'  => 'inner_container',
        'heading'     => __( 'Inner Container', '__x__' ),
        'description' => __( 'Select to insert a container inside of the content band. Use this instead of the [container] shortcode for greater flexibility and to contain multiple columns.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'no_margin',
        'heading'     => __( 'Remove Margin', '__x__' ),
        'description' => __( 'Select to remove the margin from the content band and stack them on top of each other.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'marginless_columns',
        'heading'     => __( 'Marginless Columns', '__x__' ),
        'description' => __( 'Select to make columns marginless.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'padding_top',
        'heading'     => __( 'Padding Top', '__x__' ),
        'description' => __( 'Set the top padding of the content band (leave blank to keep default).', '__x__' ),
        'type'        => 'textfield',
        'value'       => '0px'
      ),
      array(
        'param_name'  => 'padding_bottom',
        'heading'     => __( 'Padding Bottom', '__x__' ),
        'description' => __( 'Set the bottom padding of the content band (leave blank to keep default).', '__x__' ),
        'type'        => 'textfield',
        'value'       => '0px'
      ),
      array(
        'param_name'  => 'border',
        'heading'     => __( 'Border', '__x__' ),
        'description' => __( 'Select whether or not to display a border on your content band.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'None'       => 'none',
          'Top'        => 'top',
          'Left'       => 'left',
          'Right'      => 'right',
          'Bottom'     => 'bottom',
          'Horizontal' => 'horizontal',
          'Vertical'   => 'vertical',
          'All'        => 'all'
        )
      ),
      array(
        'param_name'  => 'bg_color',
        'heading'     => __( 'Background Color', '__x__' ),
        'description' => __( 'Select the background color of your content band (leave blank for "transparent").', '__x__' ),
        'type'        => 'colorpicker',
      ),
      array(
        'param_name'  => 'bg_pattern',
        'heading'     => __( 'Background Pattern', '__x__' ),
        'description' => __( 'Upload a background pattern to your content band.', '__x__' ),
        'type'        => 'attach_image',
      ),
      array(
        'param_name'  => 'bg_image',
        'heading'     => __( 'Background Image', '__x__' ),
        'description' => __( 'Upload a background image to your content band (this will overwrite your Background Pattern).', '__x__' ),
        'type'        => 'attach_image',
      ),
      array(
        'param_name'  => 'parallax',
        'heading'     => __( 'Parallax', '__x__' ),
        'description' => __( 'Select to activate the parallax effect with background patterns and images.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'bg_video',
        'heading'     => __( 'Background Video', '__x__' ),
        'description' => __( 'Include the path to your background video (this will overwrite both your Background Pattern and Background Image).', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'bg_video_poster',
        'heading'     => __( 'Background Video Poster', '__x__' ),
        'description' => __( 'Include a poster image for your background video on mobile devices.', '__x__' ),
        'type'        => 'attach_image',
      ),
      array(
        'param_name'  => 'class',
        'heading'     => __( 'Class', '__x__' ),
        'description' => __( '(Optional) Enter a unique class name.', '__x__' ),
        'type'        => 'textfield',
        'advanced'    => true
      ),
      xsg_map_default_style()
    )
  )
);


//
// Column.
//

xsg_map(
  array(
    'id'              => 'column',
    'title'           => __( 'Column', '__x__' ),
    'icon'            => 'column',
    'section'         => __( 'Structure', '__x__' ),
    'description'     => __( 'Create a custom layout with multiple columns.', '__x__' ),
    'content_element' => true,
    'js_view'         => 'VcColumnView',
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/columns/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/columns/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/columns/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/columns/'
    ),
    'params' => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Column Width', '__x__' ),
        'description' => __( 'Select how much space you want this column to fill.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'One Half'      => 'one-half',
          'One Third'     => 'one-third',
          'Two Thirds'    => 'two-thirds',
          'One Fourth'    => 'one-fourth',
          'Three Fourths' => 'three-fourths',
          'One Fifth'     => 'one-fifth',
          'Two Fifths'    => 'two-fifths',
          'Three Fifths'  => 'three-fifths',
          'Four Fifths'   => 'four-fifths',
        )
      ),
      array(
        'param_name'  => 'fade',
        'heading'     => __( 'Fade Effect', '__x__' ),
        'description' => __( 'Select to activate the fade effect.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'fade_animation',
        'heading'     => __( 'Fade Animation', '__x__' ),
        'description' => __( 'Select the type of fade animation you want to use.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'In'             => 'in',
          'In From Top'    => 'in-from-top',
          'In From Left'   => 'in-from-left',
          'In From Right'  => 'in-from-right',
          'In From Bottom' => 'in-from-bottom'
        )
      ),
      array(
        'param_name'  => 'fade_animation_offset',
        'heading'     => __( 'Fade Animation Offset', '__x__' ),
        'description' => __( 'Set how large you want the offset for your fade animation to be.', '__x__' ),
        'type'        => 'textfield',
        'value'       => '45px'
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style(),
    )
  )
);


//
// Horizontal rule.
//

xsg_map(
  array(
    'id'          => 'line',
    'title'       => __( 'Line', '__x__' ),
    'icon'        => 'line',
    'section'     => __( 'Structure', '__x__' ),
    'description' => __( 'Place a horizontal rule in your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/line/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/line/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/line/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/line/'
    ),
    'params' => array(
      xsg_map_default_id( array( 'advanced' => false ) ),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Gap.
//

xsg_map(
  array(
    'id'          => 'gap',
    'title'       => __( 'Gap', '__x__' ),
    'icon'        => 'gap',
    'section'     => __( 'Structure', '__x__' ),
    'description' => __( 'Insert a vertical gap in your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/gap/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/gap/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/gap/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/gap/'
    ),
    'params' => array(
      array(
        'param_name'  => 'size',
        'heading'     => __( 'Size', '__x__' ),
        'description' => __( 'Enter in the size of your gap. Pixels, ems, and percentages are all valid units of measurement.', '__x__' ),
        'type'        => 'textfield',
        'value'       => '1.313em'
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style(),
    )
  )
);


//
// Clear.
//

xsg_map(
  array(
    'id'          => 'clear',
    'title'       => __( 'Clear', '__x__' ),
    'icon'        => 'clear',
    'section'     => __( 'Structure', '__x__' ),
    'description' => __( 'Clear floated elements in your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/clear/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/clear/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/clear/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/clear/'
    ),
    'params' => array(
      xsg_map_default_id( array( 'advanced' => false) ),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


// //
// // Highlight.
// //

// xsg_map(
//   array(
//     'id'        => 'highlight',
//     'title'        => __( 'Highlight', '__x__' ),
//     'weight'      => 750,
//     'class'       => 'x-content-element x-content-element-highlight',
//     'icon'        => 'highlight',
//     'section'    => __( 'Typography', '__x__' ),
//     'description' => __( 'Highlight a selection of important text', '__x__' ),
//     'demos' => array(
    //'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/',
    //'renew' => 'http://theme.co/x/demo/renew/1/shortcodes/',
    //'icon' => 'http://theme.co/x/demo/icon/1/shortcodes/',
    //'ethos' => 'http://theme.co/x/demo/ethos/1/shortcodes/'
  //),
  //'params'      => array(
//       array(
//         'param_name'  => 'content',
//         'heading'     => __( 'Text', '__x__' ),
//         'description' => __( 'Enter your text.', '__x__' ),
//         'type'        => 'textarea_html',
//         'value'       => ''
//       ),
//       array(
//         'param_name'  => 'type',
//         'heading'     => __( 'Type', '__x__' ),
//         'description' => __( 'Select the highlight style.', '__x__' ),
//         'type'        => 'dropdown',
//         'value'       => array(
//           'Standard' => 'standard',
//           'Dark'     => 'dark'
//         )
//       ),
//       array(
//         'param_name'  => 'id',
//         'heading'     => __( 'ID', '__x__' ),
//         'description' => __( '(Optional) Enter a unique ID.', '__x__' ),
//         'type'        => 'textfield',
//
//       ),
//       array(
//         'param_name'  => 'class',
//         'heading'     => __( 'Class', '__x__' ),
//         'description' => __( '(Optional) Enter a unique class name.', '__x__' ),
//         'type'        => 'textfield',
//
//       ),
//       array(
//         'param_name'  => 'style',
//         'heading'     => __( 'Style', '__x__' ),
//         'description' => __( '(Optional) Enter inline CSS.', '__x__' ),
//         'type'        => 'textfield',
//
//       )
//     )
//   )
// );


//
// Blockquote.
//

xsg_map(
  array(
    'id'          => 'blockquote',
    'title'       => __( 'Blockquote', '__x__' ),
    'icon'        => 'blockquote',
    'section'     => __( 'Typography', '__x__' ),
    'description' => __( 'Include a blockquote in your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/blockquote/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/blockquote/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/blockquote/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/blockquote/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', '__x__' ),
        'description' => __( 'Enter your text.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'cite',
        'heading'     => __( 'Cite', '__x__' ),
        'description' => __( 'Cite the person you are quoting.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Alignment', '__x__' ),
        'description' => __( 'Select the alignment of the blockquote.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Left'   => 'left',
          'Center' => 'center',
          'Right'  => 'right'
        )
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Pullquote.
//

xsg_map(
  array(
    'id'          => 'pullquote',
    'title'       => __( 'Pullquote', '__x__' ),
    'icon'        => 'pullquote',
    'section'     => __( 'Typography', '__x__' ),
    'description' => __( 'Include a pullquote in your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/pullquote/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/pullquote/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/pullquote/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/pullquote/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', '__x__' ),
        'description' => __( 'Enter your text.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'cite',
        'heading'     => __( 'Cite', '__x__' ),
        'description' => __( 'Cite the person you are quoting.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Alignment', '__x__' ),
        'description' => __( 'Select the alignment of the pullquote.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Left'   => 'left',
          'Right'  => 'right'
        )
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style(),
    )
  )
);


//
// Alert.
//

xsg_map(
  array(
    'id'              => 'alert',
    'title'           => __( 'Alert', '__x__' ),
    'icon'            => 'alert',
    'section'         => __( 'Information', '__x__' ),
    'description'     => __( 'Provide information to users with alerts', '__x__' ),
    'content_element' => true,
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/alert/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/alert/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/alert/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/alert/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', '__x__' ),
        'description' => __( 'Enter your text.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'heading',
        'heading'     => __( 'Heading', '__x__' ),
        'description' => __( 'Enter the heading of your alert.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Type', '__x__' ),
        'description' => __( 'Select the alert style.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Success' => 'success',
          'Info'    => 'info',
          'Warning' => 'warning',
          'Danger'  => 'danger',
          'Muted'   => 'muted'
        )
      ),
      array(
        'param_name'  => 'close',
        'heading'     => __( 'Close', '__x__' ),
        'description' => __( 'Select to display the close button.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Map.
//

xsg_map(
  array(
    'id'          => 'map',
    'title'       => __( 'Map (Embed)', '__x__' ),
    'icon'        => 'map',
    'section'     => __( 'Media', '__x__' ),
    'description' => __( 'Embed a map from a third-party provider', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/map/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/map/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/map/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/map/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Code (See Notes Below)', '__x__' ),
        'description' => __( 'Switch to the "text" editor and do not place anything else here other than your &lsaquo;iframe&rsaquo; or &lsaquo;embed&rsaquo; code.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'no_container',
        'heading'     => __( 'No Container', '__x__' ),
        'description' => __( 'Select to remove the container around the map.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style(),
    )
  )
);


//
// Google map.
//

xsg_map(
  array(
    'id'              => 'google_map',
    'title'           => __( 'Google Map', '__x__' ),
    'weight'          => 530,
    'class'           => 'x-content-element x-content-element-google-map',
    'icon'            => 'google-map',
    'section'         => __( 'Media', '__x__' ),
    'description'     => __( 'Embed a customizable Google map', '__x__' ),
    'as_parent'       => array( 'only' => 'google_map_marker' ),
    'content_element' => true,
    'js_view'         => 'VcColumnView',
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/map/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/map/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/map/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/map/'
    ),
    'params' => array(
      array(
        'param_name'  => 'lat',
        'heading'     => __( 'Latitude', '__x__' ),
        'description' => __( 'Enter in the center latitude of your map.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'lng',
        'heading'     => __( 'Longitude', '__x__' ),
        'description' => __( 'Enter in the center longitude of your map.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'drag',
        'heading'     => __( 'Draggable', '__x__' ),
        'description' => __( 'Select to allow your users to drag the map view.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'zoom',
        'heading'     => __( 'Zoom Level', '__x__' ),
        'description' => __( 'Choose the initial zoom level of your map. This value should be between 1 and 18. 1 is fully zoomed out and 18 is right at street level.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'zoom_control',
        'heading'     => __( 'Zoom Control', '__x__' ),
        'description' => __( 'Select to activate the zoom control for the map.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'height',
        'heading'     => __( 'Height', '__x__' ),
        'description' => __( 'Choose an optional height for your map. If no height is selected, a responsive, proportional unit will be used. Any type of unit is acceptable (e.g. 450px, 30em, 40%, et cetera).', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'hue',
        'heading'     => __( 'Custom Color', '__x__' ),
        'description' => __( 'Choose an optional custom color for your map.', '__x__' ),
        'type'        => 'colorpicker',
      ),
      array(
        'param_name'  => 'no_container',
        'heading'     => __( 'No Container', '__x__' ),
        'description' => __( 'Select to remove the container around the map.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      xsg_map_default_class(),
      xsg_map_default_style(),
    )
  )
);


//
// Google map marker.
//

xsg_map(
  array(
    'id'              => 'google_map_marker',
    'title'           => __( 'Google Map Marker', '__x__' ),
    'weight'          => 530,
    'class'           => 'x-content-element x-content-element-google-map-marker',
    'icon'            => 'google-map-marker',
    'section'         => __( 'Media', '__x__' ),
    'description'     => __( 'Place a location marker on your Google map', '__x__' ),
    'as_child'        => array( 'only' => 'google_map' ),
    'content_element' => true,
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/map/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/map/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/map/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/map/'
    ),
    'params' => array(
      array(
        'param_name'  => 'lat',
        'heading'     => __( 'Latitude', '__x__' ),
        'description' => __( 'Enter in the latitude of your marker.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'lng',
        'heading'     => __( 'Longitude', '__x__' ),
        'description' => __( 'Enter in the longitude of your marker.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'info',
        'heading'     => __( 'Additional Information', '__x__' ),
        'description' => __( 'Optional description text to appear in a popup when your marker is clicked on.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'image',
        'heading'     => __( 'Custom Marker Image', '__x__' ),
        'description' => __( 'Utilize a custom marker image instead of the default provided by Google.', '__x__' ),
        'type'        => 'attach_image',
      ),
    )
  )
);


//
// Skill bar.
//

xsg_map(
  array(
    'id'          => 'skill_bar',
    'title'       => __( 'Skill Bar', '__x__' ),
    'icon'        => 'skill-bar',
    'section'     => __( 'Information', '__x__' ),
    'description' => __( 'Include an informational skill bar', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/skill-bar/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/skill-bar/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/skill-bar/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/skill-bar/'
    ),
    'params' => array(
      array(
        'param_name'  => 'heading',
        'heading'     => __( 'Heading', '__x__' ),
        'description' => __( 'Enter the heading of your skill bar.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'percent',
        'heading'     => __( 'Percent', '__x__' ),
        'description' => __( 'Enter the percentage of your skill and be sure to include the percentage sign (i.e. 90%).', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'bar_text',
        'heading'     => __( 'Bar Text', '__x__' ),
        'description' => __( 'Enter in some alternate text in place of the percentage inside the skill bar.', '__x__' ),
        'type'        => 'textfield',
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Code.
//

xsg_map(
  array(
    'id'          => 'code',
    'title'       => __( 'Code', '__x__' ),
    'icon'        => 'code',
    'section'     => __( 'Typography', '__x__' ),
    'description' => __( 'Add a block of example code to your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/code/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/code/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/code/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/code/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', '__x__' ),
        'description' => __( 'Enter your text.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Buttons.
//

xsg_map(
  array(
    'id'          => 'button',
    'title'       => __( 'Button', '__x__' ),
    'icon'        => 'x-button',
    'section'     => __( 'Marketing', '__x__' ),
    'description' => __( 'Add a clickable button to your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/buttons',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/buttons',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/buttons',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/buttons'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', '__x__' ),
        'description' => __( 'Enter your text.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => '',
      ),
      array(
        'param_name'  => 'shape',
        'heading'     => __( 'Shape', '__x__' ),
        'description' => __( 'Select the button shape.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Square'  => 'square',
          'Rounded' => 'rounded',
          'Pill'    => 'pill'
        )
      ),
      array(
        'param_name'  => 'size',
        'heading'     => __( 'Size', '__x__' ),
        'description' => __( 'Select the button size.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Mini'        => 'mini',
          'Small'       => 'small',
          'Standard'    => 'regular',
          'Large'       => 'large',
          'Extra Large' => 'x-large',
          'Jumbo'       => 'jumbo'
        )
      ),
      array(
        'param_name'  => 'float',
        'heading'     => __( 'Float', '__x__' ),
        'description' => __( 'Optionally float the button.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'None'  => 'none',
          'Left'  => 'left',
          'Right' => 'right'
        )
      ),
      array(
        'param_name'  => 'block',
        'heading'     => __( 'Block', '__x__' ),
        'description' => __( 'Select to make your button go fullwidth.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'circle',
        'heading'     => __( 'Marketing Circle', '__x__' ),
        'description' => __( 'Select to include a marketing circle around your button.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'icon_only',
        'heading'     => __( 'Icon Only', '__x__' ),
        'description' => __( 'Select if you are only using an icon in your button.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'href',
        'heading'     => __( 'Href', '__x__' ),
        'description' => __( 'Enter in the URL you want your button to link to.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', '__x__' ),
        'description' => __( 'Enter in the title attribute you want for your button (will also double as title for popover or tooltip if you have chosen to display one).', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'target',
        'heading'     => __( 'Target', '__x__' ),
        'description' => __( 'Select to open your button link in a new window.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'blank'
      ),
      array(
        'param_name'  => 'info',
        'heading'     => __( 'Info', '__x__' ),
        'description' => __( 'Select whether or not you want to add a popover or tooltip to your button.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'None'    => 'none',
          'Popover' => 'popover',
          'Tooltip' => 'tooltip'
        )
      ),
      array(
        'param_name'  => 'info_place',
        'heading'     => __( 'Info Placement', '__x__' ),
        'description' => __( 'Select where you want your popover or tooltip to appear.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Top'    => 'top',
          'Left'   => 'left',
          'Right'  => 'right',
          'Bottom' => 'bottom'
        )
      ),
      array(
        'param_name'  => 'info_trigger',
        'heading'     => __( 'Info Trigger', '__x__' ),
        'description' => __( 'Select what actions you want to trigger the popover or tooltip.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Hover' => 'hover',
          'Click' => 'click',
          'Focus' => 'focus'
        )
      ),
      array(
        'param_name'  => 'info_content',
        'heading'     => __( 'Info Content', '__x__' ),
        'description' => __( 'Extra content for the popover.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'lightbox_thumb',
        'heading'     => __( 'Lightbox Thumbnail', '__x__' ),
        'description' => __( 'Use this option to select a thumbnail for your lightbox thumbnail navigation or to set an image if you are linking out to a video.', '__x__' ),
        'type'        => 'attach_image',
      ),
      array(
        'param_name'  => 'lightbox_video',
        'heading'     => __( 'Lightbox Video', '__x__' ),
        'description' => __( 'Select if you are linking to a video from this button in the lightbox.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'lightbox_caption',
        'heading'     => __( 'Lightbox Caption', '__x__' ),
        'description' => __( 'Lightbox caption text.', '__x__' ),
        'type'        => 'textfield',
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


// //
// // Icons.
// //

// xsg_map(
//   array(
//     'id'        => 'icon',
//     'title'        => __( 'Icon', '__x__' ),
//     'weight'      => 790,
//     'class'       => 'x-content-element x-content-element-icon',
//     'icon'        => 'icon',
//     'section'    => __( 'Typography', '__x__' ),
//     'description' => __( 'Include a Font Awesome icon in your content', '__x__' ),
//     'demos' => array(
  //   'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/',
  //   'renew' => 'http://theme.co/x/demo/renew/1/shortcodes/',
  //   'icon' => 'http://theme.co/x/demo/icon/1/shortcodes/',
  //   'ethos' => 'http://theme.co/x/demo/ethos/1/shortcodes/'
  // ),
  // 'params'      => array(
//       array(
//         'param_name'  => 'type',
//         'heading'     => __( 'Type', '__x__' ),
//         'description' => __( 'Select your icon.', '__x__' ),
//         'type'        => 'dropdown',
//
//         'value'       => $param_icon_value
//       ),
//       array(
//         'param_name'  => 'id',
//         'heading'     => __( 'ID', '__x__' ),
//         'description' => __( '(Optional) Enter a unique ID.', '__x__' ),
//         'type'        => 'textfield',
//
//       ),
//       array(
//         'param_name'  => 'class',
//         'heading'     => __( 'Class', '__x__' ),
//         'description' => __( '(Optional) Enter a unique class name.', '__x__' ),
//         'type'        => 'textfield',
//
//       ),
//       array(
//         'param_name'  => 'style',
//         'heading'     => __( 'Style', '__x__' ),
//         'description' => __( '(Optional) Enter inline CSS.', '__x__' ),
//         'type'        => 'textfield',
//
//       )
//     )
//   )
// );


//
// Block grid.
//

xsg_map(
  array(
    'id'              => 'block_grid',
    'title'           => __( 'Block Grid', '__x__' ),
    'weight'          => 880,
    'class'           => 'x-content-element x-content-element-block-grid',
    'icon'            => 'block-grid',
    'section'         => __( 'Content', '__x__' ),
    'description'     => __( 'Include a block grid container in your content', '__x__' ),
    'as_parent'       => array( 'only' => 'block_grid_item' ),
    'content_element' => true,
    'js_view'         => 'VcColumnView',
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/block-grid/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/block-grid/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/block-grid/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/block-grid/'
    ),
    'params' => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Type', '__x__' ),
        'description' => __( 'Select how many block grid items you want per row.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Two'   => 'two-up',
          'Three' => 'three-up',
          'Four'  => 'four-up',
          'Five'  => 'five-up'
        )
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Block grid item.
//

xsg_map(
  array(
    'id'              => 'block_grid_item',
    'title'           => __( 'Block Grid Item', '__x__' ),
    'weight'          => 870,
    'class'           => 'x-content-element x-content-element-block-grid-item',
    'icon'            => 'block-grid-item',
    'section'         => __( 'Content', '__x__' ),
    'description'     => __( 'Include a block grid item in your block grid', '__x__' ),
    'as_child'        => array( 'only' => 'block_grid' ),
    'content_element' => true,
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/block-grid/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/block-grid/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/block-grid/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/block-grid/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', '__x__' ),
        'description' => __( 'Enter your text.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Images.
//

xsg_map(
  array(
    'id'          => 'image',
    'title'       => __( 'Image', '__x__' ),
    'icon'        => 'image',
    'section'     => __( 'Media', '__x__' ),
    'description' => __( 'Include an image in your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/images/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/images/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/images/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/images/'
    ),
    'params' => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Style', '__x__' ),
        'description' => __( 'Select the image style.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'None'      => 'none',
          'Thumbnail' => 'thumbnail',
          'Rounded'   => 'rounded',
          'Circle'    => 'circle'
        )
      ),
      array(
        'param_name'  => 'float',
        'heading'     => __( 'Float', '__x__' ),
        'description' => __( 'Optionally float the image.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'None'  => 'none',
          'Left'  => 'left',
          'Right' => 'right'
        )
      ),
      array(
        'param_name'  => 'src',
        'heading'     => __( 'Src', '__x__' ),
        'description' => __( 'Enter your image.', '__x__' ),
        'type'        => 'attach_image',
      ),
      array(
        'param_name'  => 'alt',
        'heading'     => __( 'Alt', '__x__' ),
        'description' => __( 'Enter in the alt text for your image.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'link',
        'heading'     => __( 'Link', '__x__' ),
        'description' => __( 'Select to wrap your image in an anchor tag.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'href',
        'heading'     => __( 'Href', '__x__' ),
        'description' => __( 'Enter in the URL you want your image to link to. If using this image for a lightbox, enter the URL of your media here (e.g. YouTube embed URL, et cetera). Leave this field blank if you want to link to the image uploaded to the "Src" for your lightbox.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', '__x__' ),
        'description' => __( 'Enter in the title attribute you want for your image (will also double as title for popover or tooltip if you have chosen to display one).', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'target',
        'heading'     => __( 'Target', '__x__' ),
        'description' => __( 'Select to open your image link in a new window.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'blank'
      ),
      array(
        'param_name'  => 'info',
        'heading'     => __( 'Info', '__x__' ),
        'description' => __( 'Select whether or not you want to add a popover or tooltip to your image.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'None'    => 'none',
          'Popover' => 'popover',
          'Tooltip' => 'tooltip'
        )
      ),
      array(
        'param_name'  => 'info_place',
        'heading'     => __( 'Info Placement', '__x__' ),
        'description' => __( 'Select where you want your popover or tooltip to appear.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Top'    => 'top',
          'Left'   => 'left',
          'Right'  => 'right',
          'Bottom' => 'bottom'
        )
      ),
      array(
        'param_name'  => 'info_trigger',
        'heading'     => __( 'Info Trigger', '__x__' ),
        'description' => __( 'Select what actions you want to trigger the popover or tooltip.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Hover' => 'hover',
          'Click' => 'click',
          'Focus' => 'focus'
        )
      ),
      array(
        'param_name'  => 'info_content',
        'heading'     => __( 'Info Content', '__x__' ),
        'description' => __( 'Extra content for the popover.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'lightbox_thumb',
        'heading'     => __( 'Lightbox Thumbnail', '__x__' ),
        'description' => __( 'Use this option to select a different thumbnail for your lightbox thumbnail navigation or to set an image if you are linking out to a video. Will default to the "Src" image if nothing is set.', '__x__' ),
        'type'        => 'attach_image',
      ),
      array(
        'param_name'  => 'lightbox_video',
        'heading'     => __( 'Lightbox Video', '__x__' ),
        'description' => __( 'Select if you are linking to a video from this image in the lightbox.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'lightbox_caption',
        'heading'     => __( 'Lightbox Caption', '__x__' ),
        'description' => __( 'Lightbox caption text.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'id',
        'heading'     => __( 'ID', '__x__' ),
        'description' => __( '(Optional) Enter a unique ID.', '__x__' ),
        'type'        => 'textfield',

      ),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Icon list.
//

xsg_map(
  array(
    'id'              => 'icon_list',
    'title'           => __( 'Icon List', '__x__' ),
    'weight'          => 780,
    'class'           => 'x-content-element x-content-element-icon-list',
    'icon'            => 'icon-list',
    'section'         => __( 'Typography', '__x__' ),
    'description'     => __( 'Include an icon list in your content', '__x__' ),
    'as_parent'       => array( 'only' => 'icon_list_item' ),
    'content_element' => true,
    'js_view'         => 'VcColumnView',
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/icon-list/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/icon-list/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/icon-list/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/icon-list/'
    ),
    'params' => array(
      xsg_map_default_id( array( 'advanced' => false) ),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Icon list item.
//

xsg_map(
  array(
    'id'              => 'icon_list_item',
    'title'           => __( 'Icon List Item', '__x__' ),
    'weight'          => 770,
    'class'           => 'x-content-element x-content-element-icon-list-item',
    'icon'            => 'icon-list-item',
    'section'         => __( 'Typography', '__x__' ),
    'description'     => __( 'Include an icon list item in your icon list', '__x__' ),
    'as_child'        => array( 'only' => 'icon_list' ),
    'content_element' => true,
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/icon-list/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/icon-list/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/icon-list/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/icon-list/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', '__x__' ),
        'description' => __( 'Enter your text.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Type', '__x__' ),
        'description' => __( 'Select your icon.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => $param_icon_value
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


// //
// // Popovers and Tooltips.
// //

// xsg_map(
//   array(
//     'id'        => 'info',
//     'title'        => __( 'Info', '__x__' ),
//     'weight'      => 660,
//     'class'       => 'x-content-element x-content-element-info',
//     'icon'        => 'info',
//     'section'    => __( 'Information', '__x__' ),
//     'description' => __( 'Include a popover or tooltip in your content', '__x__' ),
//     'demos' => array(
  //   'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/',
  //   'renew' => 'http://theme.co/x/demo/renew/1/shortcodes/',
  //   'icon' => 'http://theme.co/x/demo/icon/1/shortcodes/',
  //   'ethos' => 'http://theme.co/x/demo/ethos/1/shortcodes/'
  // ),
  // 'params'      => array(
//       array(
//         'param_name'  => 'content',
//         'heading'     => __( 'Text', '__x__' ),
//         'description' => __( 'Enter your text.', '__x__' ),
//         'type'        => 'textarea_html',
//
//         'value'       => ''
//       ),
//       array(
//         'param_name'  => 'href',
//         'heading'     => __( 'Href', '__x__' ),
//         'description' => __( 'Enter in the URL you want to link to.', '__x__' ),
//         'type'        => 'textfield',
//
//       ),
//       array(
//         'param_name'  => 'title',
//         'heading'     => __( 'Title', '__x__' ),
//         'description' => __( 'Enter in the title you want to use', '__x__' ),
//         'type'        => 'textfield',
//
//       ),
//       array(
//         'param_name'  => 'target',
//         'heading'     => __( 'Target', '__x__' ),
//         'description' => __( 'Select to open your link in a new window.', '__x__' ),
//         'type'        => 'checkbox',
//
//         'value'       => array(
//           '' => 'blank'
//         )
//       ),
//       array(
//         'param_name'  => 'info',
//         'heading'     => __( 'Info', '__x__' ),
//         'description' => __( 'Select whether or not you want to use a popover or tooltip.', '__x__' ),
//         'type'        => 'dropdown',
//
//         'value'       => array(
//           'Popover' => 'popover',
//           'Tooltip' => 'tooltip'
//         )
//       ),
//       array(
//         'param_name'  => 'info_place',
//         'heading'     => __( 'Info Placement', '__x__' ),
//         'description' => __( 'Select where you want your popover or tooltip to appear.', '__x__' ),
//         'type'        => 'dropdown',
//
//         'value'       => array(
//           'Hover' => 'hover',
//           'Click' => 'click',
//           'Focus' => 'focus'
//         )
//       ),
//       array(
//         'param_name'  => 'info_trigger',
//         'heading'     => __( 'Info Trigger', '__x__' ),
//         'description' => __( 'Select what actions you want to trigger the popover or tooltip.', '__x__' ),
//         'type'        => 'dropdown',
//
//         'value'       => array(
//           'Hover' => 'hover',
//           'Click' => 'click',
//           'Focus' => 'focus'
//         )
//       ),
//       array(
//         'param_name'  => 'info_content',
//         'heading'     => __( 'Info Content', '__x__' ),
//         'description' => __( 'Extra content for the popover.', '__x__' ),
//         'type'        => 'textfield',
//
//       ),
//       array(
//         'param_name'  => 'id',
//         'heading'     => __( 'ID', '__x__' ),
//         'description' => __( '(Optional) Enter a unique ID.', '__x__' ),
//         'type'        => 'textfield',
//
//       ),
//       array(
//         'param_name'  => 'class',
//         'heading'     => __( 'Class', '__x__' ),
//         'description' => __( '(Optional) Enter a unique class name.', '__x__' ),
//         'type'        => 'textfield',
//
//       ),
//       array(
//         'param_name'  => 'style',
//         'heading'     => __( 'Style', '__x__' ),
//         'description' => __( '(Optional) Enter inline CSS.', '__x__' ),
//         'type'        => 'textfield',
//
//       )
//     )
//   )
// );


//
// Text columns.
//

xsg_map(
  array(
    'id'          => 'columnize',
    'title'       => __( 'Columnize', '__x__' ),
    'icon'        => 'columnize',
    'section'     => __( 'Content', '__x__' ),
    'description' => __( 'Split your text into multiple columns', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/columnize/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/columnize/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/columnize/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/columnize/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', '__x__' ),
        'description' => __( 'Enter your text.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Video player.
//

xsg_map(
  array(
    'id'          => 'x_video_player',
    'title'       => __( 'Video (Self Hosted)', '__x__' ),
    'icon'        => 'x-video-player',
    'section'     => __( 'Media', '__x__' ),
    'description' => __( 'Include responsive video into your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/responsive-video/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/responsive-video/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/responsive-video/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/responsive-video/'
    ),
    'params' => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Aspect Ratio', '__x__' ),
        'description' => __( 'Select your aspect ratio.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          '16:9' => '16:9',
          '5:3'  => '5:3',
          '5:4'  => '5:4',
          '4:3'  => '4:3',
          '3:2'  => '3:2'
        )
      ),
      array(
        'param_name'  => 'm4v',
        'heading'     => __( 'M4V', '__x__' ),
        'description' => __( 'Include and .m4v version of your video.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'ogv',
        'heading'     => __( 'OGV', '__x__' ),
        'description' => __( 'Include and .ogv version of your video for additional native browser support.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'poster',
        'heading'     => __( 'Poster Image', '__x__' ),
        'description' => __( 'Include a poster image for your self-hosted video.', '__x__' ),
        'type'        => 'attach_image',
      ),
      array(
        'param_name'  => 'advanced_controls',
        'heading'     => __( 'Advanced Controls', '__x__' ),
        'description' => __( 'Select to enable advanced controls on your self-hosted video.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'hide_controls',
        'heading'     => __( 'Hide Controls', '__x__' ),
        'description' => __( 'Select to hide the controls on your self-hosted video.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'autoplay',
        'heading'     => __( 'Autoplay', '__x__' ),
        'description' => __( 'Select to automatically play your self-hosted video.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'no_container',
        'heading'     => __( 'No Container', '__x__' ),
        'description' => __( 'Select to remove the container around the video.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Video embed.
//

xsg_map(
  array(
    'id'          => 'x_video_embed',
    'title'       => __( 'Video (Embedded)', '__x__' ),
    'icon'        => 'x-video-embed',
    'section'     => __( 'Media', '__x__' ),
    'description' => __( 'Include responsive video into your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/responsive-video/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/responsive-video/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/responsive-video/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/responsive-video/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Code (See Notes Below)', '__x__' ),
        'description' => __( 'Switch to the "text" editor and do not place anything else here other than your &lsaquo;iframe&rsaquo; or &lsaquo;embed&rsaquo; code.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Aspect Ratio', '__x__' ),
        'description' => __( 'Select your aspect ratio.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          '16:9' => '16:9',
          '5:3'  => '5:3',
          '5:4'  => '5:4',
          '4:3'  => '4:3',
          '3:2'  => '3:2'
        )
      ),
      array(
        'param_name'  => 'no_container',
        'heading'     => __( 'No Container', '__x__' ),
        'description' => __( 'Select to remove the container around the video.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Accordion.
//

xsg_map(
  array(
    'id'              => 'accordion',
    'title'           => __( 'Accordion', '__x__' ),
    'weight'          => 930,
    'class'           => 'x-content-element x-content-element-accordion',
    'icon'            => 'accordion',
    'section'         => __( 'Content', '__x__' ),
    'description'     => __( 'Include an accordion into your content', '__x__' ),
    'as_parent'       => array( 'only' => 'accordion_item' ),
    'content_element' => true,
    'js_view'         => 'VcColumnView',
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/accordion/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/accordion/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/accordion/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/accordion/'
    ),
    'params' => array(
      xsg_map_default_id( array( 'advanced' => false) ),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Accordion item.
//

xsg_map(
  array(
    'id'              => 'accordion_item',
    'title'           => __( 'Accordion Item', '__x__' ),
    'weight'          => 940,
    'class'           => 'x-content-element x-content-element-accordion-item',
    'icon'            => 'accordion-item',
    'section'         => __( 'Content', '__x__' ),
    'description'     => __( 'Include an accordion item in your accordion', '__x__' ),
    'as_child'        => array( 'only' => 'accordion' ),
    'content_element' => true,
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/accordion/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/accordion/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/accordion/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/accordion/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', '__x__' ),
        'description' => __( 'Enter your text.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'parent_id',
        'heading'     => __( 'Parent ID', '__x__' ),
        'description' => __( 'Optionally include an ID given to the parent accordion to only allow one toggle to be open at a time.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', '__x__' ),
        'description' => __( 'Include a title for your accordion item.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'open',
        'heading'     => __( 'Open', '__x__' ),
        'description' => __( 'Select for your accordion item to be open by default.', '__x__' ),
        'type'        => 'checkbox',

        'value'       => 'true'
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Tab nav.
//

xsg_map(
  array(
    'id'              => 'tab_nav',
    'title'           => __( 'Tab Nav', '__x__' ),
    'weight'          => 920,
    'class'           => 'x-content-element x-content-element-tab-nav',
    'icon'            => 'tab-nav',
    'section'         => __( 'Content', '__x__' ),
    'description'     => __( 'Include a tab nav into your content', '__x__' ),
    'as_parent'       => array( 'only' => 'tab_nav_item' ),
    'content_element' => true,
    'js_view'         => 'VcColumnView',
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/tabbed-content/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/tabbed-content/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/tabbed-content/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/tabbed-content/'
    ),
    'params' => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Tab Nav Items Per Row', '__x__' ),
        'description' => __( 'If your tab nav is on top, select how many tab nav items you want per row.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Two'   => 'two-up',
          'Three' => 'three-up',
          'Four'  => 'four-up',
          'Five'  => 'five-up'
        )
      ),
      array(
        'param_name'  => 'float',
        'heading'     => __( 'Tab Nav Position', '__x__' ),
        'description' => __( 'Select the position of your tab nav.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'None'  => 'none',
          'Left'  => 'left',
          'Right' => 'right'
        )
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Tab nav item.
//

xsg_map(
  array(
    'id'              => 'tab_nav_item',
    'title'           => __( 'Tab Nav Item', '__x__' ),
    'weight'          => 910,
    'class'           => 'x-content-element x-content-element-tab-nav-item',
    'icon'            => 'tab-nav-item',
    'section'         => __( 'Content', '__x__' ),
    'description'     => __( 'Include a tab nav item into your tab nav', '__x__' ),
    'as_child'        => array( 'only' => 'tab_nav' ),
    'content_element' => true,
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/tabbed-content/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/tabbed-content/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/tabbed-content/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/tabbed-content/'
    ),
    'params' => array(
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', '__x__' ),
        'description' => __( 'Include a title for your tab nav item.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'active',
        'heading'     => __( 'Active', '__x__' ),
        'description' => __( 'Select to make this tab nav item active.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Tabs.
//

xsg_map(
  array(
    'id'              => 'tabs',
    'title'           => __( 'Tabs', '__x__' ),
    'weight'          => 900,
    'class'           => 'x-content-element x-content-element-tabs',
    'icon'            => 'tabs',
    'section'         => __( 'Content', '__x__' ),
    'description'     => __( 'Include a tabs container after your tab nav', '__x__' ),
    'as_parent'       => array( 'only' => 'tab' ),
    'content_element' => true,
    'js_view'         => 'VcColumnView',
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/tabbed-content/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/tabbed-content/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/tabbed-content/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/tabbed-content/'
    ),
    'params' => array(
      array(
        'param_name'  => 'id',
        'heading'     => __( 'ID', '__x__' ),
        'description' => __( '(Optional) Enter a unique ID.', '__x__' ),
        'type'        => 'textfield',

      ),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Tab.
//

xsg_map(
  array(
    'id'              => 'tab',
    'title'           => __( 'Tab', '__x__' ),
    'weight'          => 890,
    'class'           => 'x-content-element x-content-element-tab',
    'icon'            => 'tab',
    'section'         => __( 'Content', '__x__' ),
    'description'     => __( 'Include a tab into your tabs container', '__x__' ),
    'as_child'        => array( 'only' => 'tabs' ),
    'content_element' => true,
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/tabbed-content/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/tabbed-content/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/tabbed-content/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/tabbed-content/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', '__x__' ),
        'description' => __( 'Enter your text.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'active',
        'heading'     => __( 'Active', '__x__' ),
        'description' => __( 'Select to make this tab active.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Responsive visibility.
//

xsg_map(
  array(
    'id'              => 'visibility',
    'title'           => __( 'Visibility', '__x__' ),
    'weight'          => 850,
    'class'           => 'x-content-element x-content-element-visibility',
    'icon'            => 'visibility',
    'section'         => __( 'Content', '__x__' ),
    'description'     => __( 'Alter content based on screen size', '__x__' ),
    'as_parent'       => array( 'only' => 'vc_row, line, gap, clear, highlight, container, blockquote, pullquote, alert, map, skill_bar, code, button, icon, block_grid, image, icon_list, info, columnize, x_video_player, x_video_embed, accordion, tab_nav, tabs, slider, protect, recent_posts, x_audio_player, x_audio_embed, pricing_table, callout, promo, lightbox, author, prompt, share, toc, custom_headline, social, feature_headline, responsive_text, search, text_output, rev_slider_vc, contact-form-7' ),
    'content_element' => true,
    'js_view'         => 'VcColumnView',
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/responsive-visibility/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/responsive-visibility/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/responsive-visibility/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/responsive-visibility/'
    ),
    'params' => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Visibility Type', '__x__' ),
        'description' => __( 'Select how you want to hide or show your content.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Hidden Phone'    => 'hidden-phone',
          'Hidden Tablet'   => 'hidden-tablet',
          'Hidden Desktop'  => 'hidden-desktop',
          'Visible Phone'   => 'visible-phone',
          'Visible Tablet'  => 'visible-tablet',
          'Visible Desktop' => 'visible-desktop'
        )
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Slider.
//

xsg_map(
  array(
    'id'              => 'slider',
    'title'           => __( 'Slider', '__x__' ),
    'weight'          => 590,
    'class'           => 'x-content-element x-content-element-slider',
    'icon'            => 'slider',
    'section'         => __( 'Media', '__x__' ),
    'description'     => __( 'Include a slider in your content', '__x__' ),
    'as_parent'       => array( 'only' => 'slide' ),
    'content_element' => true,
    'js_view'         => 'VcColumnView',
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/responsive-slider/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/responsive-slider/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/responsive-slider/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/responsive-slider/'
    ),
    'params' => array(
      array(
        'param_name'  => 'animation',
        'heading'     => __( 'Animation', '__x__' ),
        'description' => __( 'Select your slider animation.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Slide' => 'slide',
          'Fade'  => 'fade'
        )
      ),
      array(
        'param_name'  => 'slide_time',
        'heading'     => __( 'Slide Time', '__x__' ),
        'description' => __( 'The amount of time a slide will stay visible in milliseconds.', '__x__' ),
        'type'        => 'textfield',
        'value'       => '5000'
      ),
      array(
        'param_name'  => 'slide_speed',
        'heading'     => __( 'Slide Speed', '__x__' ),
        'description' => __( 'The amount of time to transition between slides in milliseconds.', '__x__' ),
        'type'        => 'textfield',
        'value'       => '650'
      ),
      array(
        'param_name'  => 'slideshow',
        'heading'     => __( 'Slideshow', '__x__' ),
        'description' => __( 'Select for your slides to advance automatically.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'random',
        'heading'     => __( 'Random', '__x__' ),
        'description' => __( 'Select to randomly display your slides each time the page loads.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'control_nav',
        'heading'     => __( 'Control Navigation', '__x__' ),
        'description' => __( 'Select to display the control navigation.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'prev_next_nav',
        'heading'     => __( 'Previous/Next Navigation', '__x__' ),
        'description' => __( 'Select to display the previous/next navigation.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'no_container',
        'heading'     => __( 'No Container', '__x__' ),
        'description' => __( 'Select to remove the container from your slider.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Slide.
//

xsg_map(
  array(
    'id'              => 'slide',
    'title'           => __( 'Slide', '__x__' ),
    'weight'          => 600,
    'class'           => 'x-content-element x-content-element-slide',
    'icon'            => 'slide',
    'section'         => __( 'Media', '__x__' ),
    'description'     => __( 'Include a slide into your slider', '__x__' ),
    'as_child'        => array( 'only' => 'slider' ),
    'content_element' => true,
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/responsive-slider/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/responsive-slider/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/responsive-slider/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/responsive-slider/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', '__x__' ),
        'description' => __( 'Enter your text.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Protected content.
//

xsg_map(
  array(
    'id'          => 'protect',
    'title'       => __( 'Protect', '__x__' ),
    'icon'        => 'protect',
    'section'     => __( 'Content', '__x__' ),
    'description' => __( 'Protect content from non logged in users', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/protected-content/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/protected-content/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/protected-content/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/protected-content/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', '__x__' ),
        'description' => __( 'Enter your text.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Recent posts.
//

xsg_map(
  array(
    'id'          => 'recent_posts',
    'title'       => __( 'Recent Posts', '__x__' ),
    'icon'        => 'recent-posts',
    'section'     => __( 'Social', '__x__' ),
    'description' => __( 'Display your most recent posts', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/recent-posts/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/recent-posts/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/recent-posts/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/recent-posts/'
    ),
    'params' => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Post Type', '__x__' ),
        'description' => __( 'Choose between standard posts or portfolio posts.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Posts'     => 'post',
          'Portfolio' => 'portfolio'
        )
      ),
      array(
        'param_name'  => 'count',
        'heading'     => __( 'Post Count', '__x__' ),
        'description' => __( 'Select how many posts to display.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          '1' => '1',
          '2' => '2',
          '3' => '3',
          '4' => '4'
        )
      ),
      array(
        'param_name'  => 'offset',
        'heading'     => __( 'Offset', '__x__' ),
        'description' => __( 'Enter a number to offset initial starting post of your recent posts.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'section',
        'heading'     => __( 'Category', '__x__' ),
        'description' => __( 'To filter your posts by category, enter in the slug of your desired category. To filter by multiple categories, enter in your slugs separated by a comma.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'orientation',
        'heading'     => __( 'Orientation', '__x__' ),
        'description' => __( 'Select the orientation or your recent posts.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Horizontal' => 'horizontal',
          'Vertical'   => 'vertical'
        )
      ),
      array(
        'param_name'  => 'no_image',
        'heading'     => __( 'Remove Featured Image', '__x__' ),
        'description' => __( 'Select to remove the featured image.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'fade',
        'heading'     => __( 'Fade Effect', '__x__' ),
        'description' => __( 'Select to activate the fade effect.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Audio player.
//

xsg_map(
  array(
    'id'          => 'x_audio_player',
    'title'       => __( 'Audio (Self Hosted)', '__x__' ),
    'icon'        => 'x-audio-player',
    'section'     => __( 'Media', '__x__' ),
    'description' => __( 'Place audio files into your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/audio/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/audio/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/audio/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/audio/'
    ),
    'params' => array(
      array(
        'param_name'  => 'mp3',
        'heading'     => __( 'MP3', '__x__' ),
        'description' => __( 'Include and .mp3 version of your audio.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'oga',
        'heading'     => __( 'OGA', '__x__' ),
        'description' => __( 'Include and .oga version of your audio for additional native browser support.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'advanced_controls',
        'heading'     => __( 'Advanced Controls', '__x__' ),
        'description' => __( 'Select to enable advanced controls on your self-hosted audio.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Audio embed.
//

xsg_map(
  array(
    'id'          => 'x_audio_embed',
    'title'       => __( 'Audio (Embedded)', '__x__' ),
    'icon'        => 'x-audio-embed',
    'section'     => __( 'Media', '__x__' ),
    'description' => __( 'Place audio files into your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/audio/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/audio/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/audio/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/audio/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Code (See Notes Below)', '__x__' ),
        'description' => __( 'Switch to the "text" editor and do not place anything else here other than your &lsaquo;iframe&rsaquo; or &lsaquo;embed&rsaquo; code.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Pricing table.
//

xsg_map(
  array(
    'id'              => 'pricing_table',
    'title'           => __( 'Pricing Table', '__x__' ),
    'weight'          => 680,
    'class'           => 'x-content-element x-content-element-pricing-table',
    'icon'            => 'pricing-table',
    'section'         => __( 'Marketing', '__x__' ),
    'description'     => __( 'Include a pricing table in your content', '__x__' ),
    'as_parent'       => array( 'only' => 'pricing_table_column' ),
    'content_element' => true,
    'js_view'         => 'VcColumnView',
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/responsive-pricing-table/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/responsive-pricing-table/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/responsive-pricing-table/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/responsive-pricing-table/'
    ),
    'params' => array(
      array(
        'param_name'  => 'columns',
        'heading'     => __( 'Columns', '__x__' ),
        'description' => __( 'Select how many columns you want for your pricing table.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          '1' => '1',
          '2' => '2',
          '3' => '3',
          '4' => '4',
          '5' => '5'
        )
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Pricing table column.
//

xsg_map(
  array(
    'id'              => 'pricing_table_column',
    'title'           => __( 'Pricing Table Column', '__x__' ),
    'weight'          => 670,
    'class'           => 'x-content-element x-content-element-pricing-table-column',
    'icon'            => 'pricing-table-column',
    'section'         => __( 'Marketing', '__x__' ),
    'description'     => __( 'Include a pricing table column', '__x__' ),
    'as_child'        => array( 'only' => 'pricing_table' ),
    'content_element' => true,
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/responsive-pricing-table/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/responsive-pricing-table/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/responsive-pricing-table/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/responsive-pricing-table/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', '__x__' ),
        'description' => __( 'Enter your text.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', '__x__' ),
        'description' => __( 'Include a title for your pricing column.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'featured',
        'heading'     => __( 'Featured', '__x__' ),
        'description' => __( 'Select to make this your featured offer.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'featured_sub',
        'heading'     => __( 'Featured Sub Heading', '__x__' ),
        'description' => __( 'Include a sub heading for your featured column.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'currency',
        'heading'     => __( 'Currency Symbol', '__x__' ),
        'description' => __( 'Enter in the currency symbol you want to use.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'price',
        'heading'     => __( 'Price', '__x__' ),
        'description' => __( 'Enter in the price for this pricing column.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'interval',
        'heading'     => __( 'Interval', '__x__' ),
        'description' => __( 'Enter in the time period that this pricing column is for.', '__x__' ),
        'type'        => 'textfield',
        'value'       => 'Per Month'
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Callout.
//

xsg_map(
  array(
    'id'          => 'callout',
    'title'       => __( 'Callout', '__x__' ),
    'icon'        => 'callout',
    'section'     => __( 'Marketing', '__x__' ),
    'description' => __( 'Include a marketing callout into your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/callout/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/callout/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/callout/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/callout/'
    ),
    'params' => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Alignment', '__x__' ),
        'description' => __( 'Select the alignment for your callout.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Left'   => 'left',
          'Center' => 'center',
          'Right'  => 'right'
        )
      ),
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', '__x__' ),
        'description' => __( 'Enter the title for your callout.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'message',
        'heading'     => __( 'Message', '__x__' ),
        'description' => __( 'Enter the message for your callout.', '__x__' ),
        'type'        => 'textarea',

      ),
      array(
        'param_name'  => 'button_text',
        'heading'     => __( 'Button Text', '__x__' ),
        'description' => __( 'Enter the text for your callout button.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'button_icon',
        'heading'     => __( 'Button Icon', '__x__' ),
        'description' => __( 'Optionally enter the button icon.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => $param_icon_value
      ),
      array(
        'param_name'  => 'circle',
        'heading'     => __( 'Marketing Circle', '__x__' ),
        'description' => __( 'Select to include a marketing circle around your button.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'href',
        'heading'     => __( 'Href', '__x__' ),
        'description' => __( 'Enter in the URL you want your callout button to link to.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'target',
        'heading'     => __( 'Target', '__x__' ),
        'description' => __( 'Select to open your callout link button in a new window.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'blank'
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Promo.
//

xsg_map(
  array(
    'id'          => 'promo',
    'title'       => __( 'Promo', '__x__' ),
    'icon'        => 'promo',
    'section'     => __( 'Marketing', '__x__' ),
    'description' => __( 'Include a marketing promo in your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/promo/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/promo/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/promo/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/promo/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', '__x__' ),
        'description' => __( 'Enter your text.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'image',
        'heading'     => __( 'Promo Image', '__x__' ),
        'description' => __( 'Include an image for your promo element.', '__x__' ),
        'type'        => 'attach_image',
      ),
      array(
        'param_name'  => 'alt',
        'heading'     => __( 'Alt', '__x__' ),
        'description' => __( 'Enter in the alt text for your promo image.', '__x__' ),
        'type'        => 'textfield',
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Responsive lightbox.
//

xsg_map(
  array(
    'id'          => 'lightbox',
    'title'       => __( 'Responsive Lightbox', '__x__' ),
    'icon'        => 'lightbox',
    'section'     => __( 'Media', '__x__' ),
    'description' => __( 'Display images in a responsive lightbox', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/responsive-lightbox/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/responsive-lightbox/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/responsive-lightbox/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/responsive-lightbox/'
    ),
    'params' => array(
      array(
        'param_name'  => 'selector',
        'heading'     => __( 'Selector', '__x__' ),
        'description' => __( 'Enter in the selector for your images (e.g. if your class is "lightbox-img" enter ".lightbox-img"). Set to ".x-img-link" to automatically setup a lightbox for all linked [image] shortcodes on your page.', '__x__' ),
        'type'        => 'textfield',
        'value'       => '.x-img-link'
      ),
      array(
        'param_name'  => 'deeplink',
        'heading'     => __( 'Deeplink', '__x__' ),
        'description' => __( 'Select to activate deeplinking (creates unique link for each image).', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'opacity',
        'heading'     => __( 'Backdrop Opacity', '__x__' ),
        'description' => __( 'Enter in the opacity for the backdrop (valid inputs are numbers 0 to 1).', '__x__' ),
        'type'        => 'textfield',
        'value'       => '0.875'
      ),
      array(
        'param_name'  => 'prev_scale',
        'heading'     => __( 'Previous Item Scale', '__x__' ),
        'description' => __( 'Enter in the scale for the previous item (valid inputs are numbers 0 to 1).', '__x__' ),
        'type'        => 'textfield',
        'value'       => '0.75'
      ),
      array(
        'param_name'  => 'prev_opacity',
        'heading'     => __( 'Previous Item Opacity', '__x__' ),
        'description' => __( 'Enter in the opacity for the previous item (valid inputs are numbers 0 to 1).', '__x__' ),
        'type'        => 'textfield',
        'value'       => '0.75'
      ),
      array(
        'param_name'  => 'next_scale',
        'heading'     => __( 'Next Item Scale', '__x__' ),
        'description' => __( 'Enter in the scale for the next item (valid inputs are numbers 0 to 1).', '__x__' ),
        'type'        => 'textfield',
        'value'       => '0.75'
      ),
      array(
        'param_name'  => 'next_opacity',
        'heading'     => __( 'Next Item Opacity', '__x__' ),
        'description' => __( 'Enter in the opacity for the next item (valid inputs are numbers 0 to 1).', '__x__' ),
        'type'        => 'textfield',
        'value'       => '0.75'
      ),
      array(
        'param_name'  => 'orientation',
        'heading'     => __( 'Orientation', '__x__' ),
        'description' => __( 'Select the orientation of your lightbox.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Horizontal' => 'horizontal',
          'Vertical'   => 'vertical'
        )
      ),
      array(
        'param_name'  => 'thumbnails',
        'heading'     => __( 'Thumbnails', '__x__' ),
        'description' => __( 'Select to activate thumbnail navigation.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      )
    )
  )
);


//
// Post author.
//

xsg_map(
  array(
    'id'          => 'author',
    'title'       => __( 'Author', '__x__' ),
    'icon'        => 'author',
    'section'     => __( 'Social', '__x__' ),
    'description' => __( 'Include post author information', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/author',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/author',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/author',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/author'
    ),
    'params' => array(
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', '__x__' ),
        'description' => __( 'Enter in a title for your author information.', '__x__' ),
        'type'        => 'textfield',
        'value'       => 'About the Author'
      ),
      array(
        'param_name'  => 'author_id',
        'heading'     => __( 'Author ID', '__x__' ),
        'description' => __( 'By default the author of the post or page will be output by leaving this input blank. If you would like to output the information of another author, enter in their user ID here.', '__x__' ),
        'type'        => 'textfield',
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Prompt.
//

xsg_map(
  array(
    'id'          => 'prompt',
    'title'       => __( 'Prompt', '__x__' ),
    'icon'        => 'prompt',
    'section'     => __( 'Marketing', '__x__' ),
    'description' => __( 'Include a marketing prompt into your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/prompt/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/prompt/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/prompt/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/prompt/'
    ),
    'params' => array(
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Alignment', '__x__' ),
        'description' => __( 'Select the alignment of your prompt.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Left'  => 'left',
          'Right' => 'right'
        )
      ),
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', '__x__' ),
        'description' => __( 'Enter the title for your prompt.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'message',
        'heading'     => __( 'Message', '__x__' ),
        'description' => __( 'Enter the message for your prompt.', '__x__' ),
        'type'        => 'textarea',
      ),
      array(
        'param_name'  => 'button_text',
        'heading'     => __( 'Button Text', '__x__' ),
        'description' => __( 'Enter the text for your prompt button.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'button_icon',
        'heading'     => __( 'Button Icon', '__x__' ),
        'description' => __( 'Optionally enter the button icon.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => $param_icon_value
      ),
      array(
        'param_name'  => 'circle',
        'heading'     => __( 'Marketing Circle', '__x__' ),
        'description' => __( 'Select to include a marketing circle around your button.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'href',
        'heading'     => __( 'Href', '__x__' ),
        'description' => __( 'Enter in the URL you want your prompt button to link to.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'target',
        'heading'     => __( 'Target', '__x__' ),
        'description' => __( 'Select to open your prompt button link in a new window.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'blank'
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Entry share.
//

xsg_map(
  array(
    'id'          => 'share',
    'title'       => __( 'Social Sharing', '__x__' ),
    'icon'        => 'share',
    'section'     => __( 'Social', '__x__' ),
    'description' => __( 'Include social sharing into your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/entry-share/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/entry-share/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/entry-share/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/entry-share/'
    ),
    'params' => array(
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', '__x__' ),
        'description' => __( 'Enter in a title for your social links.', '__x__' ),
        'type'        => 'textfield',
        'value'       => 'Share this Post'
      ),
      array(
        'param_name'  => 'facebook',
        'heading'     => __( 'Facebook', '__x__' ),
        'description' => __( 'Select to activate the Facebook sharing link.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'twitter',
        'heading'     => __( 'Twitter', '__x__' ),
        'description' => __( 'Select to activate the Twitter sharing link.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'google_plus',
        'heading'     => __( 'Google Plus', '__x__' ),
        'description' => __( 'Select to activate the Google Plus sharing link.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'linkedin',
        'heading'     => __( 'LinkedIn', '__x__' ),
        'description' => __( 'Select to activate the LinkedIn sharing link.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'pinterest',
        'heading'     => __( 'Pinterest', '__x__' ),
        'description' => __( 'Select to activate the Pinterest sharing link.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'reddit',
        'heading'     => __( 'Reddit', '__x__' ),
        'description' => __( 'Select to activate the Reddit sharing link.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      array(
        'param_name'  => 'email',
        'heading'     => __( 'Email', '__x__' ),
        'description' => __( 'Select to activate the email sharing link.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Table of contents.
//

xsg_map(
  array(
    'id'              => 'toc',
    'title'           => __( 'Table of Contents', '__x__' ),
    'weight'          => 630,
    'class'           => 'x-content-element x-content-element-toc',
    'icon'            => 'toc',
    'section'         => __( 'Information', '__x__' ),
    'description'     => __( 'Include a table of contents in your content', '__x__' ),
    'as_parent'       => array( 'only' => 'toc_item' ),
    'content_element' => true,
    'js_view'         => 'VcColumnView',
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/table-of-contents/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/table-of-contents/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/table-of-contents/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/table-of-contents/'
    ),
    'params' => array(
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', '__x__' ),
        'description' => __( 'Set the title of the table of contents.', '__x__' ),
        'type'        => 'textfield',
        'value'       => 'Table of Contents'
      ),
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Alignment', '__x__' ),
        'description' => __( 'Select the alignment of your table of contents.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Left'      => 'left',
          'Right'     => 'right',
          'Fullwidth' => 'block'
        )
      ),
      array(
        'param_name'  => 'columns',
        'heading'     => __( 'Columns', '__x__' ),
        'description' => __( 'Select a column count for your links if you have chosen "Fullwidth" as your alignment.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          '1' => '1',
          '2' => '2',
          '3' => '3'
        )
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Table of contents item.
//

xsg_map(
  array(
    'id'              => 'toc_item',
    'title'           => __( 'Table of Contents Item', '__x__' ),
    'weight'          => 620,
    'class'           => 'x-content-element x-content-element-toc-item',
    'icon'            => 'toc-item',
    'section'         => __( 'Information', '__x__' ),
    'description'     => __( 'Include a table of contents item', '__x__' ),
    'as_child'        => array( 'only' => 'toc' ),
    'content_element' => true,
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/table-of-contents/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/table-of-contents/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/table-of-contents/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/table-of-contents/'
    ),
    'params' => array(
      array(
        'param_name'  => 'title',
        'heading'     => __( 'Title', '__x__' ),
        'description' => __( 'Set the title of the table of contents item.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'page',
        'heading'     => __( 'Page', '__x__' ),
        'description' => __( 'Set the page of the table of contents item.', '__x__' ),
        'type'        => 'textfield',
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Custom headline.
//

xsg_map(
  array(
    'id'          => 'custom_headline',
    'title'       => __( 'Custom Headline', '__x__' ),
    'icon'        => 'custom-headline',
    'section'     => __( 'Typography', '__x__' ),
    'description' => __( 'Include a custom headline in your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/custom-headline/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/custom-headline/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/custom-headline/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/custom-headline/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', '__x__' ),
        'description' => __( 'Enter your text.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Alignment', '__x__' ),
        'description' => __( 'Select which way to align the custom headline.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Left'   => 'left',
          'Center' => 'center',
          'Right'  => 'right'
        )
      ),
      array(
        'param_name'  => 'level',
        'heading'     => __( 'Heading Level', '__x__' ),
        'description' => __( 'Select which level to use for your heading (e.g. h2).', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'h1' => 'h1',
          'h2' => 'h2',
          'h3' => 'h3',
          'h4' => 'h4',
          'h5' => 'h5',
          'h6' => 'h6'
        )
      ),
      array(
        'param_name'  => 'looks_like',
        'heading'     => __( 'Looks Like', '__x__' ),
        'description' => __( 'Select which level your heading should look like (e.g. h3).', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'h1' => 'h1',
          'h2' => 'h2',
          'h3' => 'h3',
          'h4' => 'h4',
          'h5' => 'h5',
          'h6' => 'h6'
        )
      ),
      array(
        'param_name'  => 'accent',
        'heading'     => __( 'Accent', '__x__' ),
        'description' => __( 'Select to activate the heading accent.', '__x__' ),
        'type'        => 'checkbox',
        'value'       => 'true'
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


// //
// // Social icons.
// //

// xsg_map(
//   array(
//     'id'        => 'social',
//     'title'        => __( 'Social Icon', '__x__' ),
//     'weight'      => 760,
//     'class'       => 'x-content-element x-content-element-social',
//     'icon'        => 'social',
//     'section'    => __( 'Typography', '__x__' ),
//     'description' => __( 'Include a Foundation Social icon in your content', '__x__' ),
//     'demos' => array(
  //   'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/',
  //   'renew' => 'http://theme.co/x/demo/renew/1/shortcodes/',
  //   'icon' => 'http://theme.co/x/demo/icon/1/shortcodes/',
  //   'ethos' => 'http://theme.co/x/demo/ethos/1/shortcodes/'
  // ),
  // 'params'      => array(
//       array(
//         'param_name'  => 'type',
//         'heading'     => __( 'Type', '__x__' ),
//         'description' => __( 'Select your icon.', '__x__' ),
//         'type'        => 'dropdown',
//
//         'value'       => $param_social_icon_value
//       ),
//       array(
//         'param_name'  => 'id',
//         'heading'     => __( 'ID', '__x__' ),
//         'description' => __( '(Optional) Enter a unique ID.', '__x__' ),
//         'type'        => 'textfield',
//
//       ),
//       array(
//         'param_name'  => 'class',
//         'heading'     => __( 'Class', '__x__' ),
//         'description' => __( '(Optional) Enter a unique class name.', '__x__' ),
//         'type'        => 'textfield',
//
//       ),
//       array(
//         'param_name'  => 'style',
//         'heading'     => __( 'Style', '__x__' ),
//         'description' => __( '(Optional) Enter inline CSS.', '__x__' ),
//         'type'        => 'textfield',
//
//       )
//     )
//   )
// );


//
// Container.
//

xsg_map(
  array(
    'id'              => 'container',
    'title'           => __( 'Container', '__x__' ),
    'weight'          => 990,
    'class'           => 'x-content-element x-content-element-container',
    'icon'            => 'container',
    'section'         => __( 'Structure', '__x__' ),
    'description'     => __( 'Include a container in your content', '__x__' ),
    'as_parent'       => array( 'only' => 'vc_row, line, gap, clear, highlight, blockquote, pullquote, alert, map, skill_bar, code, button, icon, block_grid, image, icon_list, info, columnize, x_video_player, x_video_embed, accordion, tab_nav, tabs, visibility, slider, protect, recent_posts, x_audio_player, x_audio_embed, pricing_table, callout, promo, lightbox, author, prompt, share, toc, custom_headline, social, feature_headline, responsive_text, search, text_output, rev_slider_vc, contact-form-7' ),
    'content_element' => true,
    'js_view'         => 'VcColumnView',
    'demos'           => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/container/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/container/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/container/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/container/'
    ),
    'params' => array(
      array(
        'param_name'  => 'id',
        'heading'     => __( 'ID', '__x__' ),
        'description' => __( '(Optional) Enter a unique ID.', '__x__' ),
        'type'        => 'textfield',
      ),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Feature headline.
//

xsg_map(
  array(
    'id'          => 'feature_headline',
    'title'       => __( 'Feature Headline', '__x__' ),
    'icon'        => 'feature-headline',
    'section'     => __( 'Typography', '__x__' ),
    'description' => __( 'Include a feature headline in your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/feature-headline/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/feature-headline/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/feature-headline/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/feature-headline/'
    ),
    'params' => array(
      array(
        'param_name'  => 'content',
        'heading'     => __( 'Text', '__x__' ),
        'description' => __( 'Enter your text.', '__x__' ),
        'type'        => 'textarea_html',
        'value'       => ''
      ),
      array(
        'param_name'  => 'type',
        'heading'     => __( 'Alignment', '__x__' ),
        'description' => __( 'Select which way to align the feature headline.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'Left'   => 'left',
          'Center' => 'center',
          'Right'  => 'right'
        )
      ),
      array(
        'param_name'  => 'level',
        'heading'     => __( 'Heading Level', '__x__' ),
        'description' => __( 'Select which level to use for your heading (e.g. h2).', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'h1' => 'h1',
          'h2' => 'h2',
          'h3' => 'h3',
          'h4' => 'h4',
          'h5' => 'h5',
          'h6' => 'h6'
        )
      ),
      array(
        'param_name'  => 'looks_like',
        'heading'     => __( 'Looks Like', '__x__' ),
        'description' => __( 'Select which level your heading should look like (e.g. h3).', '__x__' ),
        'type'        => 'dropdown',
        'value'       => array(
          'h1' => 'h1',
          'h2' => 'h2',
          'h3' => 'h3',
          'h4' => 'h4',
          'h5' => 'h5',
          'h6' => 'h6'
        )
      ),
      array(
        'param_name'  => 'icon',
        'heading'     => __( 'Icon', '__x__' ),
        'description' => __( 'Select the icon to use with your feature headline.', '__x__' ),
        'type'        => 'dropdown',
        'value'       => $param_icon_value
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Responsive text.
//

xsg_map(
  array(
    'id'          => 'responsive_text',
    'title'       => __( 'Responsive Text', '__x__' ),
    'icon'        => 'responsive-text',
    'section'     => __( 'Typography', '__x__' ),
    'description' => __( 'Include responsive text in your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/responsive-text/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/responsive-text/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/responsive-text/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/responsive-text/'
    ),
    'params' => array(
      array(
        'param_name'  => 'selector',
        'heading'     => __( 'Selector', '__x__' ),
        'description' => __( 'Enter in the selector for your responsive text (e.g. if your class is "h-responsive" enter ".h-responsive").', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'compression',
        'heading'     => __( 'Compression', '__x__' ),
        'description' => __( 'Enter the compression for your responsive text (adjust up and down to desired level in small increments).', '__x__' ),
        'type'        => 'textfield',
        'value'       => '1.0'
      ),
      array(
        'param_name'  => 'min_size',
        'heading'     => __( 'Minimum Size', '__x__' ),
        'description' => __( 'Enter the minimum size of your responsive text.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'max_size',
        'heading'     => __( 'Maximum Size', '__x__' ),
        'description' => __( 'Enter the maximum size of your responsive text.', '__x__' ),
        'type'        => 'textfield',
      )
    )
  )
);


//
// Search.
//

xsg_map(
  array(
    'id'          => 'search',
    'title'       => __( 'Search', '__x__' ),
    'icon'        => 'search',
    'section'     => __( 'Content', '__x__' ),
    'description' => __( 'Include a search field in your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/search/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/search/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/search/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/search/'
    ),
    'params' => array(
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);


//
// Counter.
//

xsg_map(
  array(
    'id'          => 'counter',
    'title'       => __( 'Counter', '__x__' ),
    'icon'        => 'counter',
    'section'     => __( 'Information', '__x__' ),
    'description' => __( 'Include an animated number counter in your content', '__x__' ),
    'demos'       => array(
      'integrity' => 'http://theme.co/x/demo/integrity/1/shortcodes/counter/',
      'renew'     => 'http://theme.co/x/demo/renew/1/shortcodes/counter/',
      'icon'      => 'http://theme.co/x/demo/icon/1/shortcodes/counter/',
      'ethos'     => 'http://theme.co/x/demo/ethos/1/shortcodes/counter/'
    ),
    'params' => array(
      array(
        'param_name'  => 'num_start',
        'heading'     => __( 'Starting Number', '__x__' ),
        'description' => __( 'Enter in the number that you would like your counter to start from.', '__x__' ),
        'type'        => 'textfield',
        'value'       => '0'
      ),
      array(
        'param_name'  => 'num_end',
        'heading'     => __( 'Ending Number', '__x__' ),
        'description' => __( 'Enter int he number that you would like your counter to end at. This must be higher than your starting number.', '__x__' ),
        'type'        => 'textfield',
        'value'       => '100'
      ),
      array(
        'param_name'  => 'num_speed',
        'heading'     => __( 'Counter Speed', '__x__' ),
        'description' => __( 'The amount of time to transition between numbers in milliseconds.', '__x__' ),
        'type'        => 'textfield',
        'value'       => '1500'
      ),
      array(
        'param_name'  => 'num_prefix',
        'heading'     => __( 'Number Prefix', '__x__' ),
        'description' => __( 'Prefix your number with a symbol or text.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'num_suffix',
        'heading'     => __( 'Number Suffix', '__x__' ),
        'description' => __( 'Suffix your number with a symbol or text.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'num_color',
        'heading'     => __( 'Number Color', '__x__' ),
        'description' => __( 'Select the color of your number.', '__x__' ),
        'type'        => 'colorpicker',
      ),
      array(
        'param_name'  => 'text_above',
        'heading'     => __( 'Text Above', '__x__' ),
        'description' => __( 'Optionally include text above your number.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'text_below',
        'heading'     => __( 'Text Below', '__x__' ),
        'description' => __( 'Optionally include text below your number.', '__x__' ),
        'type'        => 'textfield',
      ),
      array(
        'param_name'  => 'text_color',
        'heading'     => __( 'Text Color', '__x__' ),
        'description' => __( 'Select the color of your text above and below the number if you have include any.', '__x__' ),
        'type'        => 'colorpicker',
      ),
      xsg_map_default_id(),
      xsg_map_default_class(),
      xsg_map_default_style()
    )
  )
);



// Defaults
// =============================================================================

function xsg_map_default( $args = array() ) {
  return wp_parse_args( $args, array(
    'param_name'  => 'generic',
    'heading'     => __( 'Text', '__x__' ),
    'description' => __( 'Enter your text.', '__x__' ),
    'type'        => 'textfield',
    'value'       => ''
  ));
}

function xsg_map_default_id( $args = array() ) {
  return wp_parse_args( $args, xsg_map_default( array(
    'param_name'  => 'id',
    'heading'     => __( 'ID', '__x__' ),
    'description' => __( '(Optional) Enter a unique ID.', '__x__' ),
    'type'        => 'textfield',
    'advanced'    => true
  ) ) );
}

function xsg_map_default_class( $args = array() ) {
  return wp_parse_args( $args, xsg_map_default( array(
    'param_name'  => 'class',
    'heading'     => __( 'Class', '__x__' ),
    'description' => __( '(Optional) Enter a unique class name.', '__x__' ),
    'type'        => 'textfield',
    'advanced'    => true
  ) ) );
}

function xsg_map_default_style( $args = array() ) {
  return wp_parse_args( $args, xsg_map_default( array(
    'param_name'  => 'style',
    'heading'     => __( 'Style', '__x__' ),
    'description' => __( '(Optional) Enter inline CSS.', '__x__' ),
    'type'        => 'textfield',
    'advanced'    => true
  ) ) );
}