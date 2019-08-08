function showPopUp() {
  $('.popuptext').fadeIn(500);
  $('.popuptext').fadeOut(2100);
}
$('#boost').on('click', function() {
  $(this).confettiButton();
  setTimeout(function() { $('.vnm-confetti').fadeOut(1000);   setTimeout(function() { $('#boost').children('.vnm-confetti').remove();}, 500); }, 500);
  $.post('https://uniparti.com/assets/func/check_boosts.php', {event_id: $('#event_id').val()}, function(msg) {
    var curr_boosts = +($('#boosts').text());
    $('#boosts').text(curr_boosts+1);
  }).fail(function() {
    showPopUp();
  });
});
