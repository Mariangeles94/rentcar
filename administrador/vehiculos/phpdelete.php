<?php
require '../AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageVehiculo($bd);
$matricula = Request::get("matricula");
$r = $gestor->delete($matricula);
$bd->close();
header("Location:index.php?op=delete&r=$r");

