<?php
require('dbAccess.php');

if(isset($_POST["remember"]))
{
	if(empty($_POST['check']))
	{
		header('Location: index');
		exit;
	}
	$j = count($_POST['check']);
	$a = -1;
	
	for($i = 0; $i<$j; $i++)
	{
		if($_POST['check'][$i] == 0)
		{
			$a++;
		}
		else if($_POST['check'][$i] == 1)
		{
			$id = $_POST['id'][$a];
			addToSelected($id);
		}
	}
	
	header('Location: selectedGalleryView');
	exit;
}
?>