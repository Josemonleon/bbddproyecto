<html lang="ES">
<body>

<?php

require "ConexionBBDD.php";

$lista_id = $_GET["id"];

if (isset($_POST['nombreLista'])) {
    $nombreLista = $_POST['nombreLista'];
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

$consulta = "SELECT * FROM listas WHERE id_lista = $lista_id";

if (!$resultado=$mysqli->query($consulta)) {
    echo "Lo sentimos. La Aplicación no funciona<br>";
    echo "Error. en la consulta: ".$consulta."<br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    echo "Error: ".$mysqli->error. "<br>";
    exit;
} else {
    $lista = $resultado->fetch_assoc();
}
?>

<form action="" method="post">
    <?php
    $nombreLista = $lista["nombreLista"];

    echo ("<p>Titulo lista: <input type='text' name='nombreLista' value='$nombreLista' /></p>");
    ?>
    <p><input value="Modificar lista" name="modify" type="submit"/></p>
</form>
<a href="VerListas.php">Volver atrás</a>
</body>
</html>