<?php
require '../AutoCarga.php';
$bd = new DataBase();
$gestorOficina = new ManageOficina($bd);
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
            <h2>Introduzca los datos de la nueva oficina</h2>
            <div id="form_sample">
                <form action="phpinsert.php" method="POST">
                    <label for="id">Código Oficina </label>
                    <input type="text" name="id" id="id" value="" /><br>
                    <label for="direccion">Dirección </label>
                    <input type="text" name="direccion" id="direccion" value="" /><br>
                    <label for="ciudad">Ciudad </label>
                    <input type="text" name="ciudad" id="ciudad" value="" /><br>
                    <label for="telefono">Telefono </label>
                    <input type="text" name="telefono" id="telfono" value="" /><br>
                    <label for="correo">Correo </label>
                    <input type="text" name="correo" id="correo" value="" /><br>
                    <input type="submit" value="edicion" />
                </form>
            </div>
        </div>
    </body>
</html>
<?php
$bd->close();

