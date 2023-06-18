<?php
        
ob_start();
    
?>
<div class="cv">
    <img src="imagenes/CV Aitor.jpg" alt="Currículum">
</div>
<?php
       
$vista = ob_get_clean();
require 'vistas/plantilla.php';   

?>
