$(window).ready(function() {
  $('#movie-area').load('movie.html');
});
$('#arrow-down').on('click', function() {
  var top = ($(window).width() < 768) ? $("#wrapper").offset().top - 69 : $("#wrapper").offset().top;
  $([document.documentElement, document.body]).animate({
    scrollTop: top
  }, 500);
});
