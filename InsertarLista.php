<html lang="ES">
<body>

<?php

require "ConexionBBDD.php";

if (isset($_POST['nombreLista'])) {
    $nombreLista = $_POST['nombreLista'];
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

<form action="" method="post">
    <p>Titulo lista: <input type="text" name="nombreLista" /></p>
    <p><input value="Añadir lista" name="add" type="submit"/></p>
</form>
<a href="VerListas.php">Volver atrás</a>
</body>
</html>