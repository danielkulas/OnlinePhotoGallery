<?php
require("../dbAccess.php");
use MongoDB\BSON\ObjectID;
$db = get_db();
$fileInfos = $db->fileInfos->find();
$a[] = " ";
foreach ($fileInfos as $fileInfo) 
{
	$a[] = $fileInfo['tytul'];
}

$q = $_REQUEST["q"];
$hint = "";
$nazwa = "";
$src1 = "images/";
$src2 = "Mini.png";

if ($q !== "") 
{
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) 
	{
        if (stristr($q, substr($name, 0, $len))) 
		{
            if ($hint === "") 
			{
                $hint = $name;
				$fileInfos = $db->fileInfos->find(['tytul' => $name]);
				foreach($fileInfos as $fileInfo)
				{
					$nazwa = $fileInfo['nazwa'];
					echo $nazwa === "" ? "" : '<p><img alt="BRAK" src="'.$src1.$nazwa.$src2.'"/></p>';
					echo $name."<br/>";
				}
			}
			else 
			{
				$hint .= ", $name";
				$fileInfos = $db->fileInfos->find(['tytul' => $name]);
				foreach($fileInfos as $fileInfo)
				{
					$nazwa = $fileInfo['nazwa'];
					echo $nazwa === "" ? "" : '<p><img alt="BRAK" src="'.$src1.$nazwa.$src2.'"/></p>';
					echo $name."<br/>";
				}
			}
        }
    }
}

if ($hint === "")
	echo "Brak sugestii";
?>