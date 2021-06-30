<?php

use App\database\Database;

require_once __DIR__ . '/../../../vendor/autoload.php';
$db = Database::getInstance();
$db->getConnection();
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (isset($_SESSION["guest_login_id"])) {
    $guest_login_id = $_SESSION["guest_login_id"];
    session_write_close();
} else {
    session_unset();
    session_write_close();
    $url = "/";
    header("Location: $url");
}
$posts = $db->select("SELECT id, email,  name,lastname, guest_id, created_at FROM guest_login WHERE guest_id = '$guest_login_id'");
if (is_array($posts) || is_object($posts)) {
    if (mysqli_num_rows($posts) > 0) {
        foreach ($posts as $post) {

?>
            <!doctype html>
            <html lang="en">

            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
                <meta name="generator" content="Jekyll v3.8.6">
                <title>Blog Template · Bootstrap</title>
                <!-- Custom styles for this template -->
                <link href="css/bootstrap.min.css" rel="stylesheet">
                <!-- Custom styles for this template -->
                <link href="css/blog.css" rel="stylesheet">
            </head>
            <body>
                <div class="container">
                    <header class="blog-header py-3">
                        <div class="row flex-nowrap justify-content-between align-items-center">
                            <div class="col-4 pt-1">
                                <a class="text-muted" href="#"><?php echo $guest_login_id; ?></a>
                            </div>
                            <div class="col-4 text-center">
                                <a class="blog-header-logo text-dark" href="#"><?php echo $post['name']; ?></a>
                            </div>
                        </div>
                    </header>
                   <div class="container">
                   <div class="nav-scroller py-1 mb-2">
                        <nav class="nav ">
                            <a class="p-2 text-muted" href="#">New</a>
                            <a class="p-2 text-muted" href="../../courses.php">Events</a>
                            <a class="p-2 text-muted" href="../admin/logout.php">Logout</a>
                        </nav>
                    </div>
                   </div>
        <?php  }}} ?>
        <script>
         if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
        </script>