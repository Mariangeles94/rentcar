<?php
require '../AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageVehiculo($bd);
$matricula = Request::get("matricula");
$vehiculo = $gestor->get($matricula);
$gestorVehiculo = new ManageVehiculo($bd);
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
            <h2>Introduzca los nuevos datos del vehiculo</h2>
            <div id="form_sample">
                <form action="phpedit.php" method="POST">
                    <label>Matricula</label>
                    <input type="text" name="pkmatricula" value="<?php echo $vehiculo->getMatricula(); ?>" />
                    <label>Marca</label>
                    <input type="text" name="marca" value="<?php echo $vehiculo->getMarca(); ?>" />
                    <label>Modelo</label>
                    <input type="text" name="modelo" value="<?php echo $vehiculo->getModelo(); ?>" />
                    <label>Precio</label>
                    <input type="text" name="precio" value="<?php echo $vehiculo->getPrecio(); ?>" />
                    <label>Código oficina</label>
                    <input type="number" name="oficina" value="<?php echo $vehiculo->getOficina(); ?>" />
                    <label>Disponibilidad</label>
                    <input type="text" name="disponible" value="<?php echo $vehiculo->getDisponibleModificado(); ?>" />
                    <input type="submit" value="Modificar"/>
                </form>
            </div>
        </div>
    </body>
</html>
<?php
$bd->close();
