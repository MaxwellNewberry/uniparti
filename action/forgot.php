<?php

  require_once('../assets/func/global.func.php');
  $validate_id = md5(rand(12051996,92161999) . "uniparti");
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- title -->
    <title>uniparti [forgot password]</title>

    <!-- meta -->
    <meta charset="utf-8">
    <meta name="description" content="UniParti is a community-reliant event website that provides all the latest and upcoming events in your area.">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- style -->
    <link rel="shortcut icon" href="https://uniparti.com/favicon.ico">
    <link rel="stylesheet" href="https://uniparti.com/assets/css/style.css" />
    <link rel="stylesheet" href="https://uniparti.com/assets/css/style_edit.css" />
    <link rel="stylesheet" href="https://uniparti.com/assets/css/jquery.vnm.confettiButton.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  </head>
  <body id="top">

    <!-- preloader -->
    <div class="pre-loader"></div>

    <div class="navigation-container" id="navigation-container">
      <div class="col-12">
        <div class="col-4">
          <div class="brand-section">
            <div class="logo"></div>
            <a href="https://uniparti.com" class="title underline">uniparti</a>
          </div>
        </div>
        <div class="col-8">
          <ul class="navigation-list">
            <li class="navigation-list-item"><a href="https://uniparti.com/">home</a></li>
            <li class="navigation-list-item"><a href="https://uniparti.com/events/">events</a></li>
            <li class="navigation-list-item"><a href="https://uniparti.com/news/">news</a></li>
            <li class="navigation-list-item"><a href="https://uniparti.com/contact/">contact us</a></li>
            <li class="navigation-list-item post-event"><a href="https://uniparti.com/create/">post an event</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- mobile menu -->
    <div id="mobile-menu" class="mobile-menu">
      <div id="mobile_symbol" class="mobile_symbol"><i class="fas fa-bars"></i></div>

      <!-- mobile menu list -->
      <ul id="mobile_menu_list" class="mobile_menu_list">
        <li><a href="https://uniparti.com">home</a></li>
        <li><a href="https://uniparti.com/events/">events</a></li>
        <li><a href="https://uniparti.com/news/">news</a></li>
        <li><a href="https://uniparti.com/contact/">contact us</a></li>
        <li><a href="https://uniparti.com/create/">post an event</a></li>
      </ul>
      <!-- ! [mobile menu list] -->
    </div>
    <!-- ! [mobile menu] -->

    <div class="wrapper">

      <div class="col-10">

          <div class="col-12 login">

            <div class="heading"><span class="underline">so, you forgot your password</span></div>

            <div class="col-12">
              <div class="login col-6">

                <div id="formMessages"></div>

                <form method="post" id="forgot">

                  <div id="_response">

                  <div class="step_one">
                    <div class="content"><span class="emphasize">step one</span>: enter the recovery e-mail associated with your event.</div>
                    <div class="form_section"><input type="text" name="email" id="e_email" placeholder="Enter your e-mail here"/></div>
                  </div>

                  <div class="step_two" id="step_two" style="display:none;">
                    <div class="content"><span class="emphasize">step two</span>: find the event you want to reset the password to.</div>
                    <div class="form_section"><select name="event_list" id="event_list"></select></div>
                  </div>

                  <input type="hidden" name="session_id" id="e_session_id" value="<?=$validate_id?>" />
                  <div class="form_section_bottom" id="response"><input type="submit" name="submit" id="e_submit" class="button" value="submit" /></div>

                  </div>

                </form>
              </div>
            </div>

          </div>

      </div>

    </div>
    <!-- ! [wrapper] -->

    <!-- footer -->
    <div class="col-12">
      <div class="footer">
        <div class="col-12">
          <div class="col-4">
            <div class="social-links">
              <?=$language_array['social_links']?>
            </div>
          </div>
          <div class="col-5">
            <div class="copyright">
              <p><?=$language_array['copyright']?></p>
            </div>
          </div>
          <div class="col-3">
            <div class="brand-section">
              <a href="" class="title underline">uniparti</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ! [footer] -->

  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="https://uniparti.com/assets/js/jquery.vnm.confettiButton.min.js"></script>
  <script>var index_page = false;</script>
  <script src="https://uniparti.com/assets/js/global.js"></script>
  <script>
    var form = $('#forgot');
    var email = $('#e_email').val();
    var stopRequests = false;
    $(form).submit(function(e) {
      e.preventDefault();
      var formData = $(form).serialize();

      if(email !== $('#e_email').val()) {
        $.ajax({
          url: 'https://uniparti.com/assets/func/find_events.php',
          data: formData,
          type: "POST",
          success: function(data) {
              $('#event_list').html('');
              $('#step_two').slideDown();
              var empty_array = true;
              $.each(JSON.parse(data), function(v, k) {
                if(v !=="") {
                  $('#event_list').append('<option value="' + v + '">' + k + '</option>');
                  empty_array = false;
                }
              });
              if(empty_array) {
                $('#event_list').append('<option value="0">No events match that email.</option>');
              }
          }
        });
        email = $('#e_email').val();
      }

      if(parseInt($('#event_list').val()) !== 0 && $('#step_two').is(":visible")) {
        $('#_response').slideUp("slow");
        $('#_response').css("opacity", 0);
        setTimeout(function() { $('#_response').html("<div class=\"send-validation\"><div class=\"loading-image\"><img src=\"https://uniparti.com/assets/css/img/loading.gif\" /></div><div class=\"loading-heading\"><h3>DO NOT CLOSE TAB</h3>Great, check your e-mail for a validation link.</div></div>"); $('#_response').addClass('loading'); setTimeout(function () { $('#_response').css("opacity", 1); $('#_response').slideDown("slow"); }, 400); }, 500);

        (function worker() {
          $.ajax({
            url: 'https://uniparti.com/assets/func/forgot_password.php',
            data: formData,
            type: "POST",
            success: function(data) {
              $('#_response').slideUp("slow");
              $('#_response').css("opacity", 0);
              stopRequests = true;
              setTimeout(function() { $('#_response').html(data); setTimeout(function() { $('#_response').css("opacity", 1); $('#_response').slideDown(); }, 200) }, 300);
            },
            fail: function(e) {

            },
            complete: function() {
              if(stopRequests == false) {
                // Schedule the next request when the current one's complete
                setTimeout(worker, 5000);
              }
            }
          });
        })();
      }

    });
  </script>
  </body>
</html>
