<html lang="ES">
<body>

<?php

//Utilizamos el código del archivo ConexionBBDD.php
require "ConexionBBDD.php";



if (isset($_POST['show'])) {    //Si el array Post ha podido coger el valor de "show" (Se encuentra al final en el html)
    $listaId = $_POST['lista_id'];  //Guardar en una variable el dato guardado con ese nombre guardado en el array Post
    $pagina = "VerTareas.php?id=$listaId";  //Se le pasa el archivo al que debe ir y además el id de la lista para así saber que tareas le pertenecen

    header("Location: $pagina");    //Muestra lo que hay en la variable $pagina
} else if (isset($_POST['modify'])) {
    $listaId = $_POST['lista_id'];  //Guardar en una variable el dato guardado con ese nombre guardado en el array Post
    $pagina = "ModificarLista.php?id=$listaId"; //Se le pasa el archivo al que debe ir y además el id de la lista para así saber que tareas le pertenecen

    header("Location: $pagina");    //Muestra lo que hay en la variable $pagina
} else if (isset($_POST['delete'])) {
    $listaId = $_POST['lista_id'];  //Guardar en una variable el dato guardado con ese nombre guardado en el array Post
    $consulta ="DELETE FROM listas WHERE id_lista = $listaId;"; //Consulta para borrar de la lista donde coincida el id de la lista seleccionada

    if (!$resultado=$mysqli->query($consulta)) {
        echo "Error en la ejecución debido a: <br>";
        echo "query: ". $consulta;
        echo "Num error: ".$mysqli->errno." <br>";
        echo "Error: ".$mysqli->error." <br>";
        die("Fallo");
    } else {
        echo "Se ha eliminado correctamente.";
    }
} else if (isset($_POST['add'])) {  //Si el array Post ha podido coger el valor de "show" (Se encuentra al final en el html)
    $pagina = "InsertarLista.php";  //Se le pasa el archivo al que debe ir y además el id de la lista para así saber que tareas le pertenecen

    header("Location: $pagina");    //Muestra lo que hay en la variable $pagina
}

/**Guardamos en variable consulta la instrucción SQL para que nos muestre todas las listas creadas en ese momento
 * Si NO es correcto mostrará el mensaje de error
 */

$consulta="SELECT * FROM listas";

if (!$resultado=$mysqli->query($consulta)) {
    echo "Error en la ejecución debido a: <br>";
    echo "query: ". $consulta;
    echo "Num error: ".$mysqli->errno." <br>";
    echo "Error: ".$mysqli->error." <br>";
    die("Fallo");
}
?>

<h1>Listas</h1>

<!--El formulario se llama a si mismo cuando se ejecuta, por eso esta el action vacio -->
<form action="" method="post">
    <?php

    $numregistros=$resultado->num_rows;

    for ($i=1;$i<=$numregistros;$i++) {
        $fila=$resultado->fetch_assoc();    //Convierte el resultado de la consulta (datos de la bbdd) en un array.
        $id = $fila["id_lista"];
        $nombre = $fila["nombreLista"];

        $checked = '';
        if ($i == 1) {
            $checked = 'checked';
        }

        echo("<input type='radio' name='lista_id' value='$id' $checked> $nombre<br>");  //Chekea el primer valor de la lista
    }
    ?>

    <p>
        <input value="Añadir lista" name="add" type="submit"/> //El boton "Añadir lista" lo puedes llamar por su nombre en el array Post "add"
        <input value="Mostrar tareas" name="show" type="submit"/>   //El boton "Mostrar tareas" lo puedes llamar por su nombre en el array Post "show"
        <input value="Modificar" name="modify" type="submit"/>  //El boton "Modificar" lo puedes llamar por su nombre en el array Post "modify"
        <input value="Eliminar" name="delete" type="submit"/>   //El boton "Eliminar" lo puedes llamar por su nombre en el array Post "delete"
    </p>
</form>
</body>
</html>