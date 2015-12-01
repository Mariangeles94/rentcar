<?php

require '../clases/AutoCarga.php';
$usuario = Request::post("usuario");
$contraseña = Request::post("contraseña");

if ($usuario === Administrador::Usuario && $contraseña === Administrador::Contraseña) {
    header("Location:cliente/index.php");
} else {
    $mensaje = "Error al ingresar";
    header("Location:login.php?mensaje=$mensaje");
}

