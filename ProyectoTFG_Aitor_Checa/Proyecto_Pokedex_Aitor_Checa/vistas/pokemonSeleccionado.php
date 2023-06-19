<?php
        
ob_start();
        
?>
    <div class="pokemonSel">
        <div class="numPoke" id="texto">Número de PokéDex #<?= $pokemon -> getNumPokedex() ?></div>
        <div id="foto" style="background-image:url('imagenes/pokemon/<?= ($fotodao -> obtenerPrincipal($pokemon -> getNumPokedex())) -> getDireccion() ?>')"></div>
        <?php foreach($fotos as $f): ?>
        <div id="foto" style="background-image:url('imagenes/pokemon/<?= $f -> getDireccion() ?>')"></div>
        <?php endforeach; ?>
        <br>
        <div class="nombre" id="texto"><?= $pokemon -> getNombre() ?></div>
        <div class="descripcion" id="texto"><?= $pokemon -> getDescripcion() ?></div>
        <div class="categoria" id="texto"><?= $pokemon -> getCategoria() ?></div>
        <div class="tipoP" id="texto"><?= $pokemon -> getTipoPrimario() ?></div>
        <div class="tipoS" id="texto"><?= $pokemon -> getTipoSecundario() ?></div>
        <div class="habilidad" id="texto"><?= $pokemon -> getHabilidad() ?></div>
        <div class="habilidadO" id="texto"><?= $pokemon -> getHabilidadOculta() ?></div>
        <div class="peso" id="texto"><?= $pokemon -> getPeso() ?>kg</div>
        <div class="altura" id="texto"><?= $pokemon -> getAltura() ?>m</div>
        <div class="color" id="texto"><?= $pokemon -> getColor() ?></div>
        <div class="generacion" id="texto"><?= $pokemon -> getGeneracion() ?></div>
        <div class="huella" id="texto"><?= $pokemon -> getHuella() ?></div>
        <div class="grito" id="texto"><?= $pokemon -> getGrito() ?></div>
    </div>
<?php
        
$vista = ob_get_clean();
require 'vistas/plantilla.php';   

?>
