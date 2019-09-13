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
		<script>
			function showHint(str) 
			{
				if (str.length == 0) 
				{ 
					document.getElementById("txtHint").innerHTML = "";
					return;
				} 
				else 
				{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() 
					{
						if (this.readyState == 4 && this.status == 200) 
						{
							document.getElementById("txtHint").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET", "gethint.php?q=" + str, true);
					xmlhttp.send();
				}
			}
		</script>
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
				<p><b>Wyszukaj zdjęcia na podstawie jego tytulu</b></p>
				<form> 
					Tytul zdjecia: <input type="text" onkeyup="showHint(this.value)">
				</form>
				<p>Sugestia: <span id="txtHint"></span></p><br/>
			</div>
		</div>
		<div id="stopka">
			Wszystkie prawa zastrzeżone!<br/>
			Daniel Kulas
		</div>
	</body>
</html>