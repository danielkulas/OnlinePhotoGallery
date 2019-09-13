<?php
$routing = [
	'/' => '../views/index.php',
	'/index' => '../views/index.php',
	'/uploadView' => '../views/uploadView.php',
	'/zdjecieView' => '../views/zdjecieView.php',
	'/registerView' => '../views/registerView.php',
	'/loginView' => '../views/loginView.php',
	'/logoutView' => '../views/logoutView.php',
	'/success' => '../views/success.php',
	'/searchView' => '../views/searchView.php',
	'/selectedGalleryView' => '../views/selectedGalleryView.php',
	'/privateGalleryView' => '../views/privateGalleryView.php',
	'/dbAccess.php' => '../dbAccess.php',
	'/uploadSystem.php' => '../uploadSystem.php',
	'/dbRegister.php' => '../dbRegister.php',
	'/dbLogin.php' => '../dbLogin.php',
	'/gethint.php' => '../gethint.php',
	'/remember.php' => '../remember.php',
	'/forget.php' => '../forget.php',
	'/gallery.php' => '../gallery.php',
	'/selectedGallery.php' => '../selectedGallery.php',
	'/logout.php' => '../logout.php',
	'/newOptions.php' => '../newOptions.php',
	'/privateGallery.php' => '../privateGallery.php',
];
require $routing[$_GET['action']];
?>