<?php
require "../../vendor/autoload.php";
use MongoDB\BSON\ObjectID;

function get_db()
{
	$mongo = new MongoDB\Client(
		"mongodb://localhost:27017/wai",
		[
			'username' => 'wai_web',
			'password' => 'w@i_w3b',
		]);

	$db = $mongo->wai;
	return $db;
}

function addUser($login, $haslo, $powtorzHaslo, $email)
{
	if($haslo === $powtorzHaslo)
	{
		if (!empty($login) &&
			!empty($haslo) &&
			!empty($powtorzHaslo) &&
			!empty($email))
		{
			$db = get_db();
			$users = $db->users->find(['login' => $login]);
			$countU = 0;
			foreach($users as $user)
			{
				$countU++;
			}
			if($countU == 0)
			{
				$hash = password_hash($haslo, PASSWORD_DEFAULT);
				$user = [
					'login' => $login,
					'haslo' => $hash,
					'email' => $email
				];
				$db->users->insertOne($user);
				header('Location: success?Link=0');
				exit;
			}
			else
			{
				header('Location: registerView?Link=3');
				exit;
			}
		}
		else
		{
			header('Location: registerView?Link=1');
			exit;
		}
	}
	else
	{
		header('Location: registerView?Link=2');
		exit;
	}
}

function login($login, $haslo)
{
	$db = get_db();
	$user = $db->users->findOne(['login' => $login]);
	if(password_verify($haslo, $user['haslo']))
	{
		if (session_status() == PHP_SESSION_NONE) 
			session_start();
		
		session_regenerate_id();
		$_SESSION['user_id'] = $user['_id'];
		header('Location: success?Link=1');
		exit;
	}
	header('Location: loginView?Link=0');
}

function addFileToDB($tytul, $autor, $nazwa, $prywatne)
{
	$db = get_db();
	$userLogin = userLogin();
	$fileInfo = [
		'tytul' => $tytul,
		'autor' => $autor,
		'nazwa' => $nazwa,
		'private' => $prywatne,
		'userLogin' => $userLogin,
		'checked' => 0
	];
	$db->fileInfos->insertOne($fileInfo);
}

function userLogin()
{
	$userLogin= "";
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
	{
		$users = $db->users->find(['_id' => $_SESSION['user_id']]);
		foreach($users as $user)
		{
			$userLogin = $user['login'];
		}
	}
	else
	{
		$userLogin = "";
	}
	
	return $userLogin;
}

function addToSelected($id)
{
	$db = get_db();
	$query = ['_id' => new ObjectId($id)];
	$fileInfo = $db->fileInfos->findOne($query);
	$fileInfo['checked'] = 1;
	$db->fileInfos->replaceOne($query, $fileInfo);
}

function deleteFromSelected($id)
{
	$db = get_db();
	$query = ['_id' => new ObjectId($id)];
	$fileInfo = $db->fileInfos->findOne($query);
	$fileInfo['checked'] = 0;
	$db->fileInfos->replaceOne($query, $fileInfo);
}
?>