<?php

require '../AutoCarga.php';
$bd = new DataBase();
$gestorCliente = new ManageCliente($bd);
$gestorVehiculo = new ManageVehiculo($bd);
$gestorVehiculoCliente = new ManageVehiculoCliente($bd);
$mensaje = "";
$time = new Time();

$id = Request::post("id");
$idmatricula = Request::post("idmatricula");
$fechasalida = Request::post("fechasalida");
$fechaentrada = Request::post("fechaentrada");
$nombre = Request::post("nombre");
$apellidos = Request::post("apellidos");
$dni = Request::post("dni");
$telefono = Request::post("telefono");
$precio = Request::post("precio");


$cliente = new Cliente();
$v1 = new Vehiculo();
if ($cliente->fechaValidar($fechasalida, $fechaentrada)) {
    $dias = $time->contarDias($fechasalida, $fechaentrada);
    $precio = $precio*$dias;
    $cliente = new Cliente($id, $idmatricula, $fechasalida, $fechaentrada, $nombre, $apellidos, $dni, $telefono, $precio);
    $vehiculoDisponible = $gestorVehiculoCliente->getListPrueba($idmatricula);

    foreach ($vehiculoDisponible as $key => $vehiculo) {
        $matricula = $vehiculo["vehiculo"]->getMatricula();
        $marca = $vehiculo["vehiculo"]->getMarca();
        $modelo = $vehiculo["vehiculo"]->getModelo();
        $precioV = $vehiculo["vehiculo"]->getPrecio();
        $oficina = $vehiculo["vehiculo"]->getOficina();
        $disponible = $vehiculo["vehiculo"]->getDisponible();
    }
    if ($disponible != 0) {
        $disponible = 0;
        $v1 = new Vehiculo($matricula, $marca, $modelo, $precioV, $oficina, $disponible);
        $mensaje = "Vehiculo alquilado, en breves nos pondremos en contacto con el cliente";
    } else {
        $mensaje = "Vehiculo no disponible";
    }
} else {
    $mensaje = "Error al introducir la fecha";
}



$p = $gestorVehiculo->set($v1);
$r = $gestorCliente->insert($cliente);
$bd->close();
var_dump($bd->getError());
header("Location:index.php?mensaje=$mensaje");
