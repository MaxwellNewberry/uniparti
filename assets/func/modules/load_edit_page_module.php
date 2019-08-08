<?php

  require_once('../../../assets/func/global.func.php');

  date_default_timezone_set('UTC');
  $_SESSION['start_time'] = gmdate("U");
  $_SESSION['session_id'] = md5(rand(12051996,902161999) . "-uniparti");

  if($_SERVER['REQUEST_METHOD'] == "GET") {
    if(($_GET['sid'] == $_SESSION['sid']) === FALSE)  {
      header('Location: https://uniparti.com/events/' . $_event_id . '/edit/');
    }
  }
  else {
    header('Location: https://uniparti.com/events/' . $_event_id . '/edit/');
  }

  $_sql = DB::prepare("SELECT * FROM `uniparti_events` WHERE `event_uid` = :event_id");
  $_sql->execute(['event_id' => $_event_id]);
  $_db = $_sql->fetch();

  $_db['event_stime'] = date('h:i A', $_db['event_stime']);
  $_db['event_etime'] = date('h:i A', $_db['event_etime']);
  $_db['event_sdate'] = date('Y-m-d', $_db['event_sdate']);
  $_db['event_edate'] = date('Y-m-d', $_db['event_edate']);

?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- title -->
    <title><?=$_db['event_name']?></title>

    <!-- meta -->
    <meta charset="utf-8">
    <meta name="description" content="UniParti is a community-reliant event website that provides all the latest and upcoming events in your area.">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- twitter meta -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Uniparti: <?=$_db['event_name']?>">
    <meta name="twitter:image" content="https://uniparti.com/events/cover/<?=$_db['event_cover']?>">
    <meta name="twitter:image:alt" content="https://uniparti.com/assets/css/img/meta.jpg">

    <!-- facebook meta -->
    <meta property="og:url" content="https://uniparti.com/events/<?=$_event_id?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Uniparti: <?=$_db['event_name']?>" />
    <meta property="og:image" content="https://uniparti.com/events/cover/<?=$_db['event_cover']?>" />

    <!-- style -->
    <link rel="shortcut icon" href="https://uniparti.com/favicon.ico">
    <link rel="stylesheet" href="https://uniparti.com/assets/css/style.css" />
    <link rel="stylesheet" href="https://uniparti.com/assets/css/style_edit.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
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
            <li class="navigation-list-item post-event"><a href="https://uniparti.com/events/<?=$_event_id?>">back to event</a></li>
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
        <li><a href="https://uniparti.com/<?=$_db['event_id']?>">back to event</a></li>
        <li><a href="https://uniparti.com/create/">post an event</a></li>
      </ul>
      <!-- ! [mobile menu list] -->
    </div>
    <!-- ! [mobile menu] -->

    <div class="wrapper">

      <div class="col-12">
        <div class="col-2 left-pane">
          <div class="left-pane-title">NAVIGATION</div>
          <div class="left-pane-list">
            <ul>
              <li class="active">main info</li>
            </ul>
          </div>
        </div>
        <div class="col-10 right-pane">
          <div class="create_form">

            <div id="formMessages"></div>

            <form id="create_form" enctype="multipart/form-data" method="post" autocomplete="on">

              <div class="col-12 form_section">
                <div class="col-8">
                  <input name="event_name" type="text" id="e_name" value="<?=$_db['event_name']?>" />
                  <div class="placeholder_text">name of event (22 chars) <span class="required">*</span></div>
                </div>
                <div class="col-4">
                  <input name="event_venue" type="text" id="e_venue" value="<?=$_db['event_venue']?>" />
                  <div class="placeholder_text">venue <span class="required">*</span></div>
                </div>
                <div class="col-3">
                  <input name="event_start_time" type="text" id="e_stime" value="<?=$_db['event_stime']?>" />
                  <div class="placeholder_text">start time of event <span class="required">*</span> <div class="placeholder_text">(HH:MM AM/PM)</div></div>
                </div>
                <div class="col-3">
                  <input name="event_end_time" type="text" id="e_etime" value="<?=$_db['event_etime']?>" />
                  <div class="placeholder_text">end time of event <span class="required">*</span> <div class="placeholder_text">(HH:MM AM/PM)</div></div>
                </div>
                <div class="col-3">
                  <input name="event_sdate" type="date" id="e_sdate" value="<?=$_db['event_sdate']?>" />
                  <div class="placeholder_text">start of event <span class="required">*</span></div><div class="placeholder_text">(MM-DD-YYYY)</div>
                </div>
                <div class="col-3">
                  <input name="event_edate" type="date" id="e_edate" value="<?=$_db['event_edate']?>" />
                  <div class="placeholder_text">end of event <span class="required">*</span></div><div class="placeholder_text">(MM-DD-YYYY)</div>
                </div>
                <div class="col-12">
                  <div class="col-6">
                    <input name="event_host_name" type="text" id="e_host_name" value="<?=$_db['event_host']?>" />
                    <div class="placeholder_text">name of event host <span class="required">*</span></div>
                  </div>
                  <div class="col-6">
                    <select name="event_category" id="e_category">
                      <option value="select">Select a category</option>
                      <option value="fundraiser" <? if($_db['event_category']=="fundraiser") { echo "selected"; }?>>fundraiser</option>
                      <option value="workshop" <? if($_db['event_category']=="workshop") { echo "selected"; }?>>workshop</option>
                      <option value="seminar" <? if($_db['event_category']=="seminar") { echo "selected"; }?>>seminar</option>
                      <option value="rso-meeting" <? if($_db['event_category']=="rso-meeting") { echo "selected"; }?>>rso meeting</option>
                      <option value="celebration" <? if($_db['event_category']=="celebration") { echo "selected"; }?>>celebreation</option>
                      <option value="other" <? if($_db['event_category']=="other") { echo "selected"; }?>>other</option>
                    </select>
                    <div class="placeholder_text">category <span class="required">*</span></div>
                  </div>
                </div>
              </div>

              <div class="col-12 form_section two">
                <h3>tell us about your event</h3>
                <div name="message" id="editor">
                  <?=$_db['event_description']?>
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
                <input type="hidden" name="eid" id="e_eid" value="<?=$_event_id?>" /><input type="hidden" name="sid" id="e_sid" value="<?=$_SESSION['session_id']?>" />
                <input type="submit" name="submit" id="e_submit" value="Submit Event" class="button black solid">
              </div>

            </form>

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
  <input value="<?=$_db['event_uid']?>" type="hidden" id="event_id" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlnrdZ_I2-PO2Bg7VifaLsM97cf4_kqPM&libraries=places"></script>
  <script>var index_page = false;</script>
  <script src="https://uniparti.com/assets/js/global.js"></script>
  <script src="https://uniparti.com/assets/js/edit.min.js"></script>
  </body>
</html>
