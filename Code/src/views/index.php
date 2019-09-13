<?php include("header.php"); ?>
				<form action="uploadSystem.php" method="post" enctype="multipart/form-data">
					<p>Wybierz plik do wyslania</p><br/>
					<input type="file" name="uploadFile" id="uploadFile">
					<br/><br/>
					<input type="text" name="watermark" id="watermark" value="Znak wodny">
					<br/><br/>
					<input type="text" name="tytul" id="tytul" value="Tytul">
					<br/><br/>
					<input type="text" name="autor" id="autor"
					<?php require("../newOptions.php"); ?>
					<input type="submit" value="Wyslij" name="wyslijZdjecie">
				</form>
				<br/><br/>
<?php 
if($_SERVER['REQUEST_URI'] == '/index?Link=1')
	echo('<p style="color: lightgreen;">Plik zostal wyslany!</p>');

if($_SERVER['REQUEST_URI'] == '/index?Link=0')
	echo('<p style="color: red;">Pole "watermark" musi byc uzupelnione!</p>');

if($_SERVER['REQUEST_URI'] == '/index?Link=2')
	echo('<p style="color: red;">Rozmiar pliku jest za duzy!<br/>Format pliku jest nieprawidlowy!</p>');

if($_SERVER['REQUEST_URI'] == '/index?Link=3')
	echo('<p style="color: red;">Format pliku jest nieprawidlowy!</p>');

if($_SERVER['REQUEST_URI'] == '/index?Link=4')
	echo('<p style="color: red;">Rozmiar pliku jest za duzy!</p>');
?>

<?php require("../gallery.php"); ?>
<?php include("footer.php"); ?>