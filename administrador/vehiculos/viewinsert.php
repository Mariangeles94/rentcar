<?php
require '../AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageVehiculo($bd);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css"  href="../../css/style.css"/>
    </head>
    <body>
        <div id="main">
            <h2>Introduzca los datos del nuevo vehiculo</h2>
            <div id="form_sample">
                <form action="phpinsert.php" method="POST">
                    <label for="matricula">Matricula </label>
                    <input type="text" name="matricula" id="matricula" value="" /><br>
                    <label for="marca">Marca </label>
                    <input type="text" name="marca" id="marca" value="" /><br>
                    <label for="modelo">Modelo </label>
                    <input type="text" name="modelo" id="modelo" value="" /><br>
                    <label for="precio">Precio </label>
                    <input type="number" name="precio" id="precio" value="" /><br>
                    <label for="oficina">Oficina </label>
                    <input type="number" name="oficina" id="oficina" value="" /><br>
                    <label for="disponible">Disponible </label>
                    <input type="text" name="disponible" value="" />
                    <input type="submit" value="edicion" />
                </form>
            </div>
        </div>
    </body>
</html>
<?php
$bd->close();
