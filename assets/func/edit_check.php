<?php

require_once('global.func.php');

$response = array();

if($_SERVER['REQUEST_METHOD'] == "POST") {
  $_event_id = $_POST['event_id'];
  $_password = $_POST['password'];

  $_sql = DB::prepare("SELECT event_password FROM `uniparti_events` WHERE `event_uid` = :uid");
  $_sql->execute(['uid' => $_event_id]);
  $_db = $_sql->fetch();

  $hash = $_db['event_password'];

  if (password_verify($_password, $hash)) {
    http_response_code(200);
    $response['response'] = "<strong>Success</strong>: One moment as this page redirects you.";
    $_session = md5(rand(12051996, 92161999) . "-uniparti");
    $_SESSION['sid'] = $_session;
    $response['sid'] = $_session;
    echo json_encode($response);
  }
  else {
    http_response_code(400);
    echo "<strong>An error occurred</strong>: The password you entered was not correct. <br />If you forgot, click the link below or click <a style=\"text-decoration: underline;\" href=\"https://uniparti.com/action/forgot.php\">here</a>.";
  }

}
else {
  http_response_code(403);
  echo "<strong>An error occurred</strong>: Please refresh the page and try again.";
}

?>
