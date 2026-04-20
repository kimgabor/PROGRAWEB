<?php
session_start();
if (!isset($_SESSION['id'])) header("Location: login.php");
include("conexion.php");

$id = $_SESSION['id'];
$periodo = $_GET['periodo'] ?? 'Enero-Abril';

$sql = "SELECT SUM(m.creditos) total
FROM calificaciones c
JOIN materias m ON c.id_materia=m.id
WHERE c.id_estudiante=$id 
AND c.calificacion>=70
AND c.periodo='$periodo'";

$res = $conn->query($sql);
$d = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Créditos</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="navbar">
<div>Sistema Académico</div>
<div>
<a href="index.php">Inicio</a>
<a href="logout.php">Salir</a>
</div>
</div>

<div class="container">
<div class="card">

<h2>Créditos Aprobados</h2>

<form method="GET">
<select name="periodo">
<option>Enero-Abril</option>
<option>Mayo-Agosto</option>
</select>
<button>Filtrar</button>
</form>

<p><b><?= $d['total'] ?></b></p>

</div>
</div>

</body>
</html>