<?php include("header.php"); ?>

<?php 		
if($_SERVER['REQUEST_URI'] == '/success?Link=0')
	echo('<p style="color: lightgreen;">Zostales zarejestrowany!</p>');

if($_SERVER['REQUEST_URI'] == '/success?Link=1')
	echo('<p style="color: lightgreen;">Zostales zalogowany!</p>');

echo('<a href="index"><h2>POWROT</h2</a>');
?>

<?php include("footer.php"); ?>
