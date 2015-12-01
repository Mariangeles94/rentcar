<?php
require '../AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCliente($bd);
$page = Request::get("page");

$clientes = $gestor->getList();
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
        <h3><a class="enlaceInsertar" href="viewinsert.php">Alta cliente</a></h3>
        <table border="1">
            <thead>
                <tr>
                    <th>Código Cliente</th>
                    <th>Matricula</th>
                    <th>Fecha salida</th>
                    <th>Fecha entrada</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>Precio</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $key => $cliente) { ?>
                    <tr>
                        <td><?= $cliente->getId() ?></td>
                        <td><?= $cliente->getIdmatricula() ?></td>
                        <td><?= $cliente->getFechasalida() ?></td>
                        <td><?= $cliente->getFechaentrada() ?></td>
                        <td><?= $cliente->getNombre() ?></td>
                        <td><?= $cliente->getApellidos() ?></td>
                        <td><?= $cliente->getDni() ?></td>
                        <td><?= $cliente->getTelefono() ?></td>
                        <td><?= $cliente->getPrecio() ?></td>
                        <td>
                            <a class='borrar' href='phpdelete.php?id=<?= $cliente->getId() ?>'> Borrar</a>
                            <a href='viewedit.php?id=<?= $cliente->getId() ?>'> Editar</a>
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

