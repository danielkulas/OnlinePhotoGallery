<?php include("header.php"); ?>

				<form action="dbRegister.php" method="post">
					Nie masz jeszcze konta?<br/>
					<p>Zarejestruj sie!</p><br/>
					Login: 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="text" name="login" id="login">
					<br/><br/>
					Adres e-mail:&nbsp;
					<input type="text" name="email" id="email">
					<br/><br/>
					Haslo: 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="password" name="haslo" id="haslo">
					<br/><br/>
					Powtorz haslo: 
					<input type="password" name="powtorzHaslo" id="powtorzHaslo">
					<br/><br/>
					<input type="submit" value="Zarejestruj" name="register">
				</form>
				<br/><br/>
				
<?php 				
if($_SERVER['REQUEST_URI'] == '/registerView?Link=1')
	echo('<p style="color: red;">Musisz uzupelnic wszystkie pola!</p>');

if($_SERVER['REQUEST_URI'] == '/registerView?Link=2')
	echo('<p style="color: red;">Podane hasla nie sa takie same!</p>');

if($_SERVER['REQUEST_URI'] == '/registerView?Link=3')
	echo('<p style="color: red;">Uzytkownik o podanym loginie juz istnieje!</p>');
?>

<?php include("footer.php"); ?>