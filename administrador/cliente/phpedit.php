<?php
require '../AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCliente($bd);
$time = new Time();

$id = Request::post("pkid");
$idmatricula = Request::post("idmatricula");
$fechasalida = Request::post("fechasalida");
$fechaentrada = Request::post("fechaentrada");
$nombre = Request::post("nombre");
$apellidos = Request::post("apellidos");
$dni = Request::post("dni");
$telefono = Request::post("telefono");
$precio = Request::post("precio");

$cliente = new Cliente();
if($cliente->fechaValidar($fechasalida, $fechaentrada)){
    $dias = $time->contarDias($fechasalida, $fechaentrada);
    $precio = $precio*$dias;
    $cliente=new Cliente($id, $idmatricula, $fechasalida, $fechaentrada, $nombre, $apellidos, $dni, $telefono, $precio);
}else{
    $mensaje="Error al introducir la fecha";
}


$r = $gestor->set($cliente);
$bd->close();
var_dump($bd->getError());
header("Location:index.php?op=edit&r=$r&mensaje=$mensaje");