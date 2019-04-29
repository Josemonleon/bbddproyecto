<?php

require "Variables.php";

/*------------------Para conectar a MySql------------------*/
$mysqli = @mysqli_connect($servidor,$usuario,$clave);
if (mysqli_connect_errno($mysqli)){
	echo ("Fallo al conectar a Mysql: ".mysqli_connect_errno($mysqli). " ".
		mysqli_connect_error($mysqli));
	die ("NO SE PUDO REALIZAR LA CONEXIÓN");
}
else echo ("La conexión se ha producido correctamente");
/*------------------Para conectar a MySql------------------*/





$consulta = "CREATE DATABASE IF NOT EXISTS tareas1";

if (!$resultado = $mysqli->query($consulta))
{
  echo ("Lo sentimos la instrucción de BBDD ha fallado debido a: <br>");
  echo ("Query: $consulta <br>");
  echo ("Error_numero: ". $mysqli->errno . "<br>");
  echo ("Error: ". $mysqli->error . "<br>");
  exit;


}
?>

