<?php
session_start();

require_once 'functions.php';

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

if ($_POST) {
	if (
		isset($_POST['id']) && !empty($_POST['id']) &&
		isset($_POST['username']) && !empty($_POST['username'])
		&& isset($_POST['email']) && !empty($_POST['email'])
		&& isset($_POST['password']) && !empty($_POST['password'])
	) {
		$id = strip_tags($_POST['id']);
		$username = strip_tags($_POST['username']);
		$email = strip_tags($_POST['email']);
		$password = strip_tags($_POST['password']);
		$is_active = strip_tags($_POST['is_active']);
		$token = strip_tags($_POST['token']);


		updateUser($id, $username, $email, $password, $is_active, $token);
		$_SESSION['message'] = 'Utilisateur modifier';
		header('Location: dataView.php');
	} else {
		$_SESSION['erreur'] = 'Le formulaire est imcomplet';
	}
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title>Update</title>
</head>

<body>
	<main class="container">
		<div class="row">
			<h1>Modification</h1>
			<section class="col-12">
				<?php
				if (!empty($_SESSION['erreur'])) {
					echo '<div class="alert alert-danger" role="alert">
					' . $_SESSION['erreur'] . '
				  </div>';
					$_SESSION['erreur'] = "";
				}
				?>
				<form method="post">
					<div class="form-group">
						<label for="username">Username</label>
						<input class="form-control" type="text" name="username" id="username" value="<?= $use['username'] ?>">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input class="form-control" type="email" name="email" id="email" value="<?= $use['email'] ?>">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input class="form-control" type="password" name="password" id="password" value="<?= $use['password'] ?>">
					</div>
					<div class="form-group"><label for="is_active">Is Active</label>
						<input class="form-control" type="number" name="is_active" id="is_active" value="<?= $use['is_active'] ?>">
					</div>
					<div class="form-group"><label for="token">Token</label>
						<input class="form-control" type="text" name="token" id="token" value="<?= $use['token'] ?>">
					</div>
					<input type="hidden" name="id" value="<?= $use['id'] ?>">
					<button class="btn btn-primary">Modifier</button>
				</form>
				<p><a href="dataView.php">Retour</a>
			</section>
		</div>
	</main>
</body>

</html>