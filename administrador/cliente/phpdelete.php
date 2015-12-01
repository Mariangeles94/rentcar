<?php
require '../AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCliente($bd);
$cliente = Request::get("id");
$r = $gestor->delete($cliente);
$bd->close();
header("Location:index.php?op=delete&r=$r");


