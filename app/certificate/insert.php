<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use App\database\Database;
$db = Database::getInstance();
$db_connection = $db->getConnection();
$certificate__name = NULL;
$certificate__description = NULL;
$certificate__studentid = NULL;
$certificate__event = NULL;
$certificate__coursesid = NULL;

if (!empty($_POST)) {
    $certificate__name = validation(mysqli_real_escape_string($db->getConnection(), $_POST['certificate__name']));
    $certificate__description = validation(mysqli_real_escape_string($db->getConnection(), $_POST['certificate__description']));
    $certificate__studentid = validation(mysqli_real_escape_string($db->getConnection(), $_POST['certificate__studentid']));
    $certificate__event = validation(mysqli_real_escape_string($db->getConnection(), $_POST['certificate__event']));
    $certificate__coursesid = (mysqli_real_escape_string($db->getConnection(), $_POST['certificate__coursesid']));
    try {
        $sql = "INSERT INTO certificate
                     (`certificate_name`,`certificate_desc`,`student_id`,`event_id`,`courses_id`)
                            VALUES
                        ('".$certificate__name."',
                         '".$certificate__description."',
                         '".$certificate__studentid."',
                         '".$certificate__event."',
                         '".$certificate__coursesid."')";
        if ($db->insert($sql) === TRUE) {
            echo 'New Certificate Created';
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
