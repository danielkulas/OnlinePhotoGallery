<?php include("header.php"); ?>
				<form action="dbLogin.php" method="post" enctype="multipart/form-data">
					<p>Zaloguj sie!</p> 
					Login:
					&nbsp;&nbsp;
					<input type="text" name="login" id="login">
					<br/><br/>
					Haslo:
					&nbsp;&nbsp;
					<input type="password" name="haslo" id="haslo">
					<br/><br/>
					<input type="submit" value="Zaloguj" name="zaloguj">
				</form>
				<br/><br/>

<?php 				
if($_SERVER['REQUEST_URI'] == '/loginView?Link=0')
	echo('<p style="color: red;">Wprowadzone dane sa nieprawidlowe!</p>');
?>

<?php include("footer.php"); ?>
