<?php

  if($_SERVER['REQUEST_METHOD'] == "GET" && $_GET['activation_key'] == "d94cb212c1d4f976a32964981928622c")
  {
    if(date("H:00:00", strtotime(date('Hi'))) == date("H:i:00", date('Hi')))
    {
      echo "Not on the hour yet.";
    }
    else
    {
      require_once('../assets/func/global.func.php');

      http_response_code(200);
      $_sql = DB::prepare("UPDATE `uniparti_events` SET event_boosts = 0");
      $_sql->execute();
      $_sql = DB::prepare("TRUNCATE TABLE `uniparti_boosts`");
      $_sql->execute();
    }
  }
  else {
    http_response_code(400);
    echo "You do not have permissions to be here.";
  }

?>
