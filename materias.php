<?php
session_start();
if (!isset($_SESSION['id'])) header("Location: login.php");
include("conexion.php");

$id = $_SESSION['id'];

$u = $conn->query("SELECT cuatrimestre FROM estudiantes WHERE id=$id")->fetch_assoc();
$c = $u['cuatrimestre'];

$sql = "SELECT m.nombre materia, ma.nombre maestro, a.nombre aula, h.dia, h.hora, m.creditos
FROM horarios h
JOIN materias m ON h.id_materia=m.id
JOIN maestros ma ON h.id_maestro=ma.id
JOIN aulas a ON h.id_aula=a.id
WHERE h.cuatrimestre=$c";

$res = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Materias</title>
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

<h2>Materias del Cuatrimestre</h2>

<table>
<tr>
<th>Materia</th><th>Maestro</th><th>Aula</th>
<th>Día</th><th>Hora</th><th>Créditos</th>
</tr>

<?php while($r=$res->fetch_assoc()){ ?>
<tr>
<td><?= $r['materia'] ?></td>
<td><?= $r['maestro'] ?></td>
<td><?= $r['aula'] ?></td>
<td><?= $r['dia'] ?></td>
<td><?= $r['hora'] ?></td>
<td><?= $r['creditos'] ?></td>
</tr>
<?php } ?>

</table>

</div>
</div>

</body>
</html>