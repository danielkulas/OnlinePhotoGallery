<?php
	$files = glob("images/*.*");
	require("../dbAccess.php");
	use MongoDB\BSON\ObjectID;
	$db = get_db();
	
	echo '<form action="../forget.php" method="post">';
	$i;
	$mozna = 0;
	for ($i=1; $i<count($files); $i++)
	{
		list($width, $height) = getimagesize($files[$i]);
		if($width == 200 && $height == 125)
		{
			$fileInfos = $db->fileInfos->find(['nazwa' => basename($files[$i], "Mini.png")]);
			foreach($fileInfos as $fileInfo)
			{
				if($fileInfo['checked'] == 1)
				{
					echo '<br/><a href="zdjecieView?link='.$i.'"><img src="'.$files[$i].'" alt="Zdjecie"/></a>'."<br/><br/>";
					echo 'Tytul: ';
					echo $fileInfo['tytul'] . '<br/>';
					echo 'Autor: ';
					echo $fileInfo['autor'] . '<br/>';
					echo '<input type="hidden" name="check[]" value="0">';
					echo '<input type="checkbox" name="check[]" value="1">' . '<br/>';
					echo '<input type="hidden" name="id[]" value="'.$fileInfo['_id'].'">';
					$mozna = 1;
				}
			}
		}
	}
	if($i != 1 && $mozna == 1)
		echo '<input type="submit" value="Usun z wybranej galerii" name="forget">';
		
	echo '</form>';
?>