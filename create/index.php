<?
  require_once('../assets/func/global.func.php');
  date_default_timezone_set('UTC');
  $_SESSION['start_time'] = gmdate("U");
  $_SESSION['session_id'] = md5(rand(12051996,902161999) . "-uniparti");
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- title -->
    <title>uniparti [create]</title>

    <!-- meta -->
    <meta charset="utf-8">
    <meta name="description" content="UniParti is a community-reliant event website that provides all the latest and upcoming events in your area.">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- twitter meta -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Uniparti">
    <meta name="twitter:image" content="https://uniparti.com/assets/css/img/meta.jpg">
    <meta name="twitter:image:alt" content="https://uniparti.com/assets/css/img/meta.jpg">

    <!-- facebook meta -->
    <meta property="og:url" content="https://uniparti.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Uniparti" />
    <meta property="og:image" content="https://uniparti.com/assets/css/img/meta.jpg" />

    <!-- style -->
    <link rel="shortcut icon" href="https://uniparti.com/favicon.ico">
    <link rel="stylesheet" href="https://uniparti.com/assets/css/style.css" />
    <link rel="stylesheet" href="https://uniparti.com/assets/css/style_create.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://uniparti.com/assets/css/ui/trumbowyg.min.css">

  </head>
  <body id="top">

    <!-- preloader -->
    <div class="preloader" id="pre-loader"></div>

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

      <!-- news -->
      <div id="create_top" class="col-10 heading_text">

        <div class="heading">
          <span class="underline">what's the <span class="emphasize">move</span>?</span>
        </div>
        <div class="sub-heading">
          let's get to know you and your event
        </div>

        <!-- new content -->
        <div class="col-12 content">

          <div class="col-10">
            <div class="create_form">

              <div id="formMessages"></div>

              <form id="create_form" enctype="multipart/form-data" method="post" autocomplete="on">

                <div class="col-12 form_section">
                  <div class="col-8">
                    <input name="event_name" type="text" id="e_name" />
                    <div class="placeholder_text">name of event (22 chars) <span class="required">*</span></div>
                  </div>
                  <div class="col-4">
                    <input name="event_venue" type="text" id="e_venue" />
                    <div class="placeholder_text">venue <span class="required">*</span></div>
                  </div>
                  <div class="col-3">
                    <input name="event_start_time" type="text" id="e_stime" />
                    <div class="placeholder_text">start time of event <span class="required">*</span> <div class="placeholder_text">(HH:MM AM/PM)</div></div>
                  </div>
                  <div class="col-3">
                    <input name="event_end_time" type="text" id="e_etime" />
                    <div class="placeholder_text">end time of event <span class="required">*</span> <div class="placeholder_text">(HH:MM AM/PM)</div></div>
                  </div>
                  <div class="col-3">
                    <input name="event_sdate" type="date" id="e_sdate" />
                    <div class="placeholder_text">start of event <span class="required">*</span></div><div class="placeholder_text">(MM-DD-YYYY)</div>
                  </div>
                  <div class="col-3">
                    <input name="event_edate" type="date" id="e_edate" />
                    <div class="placeholder_text">end of event <span class="required">*</span></div><div class="placeholder_text">(MM-DD-YYYY)</div>
                  </div>
                  <div class="col-12">
                    <div class="upload-btn-wrapper">
                      <button class="button">Upload a file</button>
                      <input type="file" name="event_coverimg" id="e_coverimg">
                      <span id="file-selected"></span>
                    </div>
                    <div class="placeholder_text">cover image</div>
                    <div class="placeholder_text">(ideal size: banner)</div>
                  </div>
                  <div class="col-6">
                    <input name="event_host_name" type="text" id="e_host_name" />
                    <div class="placeholder_text">name of event host <span class="required">*</span></div>
                  </div>
                  <div class="col-6">
                    <select name="event_category" id="e_category">
                      <option value="select">Select a category</option>
                      <option value="fundraiser">fundraiser</option>
                      <option value="workshop">workshop</option>
                      <option value="seminar">seminar</option>
                      <option value="rso-meeting">rso meeting</option>
                      <option value="celebration">celebreation</option>
                      <option value="other">other</option>
                    </select>
                    <div class="placeholder_text">category <span class="required">*</span></div>
                  </div>
                </div>

                <div class="col-12 form_section two">
                  <h3>tell us about your event</h3>
                  <div name="message" id="editor"></div>
                </div>

                <div class="col-12 form_section three">
                  <h3>this part is important</h3>
                  <div class="heading-content">
                    <p>below, you will enter a password which you will be asked to provide should you ever want to edit your event. this makes it easy to allow other people to edit your event as well, if you choose to allow that. <span class="emphasize">please write this password down</span>. you will also be asked to add a recovery e-mail in case you forget your password.</p>
                  </div>

                  <div class="col-12">
                    <div class="col-6">
                      <input name="event_password" type="password" id="e_password" autocomplete="off" />
                      <div class="placeholder_text">event password <span class="required">*</span></div>
                    </div>
                    <div class="col-6">
                      <input name="event_email" type="email" id="e_email" />
                      <div class="placeholder_text">recovery e-mail <span class="required">*</span></div>
                    </div>
                  </div>
                </div>

                <div class="col-12 form_section">
                  <div class="col-6">
                    <div class="checkbox_wrapper">
                      <div class="checkbox_left"><input name="event_terms" type="checkbox" id="e_checkbox" class="checkbox-style" /> <label></label></div> <div id="checkbox_right">agree to terms and conditions</div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="checkbox_wrapper">
                      <div class="checkbox_left"><input name="event_contest" type="checkbox" checked id="e_checkbox2" class="checkbox-style" /> <label></label></div> <div id="checkbox_right2">join the airpod contest</div>
                    </div>
                  </div>
                </div>

                <div class="col-12 form_section four">
                  <input type="hidden" name="sid" id="e_sid" value="<?=$_SESSION['session_id']?>" />
                  <input type="submit" name="submit" id="e_submit" value="Submit Event" class="button black solid">
                </div>

              </form>

            </div>
          </div>

        </div>
        <!-- ! [news content] -->

      </div>
      <!-- ! [news] -->

      <!-- spacer -->
      <div class="col-12">
        <div class="spacer-section four">
          <div class="spacer-text">
            <p id="spacer-text">what's goin' on?</p>
          </div>
        </div>
      </div>
      <!-- ! [spacer] -->

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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlnrdZ_I2-PO2Bg7VifaLsM97cf4_kqPM&libraries=places"></script>
  <script>var index_page = false;</script>
  <script src="https://uniparti.com/assets/js/global.js"></script>
  <script src="https://uniparti.com/assets/js/create.min.js"></script>
  </body>
</html>
