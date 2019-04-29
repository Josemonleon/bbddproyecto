<html lang="ES">
<body>

<?php

require "ConexionBBDD.php";

$tarea_id = $_GET["id"];

if (isset($_POST['nombreTarea'])) {
    $nombreTarea = $_POST['nombreTarea'];
    $descripcionTarea = $_POST['descripcionTarea'];

    $consulta = "UPDATE tareas SET nombreTarea = '$nombreTarea', descripcion = '$descripcionTarea' WHERE id_tarea = $tarea_id";

    if (!$resultado=$mysqli->query($consulta)) {
        echo "Lo sentimos. La Aplicación no funciona<br>";
        echo "Error. en la consulta: ".$consulta."<br>";
        echo "Num.error: ".$mysqli->errno."<br>";
        echo "Error: ".$mysqli->error. "<br>";
        exit;
    } else {
        echo "<p>La tarea se ha modificado correctamente.</p>";
    }
}

$consulta = "SELECT * FROM tareas WHERE id_tarea = $tarea_id";

if (!$resultado=$mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error. en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    $tarea = $resultado->fetch_assoc();
}
?>

<form action="" method="post">
    <?php
    $nombreTarea = $tarea["nombreTarea"];
    $descripcionTarea = $tarea["descripcion"];
    $lista_id = $tarea["id_lista"];

    echo ("<p>Titulo: <input type='text' name='nombreTarea' value='$nombreTarea'/></p>");
    echo ("<p>Descripción: <input type='text' name='descripcionTarea' value='$descripcionTarea'/></p>");
    ?>
    <input value="Modificar" name="modify" type="submit"/>
</form>
<?php
$pagina = "VerTareas.php?id=$lista_id";
echo ("<a href='$pagina'>Volver atrás</a>")
?>
</body>
</html>