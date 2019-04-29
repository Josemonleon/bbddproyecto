<html lang="ES">
<body>

<?php

require "ConexionBBDD.php";

$lista_id = $_GET["id"];
$consulta = "SELECT * FROM listas WHERE id_lista = $lista_id";

if (!$resultado=$mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error. en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    $fila=$resultado->fetch_assoc();
    $nombre = $fila["nombreLista"];
    echo "<h1> $nombre </h1>";
}

if (isset($_POST['nombreTarea'])) {
    $nombreTarea = $_POST['nombreTarea'];
    $descripcionTarea = $_POST['descripcionTarea'];
    $consulta ="INSERT INTO tareas (nombreTarea, descripcion, id_lista) VALUES ('$nombreTarea', '$descripcionTarea', $lista_id);";

    if (!$resultado=$mysqli->query($consulta)) {
        echo "Lo sentimos. La Aplicación no funciona<br>";
        echo "Error. en la consulta: ".$consulta."<br>";
        echo "Num.error: ".$mysqli->errno."<br>";
        echo "Error: ".$mysqli->error. "<br>";
        exit;
    } else {
        echo "<p> $nombreTarea se ha añadido correctamente. </p>";
    }
}
?>

<form action="" method="post">
    <p>Titulo: <input type="text" name="nombreTarea" /></p>
    <p>Descripción: <input type="text" name="descripcionTarea" /></p>
    <input value="Insertar" name="insert" type="submit"/>
</form>
<body>
<?php
    $pagina = "VerTareas.php?id=$lista_id";
    echo ("<a href='$pagina'>Volver atrás</a>")
?>
</body>
</html>