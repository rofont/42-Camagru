<?php
session_start();

require_once 'functions.php';

if ($_POST) {
	if (
		isset($_POST['username']) && !empty($_POST['username'])
		&& isset($_POST['email']) && !empty($_POST['email'])
		&& isset($_POST['password']) && !empty($_POST['password'])
	) {
		$username = strip_tags($_POST['username']);
		$email = strip_tags($_POST['email']);
		$password = password_hash(strip_tags($_POST['password']), PASSWORD_BCRYPT);

		createUser($username, $email, $password);
		$_SESSION['message'] = 'Utilisateur bien ajouter';
		header('Location: dataView.php');
	} else {
		$_SESSION['erreur'] = 'Le formulaire est imcomplet';
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
	<title>Add Users</title>
</head>

<body>
	<?php
	if (!empty($_SESSION['erreur'])) {
		echo '<div class="alert alert-danger" role="alert">
					' . $_SESSION['erreur'] . '
				  </div>';
		$_SESSION['erreur'] = "";
	}
	?>
	<div class="frame">
		<form method="POST" class="form">
			<div class="title">Welcome</div>
			<div class="subtitle">Let's create your account!</div>
			<div class="input-container ic1">
				<input id="username" class="input" name="username" type="text" placeholder=" " />
				<div class="cut"></div>
				<label for="username" class="place">User Name</label>
			</div>
			<div class="input-container ic2">
				<input id="email" class="input" name="email" type="email" placeholder=" " />
				<div class="cut"></div>
				<label for="email" class="place">Email</label>
			</div>
			<div class="input-container ic2">
				<input id="password" class="input" type="password" name="password" placeholder=" " />
				<div class="cut"></div>
				<label for="password" class="place">Password</>
			</div>
			<button type="submit" class="submit">submit</button>
		</form>
	</div>

</body>

</html>