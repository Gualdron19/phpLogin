<?php 
	require 'db.php';

	$message = '';

	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':email',$_POST['email']);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$stmt->bindParam(':password', $password);

		if ($stmt->execute()) {
			$message = 'Se ha registrado correctamente un nuevo usuario';
		}else{
			$message = 'Ha ocurrido un error al registrar el usuario';
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<?php require 'partials/header.php'; ?>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Registro</h1>
	<span>o <a href="login.php">Iniciar</a></span>

	<form action="registro.php" method="post">
		<input type="text" name="email" placeholder="Ingrese su email">	
		<input type="password" name="password" placeholder="Ingrese su contraseña">
		<input type="password" name="confirm_password" placeholder="Confirme su contraseña">
		<input type="submit" value="send">
	</form>

</body>
</html>