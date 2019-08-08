<?
  require_once('../assets/func/global.func.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- title -->
    <title>uniparti [news]</title>

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
    <link rel="stylesheet" href="https://uniparti.com/assets/css/style_news.css" />
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
            <li class="navigation-list-item active"><a href="https://uniparti.com/news/">news</a></li>
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
      <div class="col-10">

        <div class="heading">
          <span class="underline">latest <span class="emphasize">uniparti</span> news</span>
        </div>
        <div class="sub-heading">
          everything you need to know
        </div>

        <!-- new content -->
        <div class="col-12 content">

          <h1>win a <span class="underline">new pair</span> of gen 1 airpods</h1>

          <!-- inner spacer -->
          <div class="col-12">
            <div class="inner spacer">
            </div>
          </div>
          <!-- ! [inner spacer] -->

          <div class="col-10">
            <p>
              <h3>introduction</h3>
              we're hosting a launch party eqse competition and the winner walks away with a brand new pair of airpods.
              keep reading to learn more about contest rules, how to enter, and other necessary information about this contest.
            </p>
            <p>
              <h3>how to enter</h3>
              entering the contest is very easy. simply advertise your event on uniparti and when creating your post, make sure you select <span class="code"><span class="box example">✔</span> participate in airpod contest</span>.
              as long as you hit that checkmark then you are entered. this can be added on at any time. alternatively, if you are not currently hosting any events, you can pay a fee of <span class="code">$5</span> and be entered.
              <span class="underline">there are no current limit on amount of entries</span>.
            </p>
            <p>
              <h3>contest rules</h3>
              <ul>
                <li>event entry must be a valid event occuring on or after contest start date.</li>
                <li>each event is subject to the determination of validity by uniparti and its affiliates.</li>
                <li>event posted must have the entry mode activate in the event settings before the contest end date.</li>
                <li>uniparti is not responsible for any event that is entered due to user error.</li>
                <li>rules are subject to change at the discretion of uniparti.</li>
              </ul>
            </p>
            <p>
              <h3>disclaimer</h3>
              once an event reaches the officially specified end date and time, the host will lost the ability to edit that event. you must ensure that your event is entered, otherwise the liability falls on the host. uniparti is not responsible
              for any event that was not entered by this specified date and time.
            </p>
          </div>

        </div>
        <!-- ! [news content] -->

      </div>
      <!-- ! [news] -->

      <!-- spacer -->
      <div class="col-12">
        <div class="spacer-section three">
          <div class="spacer-text">
            <p id="spacer-text">best of luck, maybe</p>
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
