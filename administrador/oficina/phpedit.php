<?php
require '../AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageOficina($bd);

$id = Request::post("pkid");
$direccion = Request::post("direccion");
$ciudad = Request::post("ciudad");
$telefono = Request::post("telefono");
$correo = Request::post("correo");

$oficina = new Oficina($id, $direccion, $ciudad, $telefono, $correo);
$r = $gestor->set($oficina);
$bd->close();
echo $r;
var_dump($bd->getError());
header("Location:index.php?op=edit&r=$r");