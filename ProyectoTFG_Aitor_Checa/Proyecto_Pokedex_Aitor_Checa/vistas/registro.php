<?php
        
ob_start();
        
?>
    <section class="cont">
        <form action="index.php?action=registro" method="post" class="formdatper">
            <label>Nombre:</label><input type="text" name="nombre" class="campoent">
            <br>
            <br>
            <label>Fecha de Nacimiento:</label><input type="date" name="fechaNac" class="campoent">
            <br>
            <br>
            <label>Email:</label><input type="text" name="email" class="campoent" id="email">
            <br>
            <br>
            <label>Contraseña:</label><input type="password" name="contras" class="campoent">
            <br>
            <br>
            <input type="submit" value="Registrar" class="enviar">
        </form>
    </section>
    <div class="modal fade" id="ModalAlerta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong><span id="msj_alerta"></span></strong>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        
    </script>
    <?php
        
$vista = ob_get_clean();
require 'vistas/plantilla.php';   

?>
