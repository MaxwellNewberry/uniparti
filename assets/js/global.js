$(document).ready(function() {
  $('.preloader').fadeOut('slow');
   $('.wrapper').fadeIn();
   $('.footer').fadeIn();
   if(!index_page) { $('#navigation-container').css('height', '70px'); }
   $("#mobile_symbol").click(function() {
     if($("#mobile_menu_list").is(":visible"))
     {
       $("#mobile_menu_list").hide(300);
     }
     else {
       $("#mobile_menu_list").show(300);
     }
   });
 });

$(window).scroll(function() {
  if ( $(window).scrollTop() >= 80 ) {
      $('#navigation-container').css("height", "70px");
  } else {
    if(index_page) {
      $('#navigation-container').css("height", "0px");
    }
  }
});
