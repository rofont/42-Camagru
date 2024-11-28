<?php

session_start();
require_once 'functions.php';

$users = getAllUsers();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title>View</title>
</head>

<body>
	<main class="container">
		<div class="row">
			<section class="col-12">
				<?php
				if (!empty($_SESSION['erreur'])) {
					echo '<div class="alert alert-danger" role="alert">
					' . $_SESSION['erreur'] . '
				  </div>';
					$_SESSION['erreur'] = "";
				}
				if (!empty($_SESSION['message'])) {
					echo '<div class="alert alert-success" role="alert">
					' . $_SESSION['message'] . '
				  </div>';
					$_SESSION['message'] = "";
				}
				?>
				<h1>DATA USERS</h1>
				<?php
				if (!empty($users)) {
				?>
					<table class="table">
						<thead>
							<th>ID</th>
							<th>Username</th>
							<th>Email</th>
							<th>Password</th>
							<th>is Active</th>
							<th>Token</th>
							<th>Date Creation</th>
							<th>Actions</th>
						</thead>
						<tbody>
							<?php
							foreach ($users as $user) {
							?>
								<tr>
									<td><?= $user['id'] ?></td>
									<td><?= $user['username'] ?></td>
									<td><?= $user['email'] ?></td>
									<td><?= $user['password'] ?></td>
									<td><?= $user['is_active'] ?></td>
									<td><?= $user['token'] ?></td>
									<td><?= $user['created_at'] ?></td>
									<td><a href="details.php?id=<?= $user['id'] ?>">details</a></td>
								</tr>
						<?php
							}
						} else {
							echo "Il n y a pas d utilisateurs dans la base";
						}
						?>
						</tbody>
					</table>
					<a href="addUser.php" class="btn btn-primary">ajouter un user</a>
			</section>
		</div>
	</main>
</body>

</html>