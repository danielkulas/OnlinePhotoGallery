<?php
session_destroy();
echo(' Zostales wylogowany pomyslnie!');
?>

<?php
require("dbAccess.php");
use MongoDB\BSON\ObjectID;
$db = get_db();
session_destroy();
?>
<?php
$fileInfos = $db->fileInfos->find();
foreach ($fileInfos as $fileInfo) 
{
	echo $fileInfo['tytul'];
	$id = $fileInfo['_id'];
	$query = ['_id' => new ObjectId($id)];
	$db->fileInfos->deleteOne($query);
}
?>

<?php 
$users = $db->users->find();
foreach ($users as $user) 
{
	echo $user['login'];
	echo(' zostales wylogowany pomyslnie! ');
	$id = $user['_id'];
	$query = ['_id' => new ObjectId($id)];
	$db->users->deleteOne($query);
}
?>