<?php
session_start();
require_once "functions.php";

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = strip_tags($_GET['id']);
	$use = readUser($id);
	if (!$use) {
		$_SESSION['erreur'] = 'cet id n existe pas';
		header('Location: dataView.php');
		die();
	}
	deleteUser($id);
	$_SESSION['message'] = 'Utilisateur supprimé';
	header('Location: dataView.php');
} else {
	$_SESSION['erreur'] = "URL invalide";
	header('Location: dataView.php');
}
