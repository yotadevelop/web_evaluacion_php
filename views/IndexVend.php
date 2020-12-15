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

        <nav>
            <div class="nav-wrapper green">
                <a href="#" class="brand-logo center">Bienvenido: <?= $_SESSION['vendedor']['nombre'] ?></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="salir.php">Salir</a></li>
                </ul>
            </div>

        </nav>
        <div class="row"><br><br>
            <div class="col l2 m3 s12">
            </div>
            <div class="col l10 m9 s12">
                <form action="../controllers/ControlCliente.php" method="POST">
                    <button class="btn black" name="bt_crear" style="width: 25%;">Crear Cliente</button><button class="btn black" name="bt_buscar" style="width: 25%;">Buscar Receta</button><button class="btn black" name="bt_ingresar" style="width: 25%;">Ingreso</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col l3 m12 s12 ">
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
                        <?php if(isset($_SESSION['resp'])) {
                            echo $_SESSION['resp'];
                            unset($_SESSION['resp']);
                        } ?>
                    </p>
                </div>
            <?php } else if (isset($_SESSION['buscar'])) { ?>
                <!------AQUI VA EL BUSCAR------>
                    <div class="row">
                        <div class="col l10 offset-l1">
                            <div class="card-panel">
                                <div class="row">
                                    <div class="col l3">
                                        <input type="text" placeholder="Rut">
                                    </div>
                                    <div class="col l1">
                                        <button class="btn">buscar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php } else { ?>
                <!------AQUI VA EL INGRESAR------>
                <div id="app" class="card-panel">
                <h4 class="center green white-text">Buscar Cliente</h4>
                    <div class="row">
                        <div class="col l4 m12 s12">
                            <form @submit.prevent="buscar" class="pad-25 b1">
                                <input type="text" v-model="rut" placeholder="Rut_cliente">
                                <button class="btn-small">buscar</button>
                            </form>
                            
                        </div>
                        <div class="col l8 s12 m12">
                            <p>
                                <ul class="collection b1">
                                    <li class="collection-item">{{cliente.nombre_cliente}}</li>
                                    <li class="collection-item">{{cliente.direccion_cliente}}</li>
                                    <li class="collection-item">{{cliente.telefono_cliente}}</li>
                                    <li class="collection-item">{{cliente.email_cliente}}</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <!---Fin Buscar Cliente--->
                    <!--Material Cristal-->
                <div class="card-panel "><b><hr class="b1"></b>
                    <div class="row">
                        <div class="col l3">
                            
                            <div id="CBO" class="card-panel b1">
                                Material Cristal        
                                <select v-model="id_material_cristal" class="browser-default b1">
                                    <option v-for="m in materiales" :value="m.id_material_cristal">
                                    {{m.material_cristal}}
                                    </option>
                                </select>
                            </div>
                            <!--Fin Material Cristal--->
                            <!--Armazon--->
                            <div id="arma_cbo" class="card-panel b1">
                                Armazon
                                <select v-model="id_armazon" class="browser-default b1">
                                    <option v-for="a in armazones" :value="a.id_armazon">
                                        {{a.nombre_armazon}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <!--Fin Armazon--->
                        <!----Tipo Cristal----->
                        <div class="col l3">
                            <div id="tipo_cbo" class="card-panel b1">
                                Tipo Cristal        
                                <select v-model="id_tipo_cristal" class="browser-default b1">
                                    <option v-for="t in Tipos" value="t.id_tipo_cristal">
                                    {{t.tipo_cristal}}
                                    </option>
                                </select>
                            </div>
                            <!--Fin Tipo Cristal--->
                            <!--Base-->
                            <div class="card-panel b1"> 
                                Base
                                <select class="browser-default b1 ">
                                    <option value="null"></option>
                                    <option value="superior">superior</option>
                                    <option value="inferior">inferior</option>
                                    <option value="interna">interna</option>
                                    <option value="externa">externa</option>
                                </select>
                            </div>
                            <!--Fin Base--->
                        </div>
                        
                        <div class="col l6 ">
                            <div class="row">
                                <div class="col l6 ">
                                    <div class="card-panel b1">
                                    Ojo Izquierdo
                                        <input type="text" placeholder="Esfera">
                                        <input type="text" placeholder="Cilindro">
                                        <input type="text" placeholder="Eje">
                                    </div>  
                                </div>
                                <div class="col l6">
                                    <div class="card-panel b1">
                                    Ojo Derecho
                                        <input type="text" placeholder="Esfera">
                                        <input type="text" placeholder="Cilindro">
                                        <input type="text" placeholder="Eje">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><b><hr class="b1"></b>
                </div>

                <div class="card-panel b1">
                    <div class="row">
                        <div class="col l3">
                            Prisma
                            <input type="text" placeholder="Prisma">
                            Distancia Pupilar
                            <input type="text" placeholder="Distancia Pupilar">
                        </div>
                        <div class="col l3 offset-l1">
                            Fecha entrega
                            <input type="text" placeholder="Fecha_entrega" class="datepicker" name="fecha_entrega">
                            Valor Lente
                            <input type="text" placeholder="Precio Lente">
                        </div>
                        <div class="col l3 offset-l1">
                            Fecha retiro
                            <input type="text" placeholder="Fecha_retiro" class="datepicker" name="fecha_retiro">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col l3 ">
                            Observación <br>
                            <div class="card-panel b1 br10">
                                <input text="text" placeholder="Observación"><br><br><br>
                            </div>
                        </div>
                        <div class="col l3 offset-l1"><br>
                            <input type="text" placeholder="Rut Medico"><br>
                            <input type="text" placeholder="nombre Medico">
                        </div>
                        <div class="col l4 center"><br><br><br><br> <br>
                            <button class="btn w50 ">Crear Receta</button>
                        </div>
                    </div>
                </div>
                <!--Fin ingresar-->
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
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <script src="../js/buscar_cliente.js"></script>
        <script src="../js/tipo_cbo.js"></script>
        <script src="../js/armazon_cbo.js"></script>
        <script src="../js/cbo.js"></script>
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