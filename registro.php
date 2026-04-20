<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html>
<head>
<title>Registro</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="container">
<div class="card">

<h2>Registro</h2>

<form method="POST">
<input name="nombre" placeholder="Nombre" autocomplete="off"><br>
<input name="correo" placeholder="Correo" autocomplete="off"><br>
<input name="password" type="password" placeholder="Password" autocomplete="new-password"><br>
<button>Registrarse</button>
</form>

<?php
if ($_POST) {
  $n = $_POST['nombre'];
  $c = $_POST['correo'];
  $p = $_POST['password'];

  $sql = "INSERT INTO estudiantes 
  (nombre, correo, password, grupo, carrera, cuatrimestre)
  VALUES ('$n','$c','$p','5A','Programación Web',5)";

  $conn->query($sql);
  echo "Registrado";
  echo "<script> alert('Usuario registrado correctamente'); </script>";
}
?>

<a href="login.php">Volver</a>

</div>
</div>

</body>
</html>