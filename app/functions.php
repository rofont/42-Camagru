<?php

function getDatabaseConnection()
{
	$servername = "mysql";
	$dataname = "camagru_db";
	$username = "root";
	$password = "rootpassword";

	try {
		$mysqlClient = new PDO("mysql:host=$servername;dbname=$dataname;charset=utf8", $username, $password);
		$mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $mysqlClient;
	} catch (PDOException $e) {
		echo 'Erreur connexion: ' . $e->getMessage();
		die();
	}
}

function getAllUsers()
{
	try {
		$con = getDatabaseConnection();
		$request = "SELECT * FROM users";

		$query = $con->prepare($request);
		$query->execute();
		$users = $query->fetchAll();
		return $users;
	} catch (PDOException $e) {
		echo 'Erreur de récupération: ' . $e->getMessage();
		die();
	}
}

function readUser($id)
{
	try {

		$con = getDatabaseConnection();
		$request = "SELECT * FROM `users` WHERE `id` = :id;";

		$query = $con->prepare($request);
		$query->bindValue(':id', $id, PDO::PARAM_INT);
		$query->execute();
		$user = $query->fetch();
		return $user;
		echo $user['username'];
	} catch (PDOException $e) {
		echo 'Erreur de récupération: ' . $e->getMessage();
		die();
	}
}

function createUser($username, $email, $password)
{
	try {
		$con = getDatabaseConnection();
		$request = "INSERT INTO `users` (username, email, password) VALUES (:username, :email, :password)";

		$query = $con->prepare($request);
		$query->bindValue(':username', $username, PDO::PARAM_STR);
		$query->bindValue(':email', $email, PDO::PARAM_STR);
		$query->bindValue(':password', $password, PDO::PARAM_STR);

		$query->execute();
	} catch (PDOException $e) {
		echo 'Erreur de creation: ' . $e->getMessage();
		die();
	}
}

function updateUser($id, $username, $email, $password, $is_active, $token)
{
	try {
		$con = getDatabaseConnection();
		$request = "UPDATE users set
			username = '$username',
			email = '$email',
			password = '$password',
			is_active = '$is_active',
			token = '$token'
		where id = '$id'";
		$query = $con->prepare($request);
		$query->execute();
	} catch (PDOException $e) {
		echo 'Erreur de récupération: ' . $e->getMessage();
		die();
	}
}

function deleteUser($id)
{
	try {
		$con = getDatabaseConnection();
		$request = "DELETE from users where id = '$id'";
		$query = $con->prepare($request);
		$query->execute();
	} catch (PDOException $e) {
		echo 'Erreur de récupération: ' . $e->getMessage();
		die();
	}
}
