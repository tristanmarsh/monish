<?php

// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/ADDONS/PAGE-DEMO-CONTENT.PHP
// -----------------------------------------------------------------------------
// Addons demo content page output.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Page Output
//   02. Setup
// =============================================================================

// Page Output
// =============================================================================

function x_addons_page_demo_content() { ?>

  <div class="wrap x-addons-demo-content">

    <header class="x-addons-header">
      <h2>Demo Content</h2>
      <p>Setup demo content with the click of a mouse (or two). <a href="//theme.co/x/member/demo-content/" target="_blank">Learn More</a>.</p>
    </header>

    <div class="x-addons-postboxes">
      <?php x_addons_demo_content_output(); ?>
    </div>

  </div>

<?php }



// Setup
// =============================================================================

function x_addons_demo_content_output() {

  $request = wp_remote_get( 'https://theme.co/x/member/demo-api/' );

  //
  // Check if request returns an error.
  //

  if ( is_wp_error( $request ) ) :

    if ( isset( $_GET['x-verbose'] ) && $_GET['x-verbose'] == 1 ) {
      x_dump( $request->get_error_message(), 350, 'var_dump' );
    }

    ?>

    <div class="x-addons-postbox demo-content">
      <div class="error"><p>Unable to retrieve demo content. A firewall may be blocking connections to theme.co.</p></div>
    </div>

    <?php

  else :

    $data = json_decode( $request['body'], true );

  ?>

  <div class="x-addons-postbox demo-content">
    <div class="inside">
      <form id="x-demo-content-form" method="post">
        <?php wp_nonce_field( 'x-addons-demo-content' ); ?>
        <div class="controls">
          <div class="control full">
            <h3>Demo Content</h3>
            <p>Select which demo content you would like to use on your website. This will setup the Customizer settings for that demo.</p>
            <select name="demo" id="demo">
              <?php

              foreach ( $data as $key => $info ) {
                echo '<option value="' . $key . '">' . $info['title'] . '</option>';
              }

              ?>
            </select>
            <p><a href="//theme.co/x/demo/integrity/1/" id="demo-content-link" target="_blank">Online Demo</a></p>
          </div>
        </div>
        <div class="controls">
          <div class="control">
            <h3>Import Posts</h3>
            <p>Include posts with your demo setup to see how various features work.</p>
            <fieldset>
              <legend class="screen-reader-text"><span>input type="radio"</span></legend>
              <label class="radio-label"><input type="radio" class="radio" name="posts" value="yes"> <span><?php _e( 'Yes', '__x__' ); ?></span></label>
              <label class="radio-label"><input type="radio" class="radio" name="posts" value="no" checked="checked"> <span><?php _e( 'No', '__x__' ); ?></span></label>
            </fieldset>
          </div>
          <div class="control">
            <h3>Import Portfolio Items</h3>
            <p>Include portfolio items with your demo setup to see how various features work.</p>
            <fieldset>
              <legend class="screen-reader-text"><span>input type="radio"</span></legend>
              <label class="radio-label"><input type="radio" class="radio" name="portfolio-items" value="yes"> <span><?php _e( 'Yes', '__x__' ); ?></span></label>
              <label class="radio-label"><input type="radio" class="radio" name="portfolio-items" value="no" checked="checked"> <span><?php _e( 'No', '__x__' ); ?></span></label>
            </fieldset>
          </div>
        </div>
        <p class="submit">
          <input type="submit" name="setup" id="x-addons-demo-content-submit" class="button button-primary" value="Setup Demo Content">
        </p>
      </form>
    </div>
  </div>

  <script>

    jQuery(document).ready(function($) {

      $('.x-addons-postbox.demo-content').prepend('<div id="demo-message" class="message"><span>You demo content is being setup.</span></div>');

      $('#demo').change(function() {
        var optVal  = $(this).val();
        var stack   = optVal.split('-').shift();
        var number  = optVal.split('-').pop();
        var newHref = '//theme.co/x/demo/' + stack + '/' + number + '/';
        $('#demo-content-link').attr('href', newHref);
      });

      $('form').on('submit', function(e) {

        e.preventDefault();


        //
        // Only run setup if confirmed.
        //

        xAdminConfirm('error', 'Installing demo content will not alter any of your pages or posts, but it will overwrite your Customizer settings. This is not reversible unless you have previously made a backup of your settings. Are you sure you want to proceed?', function() {

          //
          // 1. Reveal the status message.
          // 2. Disable button.
          // 3. Run setup.
          //

          $('#demo-message').fadeIn(250);                            // 1
          $('#x-addons-demo-content-submit').attr('disabled', true); // 2
          run_setup();                                               // 3

        });


        //
        // Place for button state changes, et cetera.
        //

        url_params = {
          'action'          : 'x_demo_content_setup',
          'demo'            : $('#demo').val(),
          'homepage-markup' : $('#x-demo-content-form input[name="homepage-markup"]:checked').val(),
          'posts'           : $('#x-demo-content-form input[name="posts"]:checked').val(),
          'portfolio-items' : $('#x-demo-content-form input[name="portfolio-items"]:checked').val(),
        };

        var ajax_url = "<?php echo admin_url( 'admin-ajax.php' ); ?>?" + $.param(url_params);

        formFeedback = function( newMessage, dataSuccess ) {

          var alertMessage = $('#demo-message');

          alertMessage.html(newMessage);

          if ( dataSuccess === true ) {

            setTimeout(function() {
              alertMessage.fadeOut(250);
            }, 1500);

            setTimeout(function() {
              alertMessage.html('<span>Your demo content is being setup.</span>');
              $('#x-addons-demo-content-submit').removeAttr('disabled');
            }, 2000);

          }

        };

        run_setup = function() {

          $.getJSON(ajax_url, function(data) {

            if ( data.result === 'success' ) {

              formFeedback('<span>All done. Have fun!</span>', true);

            } else if ( data.result === 'error' ) {

              //
              // Display error message and log connection errors to console
              // for troubleshooting.
              //

              console.log(data);

            }

          }).fail(function(data) {

            //
            // Auto failover. No valid JSON response could mean a timeout
            // during thumbnail generation. This will run the setup again,
            // skipping completed sections.
            //

            formFeedback('<span>Hang in there, we\'re almost done...</span>', false);

            console.log(data);

            run_setup();

          });

        };

      });

    });

  </script>

  <?php

  endif;

}