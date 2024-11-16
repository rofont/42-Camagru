<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<?php
	$servername = "mysql";
	$dataname = "datacamagru";
	$username = "root";
	$password = "rootpassword";

	try {
		$mysqlClient = new PDO("mysql:host=$servername;dbname=$dataname;charset=utf8", $username, $password);

		$mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Vérifier si les données du formulaire ont été soumises
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Récupérer et valider les données
			$name = htmlspecialchars($_POST['name']);
			$email = htmlspecialchars($_POST['email']);
			$password = htmlspecialchars($_POST['password']);

			// Hacher le mot de passe
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

			// Insérer les données dans la base de données
			$stmt = $mysqlClient->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $hashedPassword);

			if ($stmt->execute()) {
				echo "Inscription réussie !";
			} else {
				echo "Erreur lors de l'inscription.";
			}
		}
	} catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}

	?>
</body>

</html>