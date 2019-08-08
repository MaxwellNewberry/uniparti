<?php

  require_once('global.func.php');

  if($_SERVER['REQUEST_METHOD'] == "POST") {

  $_email = $_POST['email'];
  $_sql = DB::prepare("SELECT * FROM `uniparti_events` WHERE `event_recovery` = :email");
  $_sql->execute(['email' => $_email]);

  $_events_array = array();

  while($_db = $_sql->fetch()) {
    $_events_array[$_db['event_uid']] = $_db['event_name'];
  }

  http_response_code(200);
  echo json_encode($_events_array);

  }
  else {
    http_response_code(403);
    die('You do not have access to request this page.');
  }
?>
