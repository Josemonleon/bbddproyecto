<?php

require("ConexionBBDD.php");

$idTarea=$_REQUEST["id_tarea"];
$nombreTarea=$_REQUEST["nombreTarea"];
$descripcion=$_REQUEST["descripcion"];
$fecha=$_REQUEST["fecha"];

$consulta ="INSERT INTO tarea (id_tarea, nombreTarea, descripcion, fecha) VALUES ('$idTarea','$nombreTarea','$descripcion','$fecha');";

if (!$resultado=$mysqli->query($consulta))
  {echo "Lo sentimos. La Aplicación no funciona<br>";
   echo "Error. en la consulta: ".$consulta."<br>";
   echo "Num.error: ".$mysqli->errno."<br>";
   echo "Error: ".$mysqli->error. "<br>";
   exit;
  } 

?>


<html>
<head>

</head>
<body>

<br>
<a href="InsercionTarea.html">Volver</a>
</body>
</html>