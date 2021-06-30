<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use App\database\Database;
$db = Database::getInstance();
$db_connection = $db->getConnection();
$event_title = NULL;
$event_description = NULL;
$event_speaker = NULL;
$event_location = NULL;
$starttimepicker = NULL;
$endtimepicker = NULL;

if (!empty($_POST)) {
    $event_title = validation(mysqli_real_escape_string($db->getConnection(), $_POST['event_title']));
    $event_description = validation(mysqli_real_escape_string($db->getConnection(), $_POST['event_description']));
    $event_speaker = validation(mysqli_real_escape_string($db->getConnection(), $_POST['event_speaker']));
    $event_location = validation(mysqli_real_escape_string($db->getConnection(), $_POST['event_location']));
    $starttimepicker = (mysqli_real_escape_string($db->getConnection(), $_POST['starttimepicker']));
    $endtimepicker = (mysqli_real_escape_string($db->getConnection(), $_POST['endtimepicker']));
    try {
        $sql = "INSERT INTO event (`title`, `description`, `speaker`, `location`, `start_time`,`start_end`)
                VALUES ('" . $event_title . "', 
                        '" . $event_description .
                        "','" . $event_speaker .
                        "', '" . $event_location . 
                        "', '" . $starttimepicker . 
                        "' , '" . $endtimepicker . "' )";
        if ($db->insert($sql) == TRUE) {
            echo 'New Event Uploaded';
        } else {
            echo 'Something went wrong';
        }
    } catch (\Throwable $th) {
        echo 'Something went wrong';
    }
}
function validation($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
    return $data;
}
