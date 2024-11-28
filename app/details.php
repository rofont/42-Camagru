<?php
session_start();
require_once "functions.php";

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = strip_tags($_GET['id']);
	$use = readUser($id);
	if (!$use) {
		$_SESSION['erreur'] = 'cet id n existe pas';
		header('Location: dataView.php');
	}
} else {
	$_SESSION['erreur'] = "URL invalide";
	header('Location: dataView.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title>user</title>
</head>

<body>
	<main class="container">
		<div class="row">
			<section class="col-12">
				<h1>user : <?= $use['username'] ?></h1>
				<p>Id : <?= $use['id'] ?></p>
				<p>email : <?= $use['email'] ?></p>
				<p>password : <?= $use['password'] ?></p>
				<p>Active : <?= $use['is_active'] ?></p>
				<p>Token : <?= $use['token'] ?></p>
				<p>Create : <?= $use['created_at'] ?></p>
				<p><a href="dataView.php">Retour</a> <a href="update.php?id=<?= $use['id'] ?>">Modifier</a></p>
			</section>
		</div>
	</main>
</body>

</html>