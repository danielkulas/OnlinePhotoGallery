<?php
if(isset($_POST["register"]))
{
	$login = $_POST["login"];
	$haslo = $_POST["haslo"];
	$powtorzHaslo = $_POST["powtorzHaslo"];
	$email = $_POST["email"];

	require('dbAccess.php');
	addUser($login, $haslo, $powtorzHaslo, $email);
}
?>