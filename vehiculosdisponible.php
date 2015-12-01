<?php
require './clases/AutoCarga.php';
$bd = new DataBase();
$gestorVehiculo = new ManageVehiculo($bd);
$gestorOficinaVehiculo = new ManageOficinaVehiculo($bd);

$idOficina = Request::get("oficina");

$vehiculoDisponible = $gestorOficinaVehiculo->getListPrueba($idOficina);

$gestorOficina = new ManageOficina($bd);
$oficina = $gestorOficina->get($idOficina);

$direccion = $oficina->getDireccion();
$ciudad = $oficina->getCiudad();

$op = Request::get("op");
$r = Request::get("r");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <div class="tabla">
        <h1>Bienvenido a Rentcar</h1>
        <h3>Estamos en <?php echo $direccion ?> (<?php echo $ciudad; ?>)</h3> 
        <h4>Estos son nuestros vehiculos: </h4>
        <table border="1">
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Precio</th>
                    <th>Disponible</th>
                    <th>Alquilar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehiculoDisponible as $key => $vehiculoD) { ?>
                    <tr>
                        <td><?= $vehiculoD["vehiculo"]->getMatricula() ?></td>
                        <td><?= $vehiculoD["vehiculo"]->getMarca() ?></td>
                        <td><?= $vehiculoD["vehiculo"]->getModelo() ?></td>
                        <td><?= $vehiculoD["vehiculo"]->getPrecio() ?></td>
                        <td><?= $vehiculoD["vehiculo"]->getDisponibleModificado() ?></td>
                        <td><a href='nuevo.php?matricula=<?= $vehiculoD["vehiculo"]->getMatricula() ?>&precio=<?= $vehiculoD["vehiculo"]->getPrecio() ?>&disponible=<?= $vehiculoD["vehiculo"]->getDisponible()?>'>Alquilar</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </body>
</html>
<?php
$bd->close();
