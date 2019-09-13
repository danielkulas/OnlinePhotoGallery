<?php
if(isset($_POST["wyslijZdjecie"]))
{
	$plik = $_FILES["uploadFile"];
	$poleText = $_POST["watermark"];
	$tytul = $_POST["tytul"];
	$autor = $_POST["autor"];
	$prywatne = $_POST["private"];
	
	if(sprFormatPliku($plik) && sprRozmiarPliku($plik) && sprPoleWatermark($poleText))
	{
		przeslijPlik($plik);
		przeslijZnakWodny($plik, $poleText);
		przeslijMiniature($plik);
		header('Location: index?Link=1');
		require('dbAccess.php');
		$name= $plik["name"];
		$nazwa = substr($name, 0, -4);
		addFileToDB($tytul, $autor, $nazwa, $prywatne);
	}
	else
	{
		if(sprPoleWatermark($poleText) == FALSE)
		{
			header('Location: index?Link=0');
			exit;
		}
		if(sprFormatPliku($plik) == FALSE && sprRozmiarPliku($plik) == FALSE)
		{
			header('Location: index?Link=2');
			exit;
		}
		if(sprFormatPliku($plik) == FALSE)
		{
			header('Location: index?Link=3');
			exit;
		}
		if(sprRozmiarPliku($plik) == FALSE)	
		{
			header('Location: index?Link=4');
			exit;
		}
	}
}
	
function sprFormatPliku($file)
{
	if($file["type"] == "image/jpeg" || $file["type"] == "image/png")
	{
		return true;
	}
	else
	{
		return false;		
	}
}

function sprRozmiarPliku($file)
{
	if($file["size"] > 1024 * 1024)
		return false;
	
	return true;
}

function sprPoleWatermark($poleText)
{
	if (empty($poleText)) 
		return false; 
	
	return true;
}

function przeslijPlik($file)
{
	$dir = "images/";
	$targetFile = $dir.basename($file["name"]);
	move_uploaded_file($file["tmp_name"], $targetFile);
}

function przeslijZnakWodny($file, $poleText)
{
	$dir = "images/";
	$targetFile = $dir.basename($_FILES["uploadFile"]["name"]);
	$text = $poleText;
	$fontSize = 10;
	if($file["type"] == "image/jpeg")
	{
		$newimg = imagecreatefromjpeg($targetFile);
	}
	else
	{
		$newimg = imagecreatefrompng($targetFile);
	}
	$fontColor = imagecolorallocate($newimg, 0, 0, 0);
	imagestring($newimg, $fontSize, 10, 10, $text, $fontColor); 
	if($file["type"] == "image/jpeg")
	{
		imagepng($newimg, $dir.basename($targetFile, ".jpg")."WM.png");
	}
	else
	{
		imagepng($newimg, $dir.basename($targetFile, ".png")."WM.png");
	}
	imagedestroy($newimg);
}

function przeslijminiature($file)
{
	$dir = "images/";
	$targetFile = $dir.basename($file["name"]);
	list($widthOriginal, $heightOriginal) = getimagesize($targetFile);
	$widthMini = 200;
	$heightMini = 125;
	if($file["type"] == "image/jpeg")
	{
		$newimg = imagecreatefromjpeg($targetFile);
	}
	else
	{
		$newimg = imagecreatefrompng($targetFile);
	}
	$color = imagecreatetruecolor($widthMini, $heightMini);
	imagecopyresized($color, $newimg, 0, 0, 0, 0, $widthMini, $heightMini, $widthOriginal, $heightOriginal);
	if($file["type"] == "image/jpeg")
	{
		imagepng($color, $dir.basename($targetFile, ".jpg")."Mini.png");
	}
	else
	{
		imagepng($color, $dir.basename($targetFile, ".png")."Mini.png");
	}
	imagedestroy($newimg);
}
?>