<?php

/*Llamamos al archivo .php donde guardamos todas las variables necesarias para la conexión de la bbdd*/
require "Variables.php";

/*Se realiza la conexión. si NO es correcto mostrará el mensaje*/
$mysqli = @mysqli_connect($servidor, $usuario, $clave);
if (mysqli_connect_errno($mysqli)) {
    echo "Fallo al conectar a MySQL: " . mysqli_connect_error(). " ". mysqli_connect_errno() ;
}

/*Elige la bbdd (en este caso tareasdb)*/
mysqli_select_db($mysqli, $db_nombre);

?>
