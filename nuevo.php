<?php
require './clases/AutoCarga.php';
$bd = new DataBase();
$gestorVehiculo = new ManageVehiculo($bd);
$gestorCliente = new ManageCliente($bd);

$matricula = Request::get("matricula");
$precio = Request::get("precio");
$disponibilidad = Request::get("disponible");
$vehiculo = new Oficina();
$vehiculo = $gestorVehiculo->get($matricula);
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    <div id="main">
        <?php if ($disponibilidad == 1) { ?>
            <h2>Introduzca sus datos</h2>
            <div id="form_sample">
                <form action="phpnewclient.php" method="POST">
                    <label for="id">Código cliente </label>
                    <input type="text" name="id" id="id" value="<?php ?>" /><br>
                    <label for="idmatricula">Matricula </label>
                    <input type="text" name="idmatricula" id="idmatricula" value="<?php echo $matricula ?>" /><br>
                    <label for="fechasalida">Fecha salida </label>
                    <input type="date" name="fechasalida" id="fechasalida" value="" /><br>
                    <label for="fechaentrada">Fecha entrada </label>
                    <input type="date" name="fechaentrada" id="fechaentrada" value="" /><br>
                    <label for="nombre">Nombre </label>
                    <input type="text" name="nombre" id="nombre" value="" /><br>
                    <label for="apellidos">Apellidos </label>
                    <input type="text" name="apellidos" id="apellidos" value="" /><br>
                    <label for="dni">DNI </label>
                    <input type="text" name="dni" id="dni" value="" /><br>
                    <label for="telefono">Teléfono </label>
                    <input type="text" name="telefono" id="telefono" value="" /><br>
                    <label for="precio">Precio </label>
                    <input type="text" name="precio" id="precio" value="<?php echo $precio ?>" /><br>
                    <input type="submit" value="Reservar" />
                </form>
            </div>

        <?php }if ($disponibilidad == 0) { ?>
            <div id="nodispo">
                <h1 class="NoDisponible">Vehiculo no disponible</h1>

            </div>
            <h3 class="volverVehiculos"><a class="volverVehiculos" href="index.php">Volver</a></h3>
        <?php } ?>
    </div>
</body>
</html>
<?php
$bd->close();
