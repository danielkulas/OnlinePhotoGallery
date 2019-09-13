<?php
if (session_status() == PHP_SESSION_NONE) 
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Galeria zdjec</title>
		<link rel="shortcut icon" href="static/obrazki/favicon.ico">
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="static/style/style.css" type="text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
	</head>
	<body>
		<div id="wrapper">
			<div class="nav">
				<ol>
					<li><a href="index">GALERIA ZDJĘĆ</a></li>
					<li><a href="selectedGalleryView">WYBRANA GALERIA</a></li>
					<li><a href="searchView">WYSZUKIWARKA</a></li>
					<?php
						if (!isset($_SESSION['user_id']) && empty($_SESSION['user_id']))
						{
							echo('<li><a href="registerView">REJESTRACJA</a></li>');
							echo('<li><a href="loginView">LOGOWANIE</a></li>');
						}
						else
						{
							echo('<li><a href="privateGalleryView">PRYWATNA GALERIA</a></li>');
							echo('<li><a href="logoutView">WYLOGUJ</a></li>');
						}
					?>
				</ol>
				<img id="logo" src="static/obrazki/logo.svg" alt="Logo"/>
				<div style="clear: both;"></div>
			</div>
			<div id="tekst">
