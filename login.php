<?php
session_start();
include("conexion.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="estilos.css">
<script src="script.js"></script>
</head>
<body>

<div class="container">
<div class="card">

<h2>Login</h2>

<form method="POST" onsubmit="return validarLogin()" autocomplete="off">
<input name="correo" placeholder="Correo" autocomplete="off"><br>
<input name="password" type="password" placeholder="Password" autocomplete="new-password"><br>
<button>Entrar</button>
</form>

<?php
if ($_POST) {
  $c = $_POST['correo'];
  $p = $_POST['password'];

  $sql = "SELECT * FROM estudiantes WHERE correo='$c' AND password='$p'";
  $res = $conn->query($sql);

  if ($res->num_rows > 0) {
    $user = $res->fetch_assoc();
    $_SESSION['id'] = $user['id'];
    header("Location: index.php");
  } else {
    echo "Datos incorrectos";
  }
}
?>

<a href="registro.php">Registrarse</a>

</div>
</div>

</body>
</html>