<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PokéDex</title>
        <link rel="shortcut icon" type="image/x-icon" href="imagenes/pokeball_logo.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-a11y="true"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<style src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css"></style>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="overlay_movimiento" id="overlay" style="display:none;">
            <img src="imagenes/preloader/pokeball.gif"/>
        </div>
        <a class="scroll-to-top rounded" href="#page-top"(body)>
            <i class="fas fa-angle-up"></i>
        </a>
        <header>            
            <h1 id="pokedex">PokéDex Nacional</h1>
            <?php if(isset($_SESSION['email'])): ?>
            <div class="div-usuario">
                <strong class="usuario_sesion"><?= $_SESSION['email'] ?></strong>
                <a href="index.php?action=logout" id="inicio">Cerrar Sesión</a>
            </div>
            <br>
            <?php else: ?>
            <button type="button" id="iniciar_sesion" class="iniciar_sesion" data-toggle="modal" data-target="#modalInicioSesion">Iniciar Sesión</button>
            <?php endif; ?>
            <div class="div-enlaces">
                <strong><a href="index.php?action=inicio" id="enlaces">Mapa de encuentro</a></strong>
                <strong><a href="index.php?action=listaPokemon" id="enlaces">Mis Pokémon</a></strong>
            </div>
            <br>
        </header>
        <?php MensajeFlash::imprimirMensajes() ?>
        <div class="modal fade" id="modalInicioSesion" tabindex="10" role="document" aria-labelledby="myModalLabel" data-backdrop="static">
            <div class="modal-dialog" id="modalGrande" role="document">
                <div class="modal-document" style="width: 45vw">
                    <div class="modal-content" style="border: 5px solid lightblue">
                        <form action="index.php?action=login" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesión</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="boton">
                                    <span aria-hidden="true">X</span>
                                </button>
                            </div>
                            <hr align="left" noshade="noshade" size="2" width="100%" />
                            <div class="modal-body">
                                <div class="col-lg-12">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="col-lg-12">
                                                <label class="control-label font-weight-bold">Email</label>
                                                <div class="form-group">
                                                   <input type="text" name="email" placeholder="Email" class="campoent">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <label class="control-label font-weight-bold">Contraseña</label>
                                                <div class="form-group">
                                                    <input type="password" name="contras" placeholder="Contraseña" class="campoent">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Iniciar Sesión" id="boton2">
                                <button id="boton3"><a href="index.php?action=registro" id="registro">Registrarse</a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--parte vista-->
        
        <?php print $vista; ?>
        
        <!--parte vista-->
    </body>
    <script>
        
        $(document).ready(function(){

            $('.pokemon').click(function(){

                buscaPokemon(event);

            });

            $('#pokedex').click(function(){

                window.location.href = "index.php?action=inicio";

            });

            $('#iniciar_sesion').click(function(){

                $('#modalInicioSesion').modal('show');

            });

        });
    
    </script>
</html>
