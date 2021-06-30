<?php
error_reporting(E_ALL);  
ini_set('display_errors', 1); 
session_start();
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
    session_write_close();
} else {
    // session_unset();
    // session_write_close();
    // $url = "/";
    // header("Location: $url");
}
use App\database\Database;
require_once __DIR__ . '/../../../vendor/autoload.php';
$db_connection = Database::getInstance();
$db = $db_connection->getConnection();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<!-- DESCRIPTION -->
	<meta name="description" content="NICT UIN Jakarta" />
	<!-- OG -->
	<meta property="og:title" content="NICT UIN Jakarta" />
	<meta property="og:description" content="NICT UIN Jakarta" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	<!-- PAGE TITLE HERE ============================================= -->
	<title>NICT UIN Jakarta </title>
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/calendar/fullcalendar.css">

	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">

	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">

	<!-- STYLESHEETS ============================================= -->
	<!-- css timepicker -->
	<link rel="stylesheet" href="assets/css/tempusdominus-bootstrap-4.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">

</head>

<body class="ttr-opened-sidebar ttr-pinned-sidebar">
	<script>
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href);
		}
	</script>