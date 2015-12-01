<?php
require '../AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageOficina($bd);

$oficinas = $gestor->getList();
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
if ($op == "insert" && $r != 0) {
    $op = "Se ha registrado correctamente";
}
if ($op == "insert" && $r != 1) {
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
        <h3><a class="enlaceInsertar" href="viewinsert.php">Insertar oficina</a></h3>
        <table border="1">
            <thead>
                <tr>
                    <th>Codigo oficina</th>
                    <th>Direccion</th>
                    <th>Ciudad</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($oficinas as $key => $oficina) { ?>
                    <tr>
                        <td><?= $oficina->getId() ?></td>
                        <td><?= $oficina->getDireccion() ?></td>
                        <td><?= $oficina->getCiudad() ?></td>
                        <td><?= $oficina->getTelefono() ?></td>
                        <td><?= $oficina->getCorreo() ?></td>
                        <td>
                            <a href='viewedit.php?id=<?= $oficina->getId() ?>'> Editar</a>
                            <a class='borrar' href='phpdelete.php?id=<?= $oficina->getId() ?>'> Borrar</a>
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

