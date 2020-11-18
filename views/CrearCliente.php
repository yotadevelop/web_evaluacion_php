<?php
ini_set('display_errors', 1);
ini_set('dispplay_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cliente</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="blue" style="font-family: 'Dosis', sans-serif;">
    <?php if (isset($_SESSION['vendedor'])) { ?>

        <div class="row"><br><br>
            <div class="col l1 s12">
            </div>
            <div class="col l10 m4 s12">
                <form action="../controllers/ControlCliente.php" method="POST">
                    <button class="btn black" name="bt_crear" style="width: 25%;">Crear Cliente</button><button class="btn black" name="bt_buscar" style="width: 25%;">Buscar Cliente</button><button class="btn black" style="width: 25%;">Ingreso</button><a class="btn black" name="bt_exit" style="width: 25%;" href="salir.php">Salir</a>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col l3 s12 ">
            </div>
            <!--------------FOMRULARIO---CREAR--USUARIO----->
            <?php if (isset($_SESSION['crear'])) { ?>
                <div class="col l6 m4 s12  white br10">
                    <form action="../controllers/ControlInsertCliente.php" method="POST">
                        <div class="input-field">
                            <input id="rut" type="text" name="rut">
                            <label for="rut">Rut</label>
                        </div>
                        <div class="input-field">
                            <input id="nombre" type="text" name="nombre">
                            <label for="rut">Nombre</label>
                        </div>
                        <div class="input-field">
                            <input id="direccion" type="text" name="direccion">
                            <label for="direccion">Direccion</label>
                        </div>
                        <div class="input-field">
                            <input id="telefono" type="number" name="telefono">
                            <label for="telefono">telefono</label>
                        </div>
                        <div class="input-field">
                            <input id="fecha" type="text" class="datepicker" name="fecha">
                            <label for="fecha">Fecha</label>
                        </div>
                        <div class="input-field">
                            <input id="email" type="email" name="email">
                            <label for="email">Email</label>
                        </div>
                        <button class="btn green w100">Crear</button><br><br>
                    </form>
                    <p class="center">
                        <?php if (isset($_SESSION['resp'])) {
                            echo $_SESSION['resp'];
                            unset($_SESSION['resp']);
                        } ?>
                    </p>
                </div>
            <?php } else { ?>
                <!------AQUI VA EL BUSCAR------>
            <?php } ?>

        <?php } else { ?>
            <br><br><br><br><br>

            <div class="col l4 offset-l2 center white">
                <h3 class="red-text center">ERROR!!</h3>
                <h5 class="red-text">este sitio es privado, debes iniciar sesion para poder ingresar aqui</h5>
                <a href="../index.php">
                    <h2 style="border: 1px solid red;">Pincha aquí para volver</h2><br><br>
                </a>
            </div>
        <?php } ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.datepicker');
                var instances = M.Datepicker.init(elems, {
                    'autoClose': true,
                    'format': 'yyyy/mm/dd'
                });
            });
        </script>
</body>

</html>