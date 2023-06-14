<?php 
//El código html no se envía al cliente, sino que se guarda en memoria
ob_start();
?>   
    <section class="cont">
        <form action="index.php?action=insertarFoto&id=<?= $idanun ?>" method="post" enctype="multipart/form-data" class="formdatper">
            <input type="file" name="foto[]" placeholder="foto" accept=".gif, .jpg, .png, .webp" multiple class="campoent"><br>
            <input type="submit" value="Insertar" class="enviar">
        </form>
    </section>
<?php
//Guarda todo el html en $vista
$vista =  ob_get_clean(); 

require 'vistas/plantilla.php';