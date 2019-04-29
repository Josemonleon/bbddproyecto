<html lang="ES">
<body>

<?php

/** Llamamos al archivo conexión donde están almacenados los datos de la bbdd con la que vamos a trabajar */
require "ConexionBBDD.php";


/**Si el botón "Mostrar tareas" devuelve algo */
if (isset($_POST['show'])) {
    $listaId = $_POST['lista_id'];  //Se guarda en una variable el valor de "id_lista" que hay en la bbdd
    $pagina = "VerTareas.php?id=$listaId";

    header("Location: $pagina");
} else if (isset($_POST['modify'])) {
    $listaId = $_POST['lista_id'];  //Se guarda en una variable el valor de "id_lista" que hay en la bbdd
    $pagina = "ModificarLista.php?id=$listaId";

    header("Location: $pagina");
} else if (isset($_POST['delete'])) {
    $listaId = $_POST['lista_id'];
    $consulta ="DELETE FROM listas WHERE id_lista = $listaId;";

    if (!$resultado=$mysqli->query($consulta)) {
        echo "Error en la ejecución debido a: <br>";
        echo "query: ". $consulta;
        echo "Num error: ".$mysqli->errno." <br>";
        echo "Error: ".$mysqli->error." <br>";
        die("Fallo");
    } else {
        echo "Se ha eliminado correctamente.";
    }
} else if (isset($_POST['add'])) {
    $pagina = "InsertarLista.php";
    header("Location: $pagina");
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
        $fila=$resultado->fetch_assoc();
        $id = $fila["id_lista"];
        $nombre = $fila["nombreLista"];

        $checked = '';
        if ($i == 1) {
            $checked = 'checked';
        }

        echo("<input type='radio' name='lista_id' value='$id' $checked> $nombre<br>");
    }
    ?>

    <p>
        <input value="Añadir lista" name="add" type="submit"/>
        <input value="Mostrar tareas" name="show" type="submit"/>
        <input value="Modificar" name="modify" type="submit"/>
        <input value="Eliminar" name="delete" type="submit"/>
    </p>
</form>
</body>
</html>