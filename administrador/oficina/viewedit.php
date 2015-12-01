<?php
require '../AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageOficina($bd);
$id = Request::get("id");
$oficina = $gestor->get($id);
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
            <h2>Introduzca los nuevos datos de la oficina</h2>
            <div id="form_sample">
                <form action="phpedit.php" method="POST">
                    <label>Código oficina</label>
                    <input type="text" name="pkid" value="<?php echo $oficina->getId(); ?>"/>
                    <label>Dirección</label>
                    <input type="text" name="direccion" value="<?php echo $oficina->getDireccion(); ?>" />
                    <label>Ciudad</label>
                    <input type="text" name="ciudad" value="<?php echo $oficina->getCiudad(); ?>" />
                    <label>Teléfono</label>
                    <input type="text" name="telefono" value="<?php echo $oficina->getTelefono(); ?>" />
                    <label>Correo</label>
                    <input type="text" name="correo" value="<?php echo $oficina->getCorreo(); ?>" />
                    <input type="submit" value="Modificar"/>
                </form>
            </div>
        </div>
    </body>
</html>
<?php
$bd->close();
