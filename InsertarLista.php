<html lang="ES">
<body>

<?php

//Utilizamos el código del archivo ConexionBBDD.php
require "ConexionBBDD.php";

//Post = array. (Saca el valor de "nombreLista").
//isset comprueba si esta set o null.
//Post es un array que al iniciarse el archivo .php está vacío porque todavía no hay valores para recoger.
if (isset($_POST['add'])) { //Si esta pulsado el boton add (Se encuentra al final en el html)
    $nombreLista = $_POST['nombreLista'];   //Recoge el "nombreLista" del array POST que se escribe en el "Titulo lista"
    $consulta ="INSERT INTO listas (nombreLista) VALUES ('$nombreLista');";

    if (!$resultado=$mysqli->query($consulta)) {
        echo "Lo sentimos. La Aplicación no funciona<br>";
        echo "Error. en la consulta: ".$consulta."<br>";
        echo "Num.error: ".$mysqli->errno."<br>";
        echo "Error: ".$mysqli->error. "<br>";
        exit;
    } else {
        echo "<p> $nombreLista se ha añadido correctamente. </p>";
    }
}
?>

<form action="" method="post">  //Cuando haces submit la página vuelve a cargar ella misma.
    <p>Titulo lista: <input type="text" name="nombreLista" /></p>   //El campo de texto "Titulo lista", lo puedes llamar por su nombre en el arry Post "nombreLista"
    <p><input value="Añadir lista" name="add" type="submit"/></p>   //El boton "Añadir lista" lo puedes llamar por su nombre en el array Post "add"
</form>
<a href="VerListas.php">Volver atrás</a>
</body>
</html>

//Post es un array que inicialmente está vacio. No entra al if y la pagina se ejecuta llamandose a si misma
//Carga los valores "nombreLista" y "add"  que has introducido y vuelve al if inicial donde ya está el array post con datos.
//Llamamos a esos datos y ejecutamos las instrucciones.