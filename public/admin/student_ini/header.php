<?php
error_reporting(E_ALL);  
ini_set('display_errors', 1); 
session_start();
if (isset($_SESSION["student_logged_in"])) {
    $student_logged_in = $_SESSION["student_logged_in"];
    session_write_close();
} else {
    session_unset();
    session_write_close();
    $url = "/";
    header("Location: $url");
}
use App\database\Database;
require_once __DIR__ . '/../../../vendor/autoload.php';
$db = Database::getInstance();
$db->getConnection();

?>
<?php 
  $posts = $db->select("SELECT nim, name, lastname, email, address FROM student WHERE nim= $student_logged_in");
  if(mysqli_num_rows($posts) > 0): 
    foreach($posts as $post):
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <title>Blog Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="student_ini/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="student_ini/css/blog.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="text-muted" href="#"><?php echo $student_logged_in;?></a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#"><?php echo $post['name'];?></a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="text-muted" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
            </a>
            <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
          </div>
        </div>
      </header>
      <?php 
    endforeach;
    endif; ?>