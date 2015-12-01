<?php
require '../clases/AutoCarga.php';
$mensaje = Request::get("mensaje");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../css/loginStyle.css" />
    </head>
    <body>
        <?php echo "<h3 class='errorLogin'>$mensaje</h3>" ?>
        <form action="identificacion.php" method="POST">
            <h1>Administrador</h1>
            <div class="inset">
                <p>  
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="email" value="" />
                </p>
                <p>
                    <label for="password">Contraseña</label>
                    <input type="password" name="contraseña" value=""  id="password" />
                </p>
                <p>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me for 14 days</label>
                </p>
            </div>
            <p class="p-container">
                <input type="submit" value="entrar" id="go" />
            </p>
        </form>
    </body>
</html>
