<html lang="ES">
<body>

<?php

//Utilizamos el código del archivo ConexionBBDD.php
require "ConexionBBDD.php";

$lista_id = $_GET["id"];    //Get es un array que coge los valor de la URL despues del ? y lo puedes llamar. En éste caso llama al valor id.
$consulta = "SELECT * FROM listas WHERE id_lista = $lista_id";

if (!$resultado=$mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error. en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    $fila=$resultado->fetch_assoc();    //Convierte el resultado de la consulta (datos de la bbdd) en un array.
    $nombre = $fila["nombreLista"];     //Aqui guardamos en una variable uno de los datos del array.
    echo "<h1> $nombre </h1>";
}

if (isset($_POST['nombreTarea'])) { //Si el array Post ha podido coger el valor de "nombreTarea" (Se encuentra al final en el html)
    $nombreTarea = $_POST['nombreTarea'];   //Guardar en una variable el dato guardado con ese nombre guardado en el array
    $descripcionTarea = $_POST['descripcionTarea']; //Guardar en una variable el dato guardado con ese nombre en el array
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

<form action="" method="post">  <!--Cuando haces submit la página vuelve a cargar ella misma.-->
    <p>Titulo: <input type="text" name="nombreTarea" /></p> <!--De aquí el array Post coge los datos de "nombreTarea" en caso de que estén llenos.-->
    <p>Descripción: <input type="text" name="descripcionTarea" /></p>   <!--//De aquí el array Post coge los datos de "descripcionTarea" en caso de que estén llenos.-->
    <input value="Insertar" name="insert" type="submit"/>
</form>
<?php
$pagina = "VerTareas.php?id=$lista_id";
echo ("<a href='$pagina'>Volver atrás</a>")
?>
</body>
</html>