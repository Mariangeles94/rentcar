<?php
require '../AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageOficina($bd);
$oficina = Request::get("id");
$r = $gestor->delete($oficina);
$bd->close();
header("Location:index.php?op=delete&r=$r");

