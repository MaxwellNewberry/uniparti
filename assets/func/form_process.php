<?

session_start();

if($_POST['sid'] != $_SESSION['session_id']) {
  http_response_code(403);
  die ("You do not have permission to access to this page.");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

  $errors = array();

  /* Error Check */
  if(empty($_POST['event_name'])) {
    $errors[] = "You must include a name for your event.";
  }
  if(strlen($_POST['event_name']) > 22) {
    //$errors[] = "Your event name cannot exceed 22 characters.";
  }

  $_dates = array('start' => $_POST['event_sdate'], 'end' => $_POST['event_edate']);
  foreach($_dates as $t => $d) {
    $_date_array = explode("-", $d);
    if(count($_date_array) == 3) {
      foreach($_date_array as $_date_part) {
        if(empty($_date_part)) {
          $errors[] = "Please make sure you include a full date.";
        }
      }
      if(strlen($_date_array[2]) == 4) { $_safari = true; }
      if(strlen($_date_array[2]) < 2 || strlen($_date_array[1]) < 2 || strlen($_date_array[0]) < 4 && !$_safari) {
        $errors[] = "Your please organize your {$t} date by MM-DD-YYYY.";
      }
      if(strlen($_date_array[0]) < 2 || strlen($_date_array[1]) < 2 || strlen($_date_array[2]) < 4 && $_safari) {
        $errors[] = "Your please organize your {$t} date by MM-DD-YYYY.";
      }
      if(strtotime(date("d-m-Y")) > strtotime($d)) {
        $errors[] = "Your {$t} date must be sometime in the future.";
      }
      if($_date_array[0] > 2020) {
        $errors[] = "Your {$t} date must be before 2021.";
      }
    }
    else {
      $errors[] = "Please organize your {$t} date by MM-DD-YYYY.";
    }
  }
  if(empty($_POST['event_sdate']) || empty($_POST['event_edate'])) {
    $errors[] = "You must include a date for your event.";
  }
  if(strtotime($_POST['event_sdate']) > strtotime($_POST['event_edate'])) {
    $errors[] = "Your end date must be on or after your start date.";
  }

  if(empty($_POST['event_stime']) || empty($_POST['event_etime'])) {
    $errors[] = "You must include a start and/or end time for your event.";
  }

  if(empty($_POST['event_venue'])) {
    $errors[] = "You must include a location for your event.";
  } else {
    if($_POST['addr'] == "false") {
      $errors[] = "The address you entered is invalid, please re-enter.";
    }
  }

  if((strtotime($_POST['event_end_time']) < strtotime($_POST['event_start_time'])) && (strtotime($_POST['event_sdate']) == strtotime($_POST['event_edate']))) {
    $errors[] = "Your end time must be after your start time.";
  }

  if($_FILES) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check == false) {
      $errors[] = "Your cover image must be an image.";
    }
  }

  if($_POST['event_category'] == "select") {
    $errors[] = "You must select a category for your event.";
  }

  if(empty($_POST['event_host_name'])) {
    $errors[] = "You must include the name of the event hosts.";
  }

  if(empty($_POST['event_password']) && $_GET['action'] !== "edit") {
    $errors[] = "You must set an event password.";
  }

  if(empty($_POST['event_recovery']) && $_GET['action'] !== "edit") {
    $errors[] = "Please provide a recovery e-mail, in case you forget your password.";
  }

  if($_POST['event_terms'] == "false") {
    $errors[] = "You must agree to the terms & conditions in order to use our services.";
  }

  if(empty($errors)) {

    /* Unique */
    $unique_event_id = rand(1000, 4000);

    $_alphabet_string = "";
    $_alphabet_array = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    for($i = 0; $i < 5; $i++) {
      $_rand_alphabet = rand(0, 25);
      $_alphabet_string = $_alphabet_string . $_alphabet_array[$_rand_alphabet];
    }

    $unique_event_id = $unique_event_id . "-" . $_alphabet_string;

    /* Event name */
    $event_name = strip_tags($_POST['event_name']);
    $event_name = addslashes(trim($event_name));

    /* Date */
    $event_sdate = strtotime($_POST['event_sdate']); // covert back: date("F j, Y");
    $event_edate = strtotime($_POST['event_edate']);

    /* Time */
    $event_stime = strtotime($_POST['event_stime']); // convert back: date("g:i a");
    $event_etime = strtotime($_POST['event_etime']); // convert back: date("g:i a");

    /* Venue */
    $event_venue = strip_tags($_POST['event_venue']);
    $event_venue = addslashes(trim($event_venue));

    /* Event host */
    $event_host_name = strip_tags($_POST['event_host_name']);
    $event_host_name = addslashes(trim($event_host_name));

    /* Cover photo */
    if($_FILES) {
      $target_dir = "../../events/cover/";
      $target_file = $unique_event_id . "-" . basename($_FILES["file"]["name"]);
      if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $target_file)) {
        die('There was an error with uploading the image.');
      }
    }

    /* Category */
    $event_category = $_POST['event_category'];

    /* Details */
    $event_details = addslashes(trim($_POST['details']));

    /* Password */
    $event_password = password_hash($_POST['event_password'], PASSWORD_DEFAULT);

    /* Recovery E-mail */
    $event_email = filter_var(trim($_POST["event_recovery"]), FILTER_SANITIZE_EMAIL);

    /* Time Taken */
    $time_taken = date("i:s", strtotime(date("G:i:s", strtotime($_POST['end_time']))) - strtotime(date("G:i:s",$_SESSION['start_time'])));

    http_response_code(200);

    require_once('db.func.php');

    $event_contest = $_POST['event_contest'];

    if($_GET['action'] == "edit") {

      $_sql = DB::prepare("UPDATE `uniparti_events` SET `event_name` = :event_name, `event_host` = :event_host, `event_venue` = :event_venue, `event_sdate` = :event_sdate, `event_edate` = :event_edate, `event_stime` = :event_start_time, `event_etime` = :event_end_time, `event_category` = :event_category WHERE `event_uid` = :eid");
      $_sql->execute(['event_name' => $event_name, 'event_host' => $event_host_name, 'event_venue' => $event_venue, 'event_sdate' => $event_sdate, 'event_edate' => $event_edate, 'event_start_time' => $event_stime, 'event_end_time' => $event_etime, 'event_category' => $event_category, 'eid' => $_POST['eid']]);

      echo "Edited information.";

    }
    else {

      $_sql = "INSERT INTO  `uniparti_events`  (  `uid` ,  `event_uid` ,  `event_name` ,  `event_host` ,  `event_venue` ,  `event_sdate` ,  `event_edate` ,  `event_stime` ,  `event_etime` ,  `event_cover` , `event_category` ,  `event_password` ,  `event_recovery` ,  `event_description` ,  `sell_tickets` ,  `event_interests` ,  `event_going` ,  `event_boosts` ,  `autogenerated` ,  `airpod_contest` , `visible` ,  `time_taken` )  VALUES (NULL,  '$unique_event_id',  '$event_name', '$event_host_name',  '$event_venue', '$event_sdate',  '$event_edate',  '$event_stime',  '$event_etime', '$target_file',  '$event_category',  '$event_password',  '$event_email',  '$event_details',  '0',  '0',  '0',  '0',  '0',  '$event_contest', '1', '$time_taken');";
      $_query = DB::query($_sql);

      mkdir('../../events/' . $unique_event_id);
      mkdir('../../events/' . $unique_event_id . '/edit/');
      copy('../../copy/index.php', '../../events/' . $unique_event_id . '/index.php');
      copy('../../copy/index_edit.php', '../../events/' . $unique_event_id . '/edit/index.php');
      copy('../../copy/index_edit_page.php', '../../events/' . $unique_event_id . '/edit/edit.php');

      echo $unique_event_id;

    }

  }

  else {
    //error
    http_response_code(400);
    echo "The following errors occurred: <ul><li>";
    echo implode("</li><li>", $errors);
    echo "</li></ul>";
  }

}

else {
  http_response_code(403);
  die('You do not have permission to access to this page.');
}
?>
