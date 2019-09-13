<?php
	$files = glob("images/*.*");
	use MongoDB\BSON\ObjectID;

	echo '<form action="../remember.php" method="post">';
	$i;
	for ($i=1; $i<count($files); $i++)
	{
		list($width, $height) = getimagesize($files[$i]);
		if($width == 200 && $height == 125)
		{
			$fileInfos = $db->fileInfos->find(['nazwa' => basename($files[$i], "Mini.png")]);
			foreach($fileInfos as $fileInfo)
			{
				if($fileInfo['private'] == 0)
				{
					echo '<br/><a href="zdjecieView?link='.$i.'"><img src="'.$files[$i].'" alt="Zdjecie"/></a>'."<br/><br/>";
					$zaznaczone = "";
					if($fileInfo['checked'] == 1)
						$zaznaczone = "checked";
					
					echo 'Tytul: ';
					echo $fileInfo['tytul'] . '<br/>';
					echo 'Autor: ';
					echo $fileInfo['autor'] . '<br/>';
					echo '<input type="hidden" name="check[]" value="0">';
					echo '<input type="checkbox" name="check[]" value="1" '.$zaznaczone.'>' . '<br/>';
					echo '<input type="hidden" name="id[]" value="'.$fileInfo['_id'].'">';
				}
			}
		}
	}
	if($i != 1)
		echo '<input type="submit" value="Zapamietaj" name="remember">';
		
	echo '</form>';
?>