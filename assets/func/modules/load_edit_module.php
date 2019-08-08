<?

  require_once('../../../assets/func/global.func.php');

  $_sql = DB::prepare("SELECT event_uid, event_name, event_cover, event_description FROM `uniparti_events` WHERE `event_uid` = :event_id");
  $_sql->execute(['event_id' => $_event_id]);
  $_db = $_sql->fetch();

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
    <link rel="stylesheet" href="https://uniparti.com/assets/css/jquery.vnm.confettiButton.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

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

      <div class="col-10">

          <div class="col-12 login">

            <div class="heading"><span class="underline">edit your event</span></div>

            <div class="col-12">
              <div class="login col-6">

                <div id="formMessages"></div>

                <form method="post" id="edit_enter">
                  <div class="form_section"><input type="password" name="password" id="e_password" placeholder="Enter your password"/></div>
                  <div class="form_section"><input type="hidden" name="event_id" value="<?=$_db['event_uid']?>" id="event_id" /><input type="submit" name="submit" id="e_submit" class="button" value="submit" /></div>
                </form>
                <a class="forgot_password" href="https://uniparti.com/action/forgot.php?ref=<?=$_db['event_uid']?>">forgot your password?</a>
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
  <input value="<?=$_db['event_uid']?>" type="hidden" id="event_id" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="https://uniparti.com/assets/js/jquery.vnm.confettiButton.min.js"></script>
  <script>var index_page = false;</script>
  <script src="https://uniparti.com/assets/js/global.js"></script>
  <script src="https://uniparti.com/assets/js/edit.js"></script>
  </body>
</html>
