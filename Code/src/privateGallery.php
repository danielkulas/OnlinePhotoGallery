<?php
	$files = glob("images/*.*");
	require("../dbAccess.php");
	use MongoDB\BSON\ObjectID;
	$db = get_db();
	
	$userLogin = "";
	if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
	{
		$users = $db->users->find(['_id' => $_SESSION['user_id']]);
		foreach($users as $user)
		{
			$userLogin = $user['login'];
		}
	}
	
	for ($i=1; $i<count($files); $i++)
	{
		list($width, $height) = getimagesize($files[$i]);
		if($width == 200 && $height == 125)
		{
			$fileInfos = $db->fileInfos->find(['nazwa' => basename($files[$i], "Mini.png")]);
			foreach($fileInfos as $fileInfo)
			{
				if($fileInfo['private'] == 1)
				{
					if(!(!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])))
					{
						echo '<br/><a href="zdjecieView?link='.$i.'"><img src="'.$files[$i].'" alt="Zdjecie"/></a>'."<br/>";
						echo 'Zdjecie prywatne!'.'<br/><br/>';
					}
				}
			}
		}
	}
?>