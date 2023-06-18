<?php
        
ob_start();
        
?>
    <?php MensajeFlash::imprimirMensajes() ?>
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
    <script type="text/javascript">
        
        $(document).ready(){
            
            var email = document.getElementById('email').text();
            console.log(email);
        
            $('#i_facturae_numfra').focus();

            $(document).on('click', '#btn_buscar_factura', function(){

                BuscarFactura();

            });

        };
        
        let data = new FormData();
        data.append('email', 'juan@juan.com');
        let url = "http://localhost/Proyecto_Wallapop/index.php?action=comprobarEmail";
        
        fetch(url, {
                
            method: "POST",
            body: data
            
        }).then(function (response){
            
            console.log(response);
            
        }).catch(function(error){
            
            console.log(error);
             
        });
        
    </script>
    <?php
        
$vista = ob_get_clean();
require 'vistas/plantilla.php';   

?>
