<?php
require '../AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCliente($bd);
$id = Request::get("id");
$cliente = $gestor->get($id);
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
            <h2>Introduzca los nuevos datos del cliente</h2>
            <div id="form_sample">
                <form action="phpedit.php" method="POST">
                    <label>Código cliente</label>
                    <input type="text" name="pkid" value="<?php echo $cliente->getId(); ?>"/>
                    <label>Matricula</label>
                    <input type="text" name="idmatricula" value="<?php echo $cliente->getIdmatricula(); ?>" />
                    <label>Fecha salida</label>
                    <input type="date" name="fechasalida" value="<?php echo $cliente->getFechasalida(); ?>" />
                    <label>Fecha entrada</label>
                    <input type="date" name="fechaentrada" value="<?php echo $cliente->getFechaentrada(); ?>" />
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $cliente->getNombre(); ?>" />
                    <label>Apellidos</label>
                    <input type="text" name="apellidos" value="<?php echo $cliente->getApellidos(); ?>" />
                    <label>DNI</label>
                    <input type="text" name="dni" value="<?php echo $cliente->getDni(); ?>" /> 
                    <label>Telefono</label>
                    <input type="text" name="telefono" value="<?php echo $cliente->getTelefono(); ?>" />
                    <label>Precio</label>
                    <input type="text" name="precio" value="<?php echo $cliente->getPrecio(); ?>" />      
                    <input type="submit" value="edicion"/>
                </form>
            </div>
        </div>
    </body>
</html>
<?php
$bd->close();
