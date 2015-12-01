<?php
require '../AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageVehiculo($bd);

$matricula = Request::post("matricula");
$marca = Request::post("marca");
$modelo = Request::post("modelo");
$precio = Request::post("precio");
$oficina = Request::post("oficina");
$disponible = Request::post("disponible");
if ($disponible === "Disponible") {
    $disponible = 1;
} else {
    if ($disponible === "No disponible") {
        $disponible = 0;
    } else {
        $mensaje = "Error disponibilidad";
    }
}

$vehiculo = new Vehiculo($matricula, $marca, $modelo, $precio, $oficina, $disponible);
$r = $gestor->insert($vehiculo);
var_dump($bd->getError());
$bd->close();

header("Location:index.php?op=insert&r=$r");
