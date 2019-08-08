<?php

  require_once('Mail.php');
  require_once('Mail/mime.php');
  require_once('global.func.php');

  $validate_id = md5(rand(12051996,92161999) . "uniparti");
  $from = 'Max from Uniparti<max@uniparti.com>';
  $to = '<' . $_POST['email'] . '>';
  $subject = 'Forgot Password: Please validate your request using this link.';
  $text_body = "Forgotten Password Request: Hello, someone using your information has requested a password reset for your event. If that was you, please click the following link to validate your request. Click the following link to validate: https://uniparti.com/assets/func/validate_email.php?uid=" . $validate_id ."&sid=" . $_POST['session_id'];
  $html_body = "<html><head><style>@import url('https://fonts.googleapis.com/css?family=Playfair+Display|Montserrat|Open+Sans:300,400');</style><body><h1 style=\"font-size: 30px; font-family: 'Playfair Display', serif;\">Forgotten Password Request</h1><br /><p style=\"font-size: 16px; font-family: 'Open Sans', sans-serif;\">Hello, someone using your information has requested a password reset for your event. If that was you, please click the following link to validate your request.</p><p>Click the following link to validate: https://uniparti.com/assets/func/validate_email.php?uid=" . $validate_id . "&sid=" . $_POST['session_id'] . "</p></body></html>";
  $crlf = "\r\n";

  $mime = new Mail_mime($crlf);
  $mime->setTXTBody($text_body);
  $mime->setHTMLBody($html_body);

  $headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
  );

  $body = $mime->get();
  $headers = $mime->headers($headers);

  $smtp = Mail::factory('smtp', array(
          'host' => 'ssl://smtp.gmail.com',
          'port' => '465',
          'auth' => true,
          'username' => 'max@uniparti.com',
          'password' => 'Hipporules2?'
  ));

  $_sql = DB::prepare("SELECT * FROM `uniparti_forgot_password` WHERE `event_uid` = :uid AND `recovery_email` = :email AND `validated` = 1 AND `session_id` = :session_id");
  $_sql->execute(['uid' => $_POST['event_list'], 'email' => $_POST['email'], 'session_id' => $_POST['session_id']]);
  $num_rows = $_sql->fetchColumn();

  if($num_rows > 0) {
    // E-mail validated!
    http_response_code(200);
    $_sql = DB::prepare("SELECT * FROM `uniparti_events` WHERE `event_uid` = :uid LIMIT 1");
    $_sql->execute(['uid' => $_POST['event_list']]);
    $_db = $_sql->fetch();

    echo "<div class=\"change_password\">
      <div class=\"formMessages\"></div>
      <form id=\"change_password\" method=\"post\">
        <div class=\"step_four\">
          <div class=\"content\"><span class=\"emphasize\">step four</span>: enter a new password for " . $_db['event_name'] . ".</div>
          <div class=\"form_section\"><input type=\"password\" name=\"password\" id=\"e_password\" placeholder=\"Enter your new password here\"/></div>
        </div>
        <input value=\"" . $_POST['session_id'] . "\" name=\"sid\" type=\"hidden\" /><input value=\"" . $_POST['event_list'] . "\" name=\"uid\" type=\"hidden\" />
        <div class=\"form_section_bottom\" id=\"response\"><input type=\"submit\" name=\"submit\" id=\"e_submit\" class=\"button\" /></div>
      </form>
    </div>

    <script>var form=$(\"#change_password\");$(form).submit(function(s){s.preventDefault();var a=$(form).serialize();$.ajax({url:\"https://uniparti.com/assets/func/change_password.php\",data:a,type:\"POST\",success:function(s){ $(\"#formMessages\").addClass(\"success\"),$(\"#formMessages\").html(s)}})});</script>
    ";


  }
  else {
    // Email not validated
    $_sql = DB::prepare("SELECT * FROM `uniparti_forgot_password` WHERE `event_uid` = :uid AND `recovery_email` = :email AND `validated` = 0 AND `session_id` = :session_id");
    $_sql->execute(['uid' => $_POST['event_list'], 'email' => $_POST['email'], 'session_id' => $_POST['session_id']]);
    if($_sql->fetchColumn() == 0) {
      // Email not sent yet.
      $_sql = DB::prepare("INSERT INTO `uniparti_forgot_password` (  `event_uid` ,  `recovery_email` ,  `validated` ,  `validate` ,  `session_id` ) VALUES (:uid, :email, 0, :v, :session_id)");
      $_sql->execute(['uid' => $_POST['event_list'], 'email' => $_POST['email'], 'v' => $validate_id, 'session_id' => $_POST['session_id']]);
      $mail = $smtp->send($to, $headers, $body);
      if (PEAR::isError($mail)) {
          http_response_code(503);
      } else {
          http_response_code(400);
          echo "Email sent.";
      }
    }
    else {
      http_response_code(400);
    }
  }

?>
