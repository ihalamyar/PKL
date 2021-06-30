<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\database\Database;

$db = Database::getInstance();
$db_connection = $db->getConnection();
$course_post_id = "";
$course_post_title = "";
$course_post_price = "";
$course_post_desc = "";
if (!empty($_POST)) {
    try {
        $course_post_id = validation(mysqli_real_escape_string($db->getConnection(), $_POST['course_post_id']));
        $course_post_title = validation(mysqli_real_escape_string($db->getConnection(), $_POST['course_post_title']));
        $course_post_price =  validation(mysqli_real_escape_string($db->getConnection(), $_POST['course_post_price']));
        $course_post_desc = mysqli_real_escape_string($db->getConnection(), $_POST['course_post_desc']);
        $update = "UPDATE courses SET title =  '$course_post_title',
                            price = '$course_post_price', 
                            description = '$course_post_desc'
                            WHERE id = '$course_post_id'  ";
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
