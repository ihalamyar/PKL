<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\database\Database;

$db = Database::getInstance();
$db->getConnection();
$course_apply_id = "";
$guest_apply_id = "";
$is_active = "";
session_start();
if (!empty($_POST)) {
   
        $course_apply_id = mysqli_real_escape_string($db->conn, $_POST['course_apply_id']);
        $guest_apply_id = mysqli_real_escape_string($db->conn, $_POST['guest_apply_id']);
        $is_active = mysqli_real_escape_string($db->conn, $_POST['is_active']);
        $sql = "INSERT INTO enroll (course_id, guest_apply_id)VALUES('$course_apply_id', '$guest_apply_id' )";
        if ($db->insert($sql) == TRUE) {
            echo 'Apply successfully';
        } else {
            echo 'Somethin went wrong';
        }
    
    $db->close();
}
