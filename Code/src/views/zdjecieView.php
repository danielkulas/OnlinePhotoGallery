<?php
$files = glob("images/*.*");
$i = $_GET['link'];
echo '<img src="'.$files[$i+1].'" alt="Zdjecie"/>';
?>
<a style="text-decoration: none;" href="index"><h2>Powrot</h1></a>