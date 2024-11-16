<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<h2>Inscription</h2>
	<form action="/auth/register.php" method="POST">
		<label for="name">Nom :</label>
		<input type="text" id="name" name="name" required><br><br>

		<label for="email">Email :</label>
		<input type="email" id="email" name="email" required><br><br>

		<label for="password">Mot de passe :</label>
		<input type="password" id="password" name="password" required><br><br>

		<button type="submit">S'inscrire</button>
	</form>
</body>

</html>