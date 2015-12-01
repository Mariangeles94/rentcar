<?php
require './clases/AutoCarga.php';
$bd = new DataBase();
$gestorOficina = new ManageOficina($bd);
$id = Request::get("id");
$oficina = $gestorOficina->get($id);
$TodasOficinas = $gestorOficina->getList();
$mensaje=  Request::get("mensaje");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        
        <div id="enlaceAdmin">
            <a href="administrador/login.php">Administrador</a>
        </div>
        
        <div class="tabla">
            <h3><?php echo $mensaje ?></h3>
            <h1>Estas son nuestras oficinas</h1>
            <table border="1">
                <thead>
                    <tr>
                        <th>Codigo oficina</th>
                        <th>Direccion</th>
                        <th>Ciudad</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($TodasOficinas as $key => $oficina) { ?>
                        <tr class="alt">
                            <td><?= $oficina->getId() ?></td>
                            <td><?= $oficina->getDireccion() ?></td>
                            <td><?= $oficina->getCiudad() ?></td>
                            <td><?= $oficina->getTelefono() ?></td>
                            <td><?= $oficina->getCorreo() ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="form">
            <form action="vehiculosdisponible.php?oficina=<?php $gestorOficina->getValuesSelectOficina() ?>" method="get"><!--pasar la ciudad en oficina-->
               
                 <label>Seleccione una oficina</label>
                 <div class="caja">
                    <?php echo Util::getSelect("oficina", $gestorOficina->getValuesSelectOficina(), $oficina->getCiudad(), FALSE) ?>
                </div>
                <p class="p-container">
                    <input type="submit" value="Ver" id="go" />
                </p>
            </form>
        </div>
       
        
    </body>
</html>
<?php 
$bd->close();
