<?php

  require_once('global.func.php');

  if($_SERVER['REQUEST_METHOD'] == "POST") {

    $client_id = $_SERVER['REMOTE_ADDR'];
    $uid = $_POST['event_id'];

    $_sql = DB::prepare("SELECT COUNT(*) FROM `uniparti_boosts` WHERE `ip` = :ip AND `uid` = :uid");
    $_sql->execute(['ip' => $client_id, 'uid' => $uid]);
    $data_exists = ($_sql->fetchColumn() > 0) ? true : false;

    if($data_exists == false) {
      // no boosts this hour
      http_response_code(200);
      $_sql = DB::prepare("UPDATE `uniparti_events` SET `event_boosts` = event_boosts + 1 WHERE `event_uid` = :uid");
      $_sql->execute(['uid' => $uid]);
      $_sql = DB::prepare("INSERT INTO `uniparti_boosts` (`ip`, `uid`) VALUES (:ip, :uid)");
      $_sql->execute(['ip' => $client_id, 'uid' => $uid]);
    }
    else {
      // boost this hour
      http_response_code(403);
    }

  }


?>
