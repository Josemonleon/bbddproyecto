<html lang="ES">
<body>

<?php

//Utilizamos el código del archivo ConexionBBDD.php
require "ConexionBBDD.php";

//Coge el id de la lista para modificar la seleccionada
$lista_id = $_GET["id"];    //Get es un array que coge los valor de la URL despues del ? y lo puedes llamar. En éste caso llama al valor id.

if (isset($_POST['nombreLista'])) { //Si el array Post ha podido coger el valor de "nombreLista" (Se encuentra al final en el html)
    $nombreLista = $_POST['nombreLista'];   //Guardar en una variable el dato guardado con ese nombre guardado en el array Post
    $consulta = "UPDATE listas SET nombreLista = '$nombreLista' WHERE id_lista = $lista_id";

    if (!$resultado=$mysqli->query($consulta)) {
        echo "Lo sentimos. La Aplicación no funciona<br>";
        echo "Error. en la consulta: ".$consulta."<br>";
        echo "Num.error: ".$mysqli->errno."<br>";
        echo "Error: ".$mysqli->error. "<br>";
        exit;
    } else {
        echo "<p>La lista se ha modificado correctamente.</p>";
    }
}

$consulta = "SELECT * FROM listas WHERE id_lista = $lista_id";  //Consulta para seleccionar todas las listas y visualizarlas

if (!$resultado=$mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error. en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    $lista = $resultado->fetch_assoc(); //Convierte el resultado de la consulta (datos de la bbdd) en un array.
}
?>

<form action="" method="post">
    <?php
    $nombreLista = $lista["nombreLista"]; //Aqui guardamos en una variable uno de los datos del array $lista.

    echo ("<p>Titulo lista: <input type='text' name='nombreLista' value='$nombreLista' /></p>");    //Rellena en los campos de texto los datos de la lista a modificar
    ?>
    <p><input value="Modificar lista" name="modify" type="submit"/></p>
</form>
<a href="VerListas.php">Volver atrás</a>
</body>
</html>