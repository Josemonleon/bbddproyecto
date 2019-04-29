<html lang="ES">
<body>

<?php

//Utilizamos el código del archivo ConexionBBDD.php
require "ConexionBBDD.php";

//Coge el id de la tarea para modificar la seleccionada
$tarea_id = $_GET["id"];    //Get es un array que coge los valor de la URL despues del ? y lo puedes llamar. En éste caso llama al valor id.

if (isset($_POST['nombreTarea'])) { //Si el array Post ha podido coger el valor de "nombreTarea" (Se encuentra al final en el html)
    $nombreTarea = $_POST['nombreTarea'];   //Guardar en una variable el dato guardado con ese nombre guardado en el array Post
    $descripcionTarea = $_POST['descripcionTarea'];

    //Consulta sql para modificar los datos de la tarea
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

//Consulta para seleccionar todas las tareas y visualizarlas
$consulta = "SELECT * FROM tareas WHERE id_tarea = $tarea_id";

if (!$resultado=$mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error. en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    $tarea = $resultado->fetch_assoc(); //Convierte el resultado de la consulta (datos de la bbdd) en un array.
}
?>

<form action="" method="post">
    <?php
    $nombreTarea = $tarea["nombreTarea"];   //Aqui guardamos en una variable uno de los datos del array $tarea.
    $descripcionTarea = $tarea["descripcion"];  //Aqui guardamos en una variable uno de los datos del array $tarea.
    $lista_id = $tarea["id_lista"]; //Aqui guardamos en una variable uno de los datos del array $tarea.

    echo ("<p>Titulo: <input type='text' name='nombreTarea' value='$nombreTarea'/></p>"); //Rellena en los campos de texto los datos de la tarea a modificar
    echo ("<p>Descripción: <input type='text' name='descripcionTarea' value='$descripcionTarea'/></p>");    //Rellena en los campos de texto los datos de la tarea a modificar
    ?>
    <input value="Modificar" name="modify" type="submit"/>
</form>
<?php
$pagina = "VerTareas.php?id=$lista_id"; //Se le pasa el archivo al que debe volver y además el id de la lista a la que tiene que volver
echo ("<a href='$pagina'>Volver atrás</a>") //Para volver atrás
?>
</body>
</html>