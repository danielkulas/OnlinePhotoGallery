<?php
if(isset($_POST["zaloguj"]))
{
	$login = $_POST["login"];
	$haslo = $_POST["haslo"];

	require('dbAccess.php');
	login($login, $haslo);
}
?>