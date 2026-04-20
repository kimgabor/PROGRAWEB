<?php
session_start();
if (!isset($_SESSION['id'])) header("Location: login.php");
include("conexion.php");

$id = $_SESSION['id'];
$res = $conn->query("SELECT * FROM estudiantes WHERE id=$id");
$alumno = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Perfil</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="navbar">
<div>Sistema</div>
<div>
<a href="index.php">Inicio</a>
<a href="logout.php">Salir</a>
</div>
</div>

<div class="container">

<div class="card">
<h2><?php echo $alumno['nombre']; ?></h2>
<p>Grupo: <?php echo $alumno['grupo']; ?></p>
<p>Carrera: <?php echo $alumno['carrera']; ?></p>
<p>Cuatrimestre: <?php echo $alumno['cuatrimestre']; ?></p>
</div>

<div class="card">
<a href="materias.php"><button>Materias</button></a>
<a href="boletas.php"><button>Boletas</button></a>
<a href="creditos.php"><button>Créditos</button></a>
</div>

</div>
</body>
</html>