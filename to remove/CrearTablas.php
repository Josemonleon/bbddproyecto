<?php

$servidor = "localhost";
$usuario = "root";
$clave ="9009";

/*------------------Para conectar a MySql------------------*/
$mysqli = @mysqli_connect($servidor,$usuario,$clave);
if (mysqli_connect_errno($mysqli)){
	echo ("Fallo al conectar a Mysql: ".mysqli_connect_errno($mysqli). " ".
		mysqli_connect_error($mysqli));
	die ("NO SE PUDO REALIZAR LA CONEXIÓN");
}
else echo ("La conexión se ha producido OK");
/*------------------Para conectar a MySql------------------*/




//Selecciona la bbd sobre la que actuar
$basedatos = "tareas1";
mysqli_select_db($mysqli,$basedatos);

$consulta ="CREATE TABLE IF NOT EXISTS lista ";
$consulta.="(id_lista INT, ";
$consulta.="nombreLista CHAR(128), ";
$consulta.="PRIMARY KEY (id_lista)); ";

echo ("Consulta creacíon tabla lista <br>");
echo ($consulta."<br>");

if (!$resultado = $mysqli->query($consulta))
{
  echo ("Lo sentimos la instrucción de BBDD ha fallado debido a: <br>");
  echo ("Query: $consulta <br>");
  echo ("Error_numero: ". $mysqli->errno . "<br>");
  echo ("Error: ". $mysqli->error . "<br>");
  exit;


}
// Se forma la consulta para crear la tabla de productos.
  $consulta="CREATE TABLE IF NOT EXISTS tarea ";
  $consulta.="(id_tarea INT, ";
  $consulta.="nombreTarea VARCHAR (128), ";
  $consulta.="descripcion CHAR (200), ";
  $consulta.="fecha DATE, ";
  $consulta.="Fk_id_Lista INT, ";
  $consulta.="PRIMARY KEY (id_tarea),FOREIGN KEY (Fk_id_Lista) REFERENCES lista(id_lista)); ";

/* Se muestra la consulta en la página. Este paso no es necesario
para la ejecución, pero es muy útil en la fase de aprendizaje.*/
  echo ("<b>- CONSULTA DE CREACIÓN DE LA TABLA DE PRODUCTOS: </b>");
  echo ($consulta."<br>"."<br>");

// Se ejecuta la consulta.
if (!$resultado = $mysqli->query($consulta)) {
    // ¡Oh, no! La consulta falló. 
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
    // cómo obtener información del error
    echo "Error: La ejecución de la consulta falló debido a: \n";
    echo "Query: " . $consulta . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}


?>
