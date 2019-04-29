<?php
/**Éste archivo sirve para crear la BBDD y sus correspondientes tablas*/



/*Usamos el código del archivo donde guardamos todas las variables necesarias para la conexión de la bbdd*/
require "Variables.php";

/*Se realiza la conexión*/
$mysqli = @mysqli_connect($servidor, $usuario, $clave);

/*Si NO es correcto mostrará el mensaje*/
if (mysqli_connect_errno($mysqli)) {
    echo "Fallo al conectar a MySQL: " . mysqli_connect_error(). " ". mysqli_connect_errno() ;
} else {    /**Si es correcto hará la consulta cogiendo los datos del fichero .sql */
    $consulta = file_get_contents("database.sql");

    /**Si NO es correcto mostrará el mensaje**/
    if (!$resultado = $mysqli->multi_query($consulta)) {
        echo "Lo sentimos. La Aplicación no funciona<br>";
        echo "Error. en la consulta: " . $consulta . "<br>";
        echo "Num.error: " . $mysqli->errno . "<br>";
        echo "Error: " . $mysqli->error . "<br>";
        exit;
    } else {    /**Si es correcto mostrará el mensaje indicándolo */
        echo "La base de datos se ha configurado correctamente.";
    }
}
?>