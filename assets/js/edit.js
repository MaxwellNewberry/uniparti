var form = $('#edit_enter');
var eid = $('#event_id').val();
$(form).submit(function(e) {
  e.preventDefault();

  var formData = $(form).serialize();
  $.ajax({
      type: "POST",
      url: "https://uniparti.com/assets/func/edit_check.php",
      data: formData,
      dataType: 'json',
      error: function(e) {
        $('#formMessages').removeClass("success");
        $('#formMessages').addClass("error");
        $('#formMessages').html(e.responseText);
      }
  }).done(function(e) {
    $('#formMessages').removeClass("error");
    $('#formMessages').addClass("success");
    $('#formMessages').html(e.response);
    window.location.replace("https://uniparti.com/events/" + eid + "/edit/edit.php?sid=" + e.sid);
  });
});
