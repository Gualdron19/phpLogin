<?php 
	session_start();

	require 'db.php';

	if (isset($_SESSION['user_id'])) {
		$records = $conn -> prepare('SELECT id, email, password FROM users WHERE id = :id');
		$records-> bindParam(':id', $_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$user = null;

		if (count($results) > 0) {
			$user = $results;
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bienvenido a tu app</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

	<?php require 'partials/header.php'; ?>

	<?php if (!empty($user)): ?>

	<br>Bienvenido. <?= $user['email'] ?>
	<br>Has iniciado sesion correctamente
	<br>
	<a href="logout.php">Cerrar sesion</a>
	<?php else: ?>

	<h1>Por favor inicia sesion</h1>

	<a href="login.php">Iniciar</a>
	<a href="registro.php">Registrate</a>

	<?php endif; ?>

</body>
</html>