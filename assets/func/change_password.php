<?php

  require_once('global.func.php');

  $_sql = DB::prepare("SELECT * FROM `uniparti_forgot_password` WHERE `session_id` = :sid AND `event_uid` = :uid AND `validated` = 1");
  $_sql->execute(['sid' => $_POST['sid'], 'uid' => $_POST['uid']]);
  $num_rows = $_sql->fetchColumn();

  if($num_rows > 0) {
    // email validated and password change is approved
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $_sql = DB::prepare("UPDATE `uniparti_events` SET `event_password` = :password WHERE `event_uid` = :uid");
    $_sql->execute(['password' => $password, 'uid' => $_POST['uid']]);
    echo "Password change complete, you may close this page.";
  }
  else {
    echo "An error occurred, make sure you validated your request and try again.";
  }

?>
