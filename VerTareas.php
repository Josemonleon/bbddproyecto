<html lang="ES">
<body>

<?php

require "ConexionBBDD.php";

$lista_id = $_GET["id"];

if (isset($_POST['add'])) {
    $pagina = "InsertarTarea.php?id=$lista_id";
    header("Location: $pagina");
} else if (isset($_POST['modify'])) {

} else if (isset($_POST['delete'])) {
    $tarea_id = $_POST['tarea_id'];
    $consulta = "DELETE FROM tareas WHERE id_tarea = $tarea_id;";

    if (!$lista = $mysqli->query($consulta)) {
        echo "Lo sentimos. La Aplicación no funciona<br>";
        echo "Error. en la consulta: " . $consulta . "<br>";
        echo "Num.error: " . $mysqli->errno . "<br>";
        echo "Error: " . $mysqli->error . "<br>";
    } else {
        echo "Se ha eliminado correctamente.";
    }
}

$consulta = "SELECT * FROM listas WHERE id_lista = $lista_id";

if (!$lista=$mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error. en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    $fila=$lista->fetch_assoc();
    $nombre = $fila["nombreLista"];
    echo "<h1> $nombre </h1>";
}

$consulta="SELECT * FROM tareas WHERE id_lista = $lista_id";
if (!$resultado=$mysqli->query($consulta)) {
    echo "Error en la ejecución debido a: <br>";
    echo "query: ". $consulta;
    echo "Num error: ".$mysqli->errno." <br>";
    echo "Error: ".$mysqli->error." <br>";
    die("Fallo");
}


?>

<h2>Tareas</h2>

<form action="" method="post">
    <?php

    $numregistros=$resultado->num_rows;

    for ($i=1;$i<=$numregistros;$i++) {
        $fila=$resultado->fetch_assoc();
        $id = $fila["id_tarea"];
        $nombre = $fila["nombreTarea"];
        $descripcion = $fila["descripcion"];

        $checked = '';
        if ($i == 1) {
            $checked = 'checked';
        }

        echo("<input type='radio' name='tarea_id' value='$id' $checked> $nombre -> $descripcion<br>");
    }
    ?>

    <p>
        <input value="Añadir" name="add" type="submit"/>
        <input value="Modificar" name="modify" type="submit"/>
        <input value="Eliminar" name="delete" type="submit"/>
    </p>
</form>
<body>
<a href="VerListas.php">Volver atrás</a>
</body>
</html>