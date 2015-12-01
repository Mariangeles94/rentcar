<?php

require '../AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageVehiculo($bd);

$matricula = Request::post("pkmatricula");
$marca = Request::post("marca");
$modelo = Request::post("modelo");
$precio = Request::post("precio");
$oficina = Request::post("oficina");
$disponible = Request::post("disponible");

$mensaje = "";
$vehiculo = new Vehiculo();
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

$r = $gestor->set($vehiculo);

$bd->close();
var_dump($bd->getError());

header("Location:index.php?op=edit&r=$r&mensaje=$mensaje");
