<html lang="ES">
<body>

<?php

//Utilizamos el código del archivo ConexionBBDD.php
require "ConexionBBDD.php";

//Coge el id de la lista para modificar la seleccionada
$lista_id = $_GET["id"];    //Get es un array que coge los valor de la URL despues del ? y lo puedes llamar. En éste caso llama al valor id.

if (isset($_POST['add'])) { //Si el array Post ha podido coger el valor de "add" (Se encuentra al final en el html)
    $pagina = "InsertarTarea.php?id=$lista_id"; //Se le pasa el archivo al que debe ir y además el id de la lista para así saber que tareas le pertenecen

    header("Location: $pagina");    //Muestra lo que hay en la variable $pagina

} else if (isset($_POST['modify'])) {   //Si el array Post ha podido coger el valor de "modify" (Se encuentra al final en el html)
    $tarea_id = $_POST['tarea_id']; //Guardar en una variable el dato guardado con ese nombre guardado en el array Post
    $pagina = "ModificarTarea.php?id=$tarea_id";    //Se le pasa el archivo al que debe ir y además el id de la lista para así saber que tareas le pertenecen
    
    header("Location: $pagina");

} else if (isset($_POST['delete'])) {   //Si el array Post ha podido coger el valor de "delete" (Se encuentra al final en el html)
    $tarea_id = $_POST['tarea_id']; //Guardar en una variable el dato guardado con ese nombre guardado en el array Post
    $consulta = "DELETE FROM tareas WHERE id_tarea = $tarea_id;";   //Consulta sql donde borras la tarea con la id de la tarea seleccionada

    if (!$lista = $mysqli->query($consulta)) {
        echo "Lo sentimos. La Aplicación no funciona<br>";
        echo "Error. en la consulta: " . $consulta . "<br>";
        echo "Num.error: " . $mysqli->errno . "<br>";
        echo "Error: " . $mysqli->error . "<br>";
    } else {
        echo "Se ha eliminado correctamente.";
    }
}

//Consulta para seleccionar todos los datos de la tareas con el mismo id y visualizarla
$consulta = "SELECT * FROM listas WHERE id_lista = $lista_id";

if (!$lista=$mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error. en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    $fila=$lista->fetch_assoc();    //Convierte el resultado de la consulta (datos de la bbdd) en un array.
    $nombre = $fila["nombreLista"]; //Aqui guardamos en una variable uno de los datos del array.
    echo "<h1> $nombre </h1>";  //Se muestra el nombre de la lista sobre la que estamos actuando
}

//Consulta para seleccionar todos los datos de la tareas con el mismo id y visualizarla
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
        $fila=$resultado->fetch_assoc();    //Convierte el resultado de la consulta (datos de la bbdd) en un array.
        $id = $fila["id_tarea"];
        $nombre = $fila["nombreTarea"];
        $descripcion = $fila["descripcion"];

        $checked = '';
        if ($i == 1) {
            $checked = 'checked';
        }

        echo("<input type='radio' name='tarea_id' value='$id' $checked> $nombre -> $descripcion<br>");  //Chekea el primer valor de la lista
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