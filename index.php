<?
  require_once('assets/func/global.func.php');

  $_sql = DB::prepare("SELECT * FROM `uniparti_events` ORDER BY `event_boosts` DESC LIMIT 3");
  $_sql->execute();

?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- title -->
    <title>uniparti [home]</title>

    <!-- meta -->
    <meta charset="utf-8">
    <meta name="description" content="UniParti is a community-reliant event website that provides all the latest and upcoming events in your area.">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="google-site-verification" content="kU7Af3FXTQs3YvhBMcf3kJihYdZ9H5In1JUT1tYZQMY" />
    <meta name =”robots” content=”index”>

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
    <link rel="stylesheet" href="https://uniparti.com/assets/css/style_index.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  </head>
  <body>

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
            <li class="navigation-list-item active"><a href="https://uniparti.com">home</a></li>
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
        <li><a href="https://uniparti.com/">home</a></li>
        <li><a href="https://uniparti.com/events/">events</a></li>
        <li><a href="https://uniparti.com/news/">news</a></li>
        <li><a href="https://uniparti.com/contact/">contact us</a></li>
        <li><a href="https://uniparti.com/create/">post an event</a></li>
      </ul>
      <!-- ! [mobile menu list] -->
    </div>
    <!-- ! [mobile menu] -->

    <!-- hero -->
    <div class="hero-section">
      <div id="movie-area"></div>
      <div class="hero-text">
        <p id="hero-text">events by you, for you.</p>
      </div>
      <div class="arrow-down" id="arrow-down"><i class="fas fa-angle-double-down"></i></div>
    </div>
    <!-- ! [hero] -->

    <div class="wrapper" id="wrapper">

      <!-- trending events -->
      <div class="col-12">
        <div class="trending-events">
          <!-- heading -->
          <div class="col-12">
            <div class="heading"><span class="underline">trending events</span></div>
            <div class="sub-heading">
              the top 3 most boosted events of the hour
            </div>
          </div>
          <!-- ! [trending events heading] -->

          <!-- events list -->
          <div class="col-12">
            <div class="event-list">

              <?php

              while($row = $_sql->fetch()) {

                $row['event_cover'] = ($row['event_cover']) ? $row['event_cover'] : "blank_cover.jpg";
                $date_string = date("l, F j, Y", $row['event_sdate']);
                $autogenerated = ($row['autogenerated']) ? "<div class=\"event-item-auto-generated\">auto-generated by uniparti</div>" : "";

                echo "
                <!-- event item -->
                <div class=\"col-4 event-item\">
                  <a href=\"https://uniparti.com/events/{$row['event_uid']}/\">
                    <div class=\"event-item-image-section\" style=\"background:url('https://uniparti.com/events/cover/{$row['event_cover']}') center center / cover no-repeat;\"></div>
                    <div class=\"event-item-information-section\">
                      <div class=\"event-item-title-section\">" . $row['event_name'] . "</div>
                      <div class=\"event-item-date-section\">" . $date_string . "</div>
                    </div>
                  </a>
                </div>
                <!-- ! [event item] -->
                ";

                $x++;

              }

              ?>

            </div>
          </div>
          <!-- ! [events list] -->

          <!-- event button -->
          <div class="col-12">
            <div class="event-button">
              <div class="button solid black">
                <a href="https://uniparti.com/events/">see all events</a>
              </div>
            </div>
          </div>
          <!-- ! [event button] -->

        </div>
      </div>
      <!-- ! [trending events] -->

      <!-- spacer -->
      <div class="col-12">
        <div class="spacer-section one">
          <div class="spacer-text">
            <p id="spacer-text">what we're all about</p>
          </div>
        </div>
      </div>
      <!-- ! [spacer] -->

      <!-- about us -->
      <div class="col-12">
        <div class="about-us">
          <!-- heading -->
          <div class="col-12">
            <div class="heading"><span class="underline">about us</span></div>
          </div>
          <!-- ! [about us - heading] -->

          <!-- about us content -->
          <div class="col-12">
            <div class="about-us-content">
              <p>uniparti is an independent event hosting website that allows the community to post, share, and invite other users to their local events.</p>
              <p>beyond sharing, our community has the ability to give away or sell tickets to their events, and even handle transactions right from uniparti.</p>

                <div class="col-12 about-timeline">
                  <div class="col-6 about-section one img row-one">
                    <span class="helper"></span>
                    <img src="https://uniparti.com/assets/css/img/about/about_1.svg" />
                  </div>
                  <div class="col-6 about-section two text row-one">
                    <p><span class="emphasize">posting on uniparti is easy</span></p>
                    <p>uniparti is a free, online event listing site the is open to just about anyone! organizations, individuals, and more - everyone is welcome.</p>
                  </div>
                  <div class="col-6 about-section one text row-two">
                    <p><span class="emphasize">start by filling out some basic information</span></p>
                    <p>just things like the name of event, when and where it's going to happen, as well as an event description. but don't worry, you can always change this later.</p>
                  </div>
                  <div class="col-6 about-section two img row-two">
                    <span class="helper"></span>
                    <img src="https://uniparti.com/assets/css/img/about/about_2.svg" />
                  </div>
                  <div class="col-6 about-section one img row-three">
                    <span class="helper"></span>
                    <img src="https://uniparti.com/assets/css/img/about/about_3.svg" />
                  </div>
                  <div class="col-6 about-section two text row-three">
                    <p><span class="emphasize">add some optional features</span></p>
                    <p>if you want to sell tickets, make sure you fill out the proper information so we can process everything promptly. then, you can add other stuff like host links and pictures.</p>
                  </div>
                  <div class="col-6 about-section one text row-four">
                    <p><span class="emphasize">that's it! you got a listing to be proud of</span></p>
                    <p>share your event link, get your friends, family, and anyone else to boost your event and you may just see it on the trending page.</p>
                  </div>
                  <div class="col-6 about-section two img row-four">
                    <span class="helper"></span>
                    <img src="https://uniparti.com/assets/css/img/about/about_4.svg" />
                  </div>

                </div>
            </div>
          </div>
          <!-- ! [about us contet] -->

        </div>
      </div>
      <!-- ! [about us] -->

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
  <script>var index_page = true;</script>
  <script src="https://uniparti.com/assets/js/global.js"></script>
  <script src="https://uniparti.com/assets/js/index.js"></script>
  <script>

</script>
  </body>
</html>
