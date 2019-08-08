<?
  require_once('../assets/func/global.func.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- title -->
    <title>uniparti [contact]</title>

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
    <link rel="stylesheet" href="https://uniparti.com/assets/css/style_contact.css" />
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
            <li class="navigation-list-item"><a href="https://uniparti.com/">home</a></li>
            <li class="navigation-list-item"><a href="https://uniparti.com/events/">events</a></li>
            <li class="navigation-list-item"><a href="https://uniparti.com/news/">news</a></li>
            <li class="navigation-list-item active"><a href="https://uniparti.com/contact/">contact us</a></li>
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
      <div class="col-10">

        <div class="heading">
          <span class="underline">let's get in <span class="emphasize">touch</span></span>
        </div>
        <div class="sub-heading">
          from promos to support, we're here to help
        </div>

        <!-- new content -->
        <div class="col-12 content">

          <h1>what can <span class="underline">we</span> help you with?</h1>

          <div class="col-10">
            <p>
              <h3>general support</h3>
              if you need to contact us about anything under the sun, the best place to do so is through e-mail at <span class="emphasize underline">hello@uniparti.com</span>.
            </p>
            <p>
              <h3>event promotion</h3>
              we have varying ways you can promote your event to be seen by more people.
            </p>
            <p>
              <h4>basic promotion</h4>
              the most popular way for this to happen is to have your event brought to the front of the list and shown in the "promoted events" section. below, you can see the <span class="emphasize">yellow</span> example event is a promoted event that is moved to the front of the list.

              <img src="https://uniparti.com/assets/css/img/p_example.png" />

              this allows your event to be seen first. before the user scrolls through the rest of the events. this type of promotion is generally cheaper, however, the duration and time of year are the two variables that could change the cost. <span class="underline">please reach out via e-mail (<span class="italic">above</span>) about pricing.</span>
            </p>
            <p>
              <h4>banner promotion</h4>
              similar to the basic promotion, we can also do a full banner promotion. this would mean that your event would take up three spaces instead of one (<span class="italic">shown below</span>). this would allow our users to be more incline to click on your event, or even attend.

              <img src="https://uniparti.com/assets/css/img/b_example.png" />

              you will be give the ability to have a text-based posting on this banner size, or a large image. this is up to you and we can show you different styles and layouts that can happen with this type of promotion. like the basic promotion, the price depends on duration and time of year. <span class="underline">please reach out via e-mail (<span class="italic">above</span>) about pricing.</span>
            </p>
          </div>

        </div>
        <!-- ! [news content] -->

      </div>
      <!-- ! [news] -->

      <!-- spacer -->
      <div class="col-12">
        <div class="spacer-section four">
          <div class="spacer-text">
            <p id="spacer-text">what's the word, perd?</p>
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
  <script>var index_page = false;</script>
  <script src="https://uniparti.com/assets/js/global.js"></script>
  </body>
</html>
