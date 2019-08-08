<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
  $_event_id = $_POST['event_id'];
  $_password = $_POST['password'];

  http_response_code(200);
  echo $_event_id;
  echo "te24355st";
}
else {
  http_response_code(403);
  echo "<strong>An error occurred</strong>: Please refresh the page and try again.";
}

?>
