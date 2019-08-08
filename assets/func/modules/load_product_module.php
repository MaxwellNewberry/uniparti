<?
require_once('../../assets/func/global.func.php');

  $client_id = $_SERVER['REMOTE_ADDR'];

  if(!$_event_id) { die('You do not have permission to view this page.'); }

  $interest_data_exists = (isset($_COOKIE[$_event_id . "-interest"])) ? false : true;
  $going_data_exists = (isset($_COOKIE[$_event_id . "-going"])) ? false : true;

  $_sql = DB::prepare("SELECT event_uid, event_name, event_host, event_venue, event_sdate, event_edate, event_stime, event_etime, event_cover, event_description, sell_tickets, event_interests, event_going, event_boosts FROM `uniparti_events` WHERE `event_uid` = :event_id");
  $_sql->execute(['event_id' => $_event_id]);
  $_db = $_sql->fetch();

  /* $_GET */
  if($_SERVER['REQUEST_METHOD'] == "GET" && $_GET['activate_key'] == strtotime('today UTC')) {

    if($_GET['action'] == "interest") {

      if($interest_data_exists) {
        setcookie($_event_id . "-interest", "true", time() + (86400 * 365), "/");
        $_sql = DB::prepare("UPDATE `uniparti_events` SET event_interests = event_interests + 1 WHERE `event_uid` = :uid");
        $_sql->execute(['uid' => $_event_id]);
        header('Location: https://uniparti.com/events/' . $_event_id);
      }
      else
      {
        unset($_COOKIE[$_event_id . "-interest"]);
        setcookie($_event_id . "-interest", "", time() - 3600, "/");
        $_sql = DB::prepare("UPDATE `uniparti_events` SET event_interests = event_interests +- 1 WHERE `event_uid` = :uid");
        $_sql->execute(['uid' => $_event_id]);
        header('Location: https://uniparti.com/events/' . $_event_id . '/?error=true');
      }

    }

    if($_GET['action'] == "going") {

      if($going_data_exists) {
        setcookie($_event_id . "-going", "true", time() + (86400 * 365), "/");
        $_sql = DB::prepare("UPDATE `uniparti_events` SET event_going = event_going + 1 WHERE `event_uid` = :uid");
        $_sql->execute(['uid' => $_event_id]);
        header('Location: https://uniparti.com/events/' . $_event_id);
      }
      else
      {
        unset($_COOKIE[$_event_id . "-going"]);
        setcookie($_event_id . "-going", "", time() - 3600, "/");
        $_sql = DB::prepare("UPDATE `uniparti_events` SET event_going = event_going - 1 WHERE `event_uid` = :uid");
        $_sql->execute(['uid' => $_event_id]);
        header('Location: https://uniparti.com/events/' . $_event_id . '/?error=true');
      }

    }

  }


  /* Values */
  $interest_string = ($interest_data_exists===false) ? "interested" : "i'm interested";
  $going_string = ($going_data_exists===false) ? "going" : "i'm going";
  $_db['event_interests'] = number_format($_db['event_interests']);
  $_db['event_going'] = number_format($_db['event_going']);
  $_db['event_boosts'] = number_format($_db['event_boosts']);
  $_top_buttons = ($_db['sell_tickets'] == 1) ? "<div class=\"col-4 first_button\"><div class=\"button solid black\"><a href=\"?action=interest&activate_key=" . strtotime('today UTC') . "\">" . $interest_string . "</a></div></div><div class=\"col-4 first_button\"><div class=\"button solid black\"><a href=\"?action=going&activate_key=" . strtotime('today UTC') . "\">" . $going_string . "</a></div></div><div class=\"col-4\"><div class=\"button solid black\"><a href=\"\">buy tickets</a></div></div>" : "<div class=\"col-6 first_button\"><div class=\"button solid black\"><a href=\"?action=interest&activate_key=" . strtotime('today UTC') . "\">" . $interest_string . "</a></div></div><div class=\"col-6\"><div class=\"button solid black\"><a href=\"?action=going&activate_key=" . strtotime('today UTC') . "\">" . $going_string . "</a></div></div>";
  $_db['event_cover'] = (getimagesize("../cover/".$_db['event_cover']) == false) ? "blank_cover.jpg" : $_db['event_cover'];
  $_db['event_description'] = ($_db['event_description']) ? $_db['event_description'] : "The host has not included any description for this event.";
  $date_string = ($_db['event_sdate'] == $_db['event_edate']) ? date("F j, Y", $_db['event_sdate']) . " @ " . date('h:i A', $_db['event_stime']) . " - " . date('h:i A', $_db['event_etime']) : date("l, F j, Y", $_db['event_sdate']) . " @ " . date('h:i A', $_db['event_stime']) . " to " . date("l, F j, Y", $_db['event_edate'] ) . " @ " . date('h:i A', $_db['event_etime']);
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
    <link rel="stylesheet" href="https://uniparti.com/assets/css/style_product.css" />
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
            <li class="navigation-list-item post-event"><a href="https://uniparti.com/events/<?=$_event_id?>/edit/">edit event</a></li>
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
        <li><a href="https://uniparti.com/events/<?=$_event_id?>/edit/">edit event</a></li>
        <li><a href="https://uniparti.com/create/">post an event</a></li>
      </ul>
      <!-- ! [mobile menu list] -->
    </div>
    <!-- ! [mobile menu] -->

    <div class="wrapper">

      <div class="col-10">

        <!-- top section -->
        <div class="col-12">

          <!-- image section -->
          <div class="col-12">
            <div class="event-item-image-section" style="background: url('https://uniparti.com/events/cover/<?=$_db['event_cover']?>') center center / contain no-repeat;">
            </div>
          </div>
          <!-- ! [image section] -->

          <!-- info section -->
          <div class="col-6">
            <div class="event-item-info-section">

              <div class="event-item-title-section"><?=$_db['event_name']?></div>
              <div class="event-item-venue-section"><span class="emphasize">Venue</span>: <?=$_db['event_venue']?></div>
              <div class="event-item-date-section"><span class="emphasize">Date</span>: <?=$date_string?></div>
              <div class="event-item-stats-section"><div class="stats-button"><span class="emphasize">Interests</span>: <?=$_db['event_interests']?></div><div class="stats-button"><span class="emphasize">Going</span>: <?=$_db['event_going']?></div><div class="stats-button"><span class="emphasize">Boosts this hour</span>: <span id="boosts"><?=$_db['event_boosts']?></span></div></div>
              <div class="event-item-host-section"><div class="event-item-host-image"><img src="https://uniparti.com/assets/css/img/userprofile.png" /></div> <div class="event-item-host-info"><span class="emphasize">Hosted by</span> <?=$_db['event_host']?></div></div>
              <div class="event-item-extras col-12">
                <div class="col-12 top-buttons-section">
                  <?=$_top_buttons?>
                </div>
                <div class="col-12 boost-button-section">
                  <div id="boost" class="button solid black boost">
                    <a>boost event</a>
                    <span class="popuptext" id="myPopup">Sorry, you can only boost once per hour.</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ! [info section] -->

          <!-- share -->
          <div class="col-6">
            <div class="event_share">
              <div class="heading"><span class="underline">Share this event</span></div>
              <div class="share_array">
                <div class="share_line">
                  <div class="icon_section"><i class="fas fa-share"></i></div>
                  <div class="input_section"><input onClick="his.setSelectionRange(0, this.value.length);" value="https://uniparti.com/events/<?=$_event_id?>" disabled /></div>
                </div>
                <div class="share_line">
                  <div class="icon_section"><i class="fab fa-twitter"></i></div>
                  <div class="share_section"><a href="https://twitter.com/intent/tweet?text=Check%20out%20my%20event%20on%20Uniparti!&url=https%3A%2F%2Fwww.uniparti.com/events/<?=$_event_id?>"  onclick="javascript:void window.open('https://twitter.com/intent/tweet?text=Check%20out%20my%20event%20on%20Uniparti!&url=https%3A%2F%2Fwww.uniparti.com/events/<?=$_event_id?>','1554766307006','width=700,height=300,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,left=0,top=0');return false;">Click me to share on Twitter</a></div>
                </div>
                <div class="share_line">
                  <div class="icon_section"><i class="fab fa-facebook"></i></div>
                  <div class="share_section"><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//uniparti.com/events/<?=$_event_id?>"  onclick="javascript:void window.open('https://www.facebook.com/sharer/sharer.php?u=https%3A//uniparti.com/events/<?=$_event_id?>','1554766307006','width=700,height=300,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,left=0,top=0');return false;">Click me to share on Facebook</a></div>
                </div>
              </div>
            </div>
          </div>
          <!-- ! [share] -->

        </div>
        <!-- ! [top section] -->

        <!-- description -->
        <div class="col-12 event-item-description-section">
          <h3>a little about the event</h3>
          <div class="">
            <p>
              <?=$_db['event_description']?>
            </p>
          </div>
        </div>
        <!-- ! [description] -->

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
  <script src="https://uniparti.com/assets/js/product.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-138325547-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-138325547-1');
  </script>
  </body>
</html>
