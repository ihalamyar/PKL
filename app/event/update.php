<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\database\Database;

$db = Database::getInstance();
$db_connection = $db->getConnection();
$event_id = "";
$event_edit_id = "";
$event_edit_title = "";
$evet_edit_description = "";
$event_edit_speaker = "";
$evet_edit_location = "";
$edit_event_start_time = "";
$edit_event_end_time = "";
if (!empty($_POST)) {
    try {
        $event_id = validation(mysqli_real_escape_string($db->getConnection(), $_POST['event_id']));
        $event_edit_title =  validation(mysqli_real_escape_string($db->getConnection(), $_POST['event_edit_title']));
        $evet_edit_description = mysqli_real_escape_string($db->getConnection(), $_POST['evet_edit_description']);
        $event_edit_speaker = mysqli_real_escape_string($db->getConnection(), $_POST['event_edit_speaker']);
        $evet_edit_location = mysqli_real_escape_string($db->getConnection(), $_POST['evet_edit_location']);
        $edit_event_start_time = mysqli_real_escape_string($db->getConnection(), $_POST['edit_event_start_time']);
        $edit_event_end_time = mysqli_real_escape_string($db->getConnection(), $_POST['edit_event_end_time']);
        $update = "UPDATE event SET title =  '$event_edit_title',
            description = '$evet_edit_description',
            speaker = '$event_edit_speaker',
            location = '$evet_edit_location',
            start_time = '$edit_event_start_time',
            start_end = '$edit_event_end_time'
            WHERE id = '$event_id'  ";
        if ($db->getConnection()->query($update)) {
            echo 'Data is updating...';
        } else {
            echo 'Somethin went wrong';
        }
    } catch (\Throwable $th) {
        echo 'Somethin went wrong';
    }
    $db->getConnection()->close();
}
function validation($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
    return $data;
}
