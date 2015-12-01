<?php
require '../AutoCarga.php';
$bd = new DataBase();
$gestorCliente = new ManageCliente($bd);
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
            <h2>Introduzca los datos del nuevo cliente</h2>
            <div id="form_sample">
                <form action="phpinsert.php" method="POST">
                    <label for="id">Código cliente </label>
                    <input type="text" name="id" id="id" value="" />
                    <label for="idmatricula">Matricula </label>
                    <input type="text" name="idmatricula" id="idmatricula" value="" />
                    <label for="fechasalida">Fecha salida </label>
                    <input type="date" name="fechasalida" id="fechasalida" value="" />
                    <label for="fechaentrada">Fecha entrada </label>
                    <input type="date" name="fechaentrada" id="fechaentrada" value="" />
                    <label for="nombre">Nombre </label>
                    <input type="text" name="nombre" id="nombre" value="" />
                    <label for="apellidos">Apellidos </label>
                    <input type="text" name="apellidos" id="apellidos" value="" />
                    <label for="dni">DNI </label>
                    <input type="text" name="dni" id="dni" value="" />
                    <label for="telefono">Teléfono </label>
                    <input type="text" name="telefono" id="telefono" value="" />
                    <label for="precio">Precio </label>
                    <input type="text" name="precio" id="precio" value="" />
                    <input type="submit" value="Nuevo" />
                </form>
            </div>
        </div>
    </body>
</html>
<?php
$bd->close();
