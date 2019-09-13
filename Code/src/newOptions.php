<?php
	require("../dbAccess.php");
	$db = get_db();
?>

<?php
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{
	$users = $db->users->find(['_id' => $_SESSION['user_id']]);
	foreach($users as $user)
	{
		$userLogin = $user['login'];
	}
}
?>
							
<?php
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{
	echo('value="'.$userLogin.'">');
}
else
{
	echo('value="Autor">');
}

echo('<br/><br/>');
?>

<?php
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{
	echo('Prywatne '.'<input type="radio" name="private" id="private" value="1">');
	echo('Publiczne '.'<input type="radio" name="private" id="private" value="0" checked>');
	echo('<br/><br/>');
}
else
{
	echo('<input type="hidden" name="private" id="private" value="0">');
}
?>