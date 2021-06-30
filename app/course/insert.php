<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use App\database\Database;
$db = Database::getInstance();
$db_connection = $db->getConnection();
$postuserid = "";
$posttitle = "";
$postprice = "";
$postdescription = "";
$message = "";
// isset($_POST['submitCourse'])
if (isset($_POST['makeCourseBtn'])) {
    $postuserid = validation(mysqli_real_escape_string($db->getConnection(), $_POST['postuserid']));
    $posttitle = validation(mysqli_real_escape_string($db->getConnection(), $_POST['posttitle']));
    $postprice = validation(mysqli_real_escape_string($db->getConnection(), $_POST['postprice']));
    $postdescription = (mysqli_real_escape_string($db->getConnection(), $_POST['postdescription']));
    $randomanem = time();
    $file = $_FILES['course__thumbnail'];
    $filename = $_FILES['course__thumbnail']['name'];
    $filetmpname = $_FILES['course__thumbnail']['tmp_name'];
    $filesize = $_FILES['course__thumbnail']['size'];
    $fileerror = $_FILES['course__thumbnail']['error'];
    $filetype = $_FILES['course__thumbnail']['type'];
    $ext = pathinfo($_FILES['course__thumbnail']['name'], PATHINFO_EXTENSION);
    $fileext = explode('.', $filename);
    $fileactualex = strtolower(end($fileext));
    $allow = array('jpg', 'jpeg', 'png');
    $fileDes = '../../public/courseThubnail/' . $posttitle . "_" . time() . "." . $ext;
    if(in_array($fileactualex, $allow)){
        if($fileerror ==0){
                if(move_uploaded_file($filetmpname , $fileDes)){
                    
                    try {
                        $sql = "INSERT INTO courses (`user_id`
                                 , `title`
                                 , `price`
                                 , `description`
                                 , `thubnial`)
                                 VALUES ('" . $postuserid . "'
                                 , '" . $posttitle . "'
                                 ,'" . $postprice . "'
                                 , '" . $postdescription . "'
                                 , '" . $fileDes . "')";
                         if ($db->insert($sql) === TRUE) {
                             $message = 'New Post Uploaded';
                         } else {
                            $message ='Something went wrong';
                         }
                     } catch (\Throwable $th) {
                        $message = 'Something went wrong';
                     }
                }else{
                    echo "File did not upload";
                }
           
        }else{
            echo "There was an error";
        }
    }else{
        echo "File not recognized";
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
