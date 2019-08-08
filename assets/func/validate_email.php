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

        <?php

          if($_SERVER['REQUEST_METHOD'] == "GET") {

            if($_GET['sid'] && $_GET['uid']) {

              require_once('global.func.php');

              $_sql = DB::prepare("SELECT * FROM `uniparti_forgot_password` WHERE `validate` = :uid AND `session_id` = :sid");
              $_sql->execute(['uid' => $_GET['uid'], 'sid' => $_GET['sid']]);
              $num_rows = $_sql->fetchColumn();

              if($num_rows > 0) {

                // request exists
                $_sql = DB::prepare("UPDATE `uniparti_forgot_password` SET `validated` = 1 WHERE `validate` = :uid AND `session_id` = :sid");
                $_sql->execute(['uid' => $_GET['uid'], 'sid' => $_GET['sid']]);

                echo "
                <div class=\"success\" style=\"padding:20px;\">
                  <div class=\"header\"><h1 style=\"font-family: 'Playfair Display', serif;\">Success!</h1></div><br /><div style=\"font-family: 'Open Sans', sans-serif;\"\">Your request has been validated. You may close this page and return to the previous page to complete your request.</div>
                </div>
                ";

              }
            }

          }
          else {
            die("You do not have permission to access this page.");
          }

        ?>

      </div>

    </div>

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
              <p>Copyright (c) 2019 UniParti Copyright Holder All Rights Reserved.</p>
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

  </body>
</html>
