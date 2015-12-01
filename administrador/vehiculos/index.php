
<?php
require '../AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageVehiculo($bd);


$vehiculos = $gestor->getList();
$op = Request::get("op");
$r = Request::get("r");
$mensaje = Request::get("mensaje");
if ($op == "delete" && $r == 1) {
    $op = "Se eliminado correctamente";
}
if ($op == "delete" && $r != 1) {
    $op = "No se ha eliminado correctamente";
}
if ($op == "edit" && $r == 1) {
    $op = "Se ha modificado correctamente";
}
if ($op == "edit" && $r != 1) {
    $op = "No se ha modificado correctamente";
}
if ($op == "insert" && $r != 1) {
    $op = "Se ha registrado correctamente";
}
if ($op == "insert" && $r != 0) {
    $op = "No se ha registrado correctamente";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css"  href="../../css/style.css"/>

    </head>
    <body>
        <header>
            <nav>
                <a href="../vehiculos/index.php">Vehiculos</a>
                <a href="../oficina/index.php">Oficinas</a>
                <a href="../cliente/index.php">Clientes</a>
            </nav>
        </header>
        <?php
        if ($op != null) {
            echo "<h1>$op</h1>";
        }
        echo "<h1>$mensaje</h1>";
        ?>
        <h3><a class="enlaceInsertar" href="viewinsert.php">Insertar vehiculo</a></h3>
        <table border="1">
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Precio</th>
                    <th>Oficina</th>
                    <th>Disponible</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehiculos as $key => $vehiculo) { ?>
                    <tr>
                        <td><?= $vehiculo->getMatricula() ?></td>
                        <td><?= $vehiculo->getMarca() ?></td>
                        <td><?= $vehiculo->getModelo() ?></td>
                        <td><?= $vehiculo->getPrecio() ?></td>
                        <td><?= $vehiculo->getOficina() ?></td>
                        <td><?= $vehiculo->getDisponibleModificado() ?></td>
                        <td>
                            <a class="borrar" href="phpdelete.php?matricula=<?= $vehiculo->getMatricula() ?>">borrar</a>
                            <a href="viewedit.php?matricula=<?= $vehiculo->getMatricula() ?>">editar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <h3><a class="enlaceVolver" href="../../index.php">Volver a inicio</a></h3>
    </body>
    <script src="../../js/scripts.js"></script>
</html>
<?php
$bd->close();
