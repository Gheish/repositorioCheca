<?php
        
ob_start();
        
?>
    <?php if(isset($_SESSION['email'])): ?>
    <a href="index.php?action=insertarAnuncio" id="nuevoPokem">Nuevo Anuncio</a>
    <br>
    <br>
    <?php endif; ?>
    <div class="listadoPokemon">
        <?php foreach($pokemon as $p): ?>
        <a href="index.php?action=anuncioSeleccionado&idanun=<?= $p -> getIdPoke() ?>" id="pokeTexto"><div class="pokemon">
            <div class="numPoke">Id de anuncio <?= $p -> getIdPoke() ?></div>
            <div id="foto" style="background-image:url('imagenes/<?=($fotodao ->obtenerPrincipal($p -> getIdPoke()))->getDireccion()  ?>')" ></div>
            <br>
            <div class="nombre">Titulo <?= $p -> getNombre() ?></div>
            <div class="Precio">Precio <?= $p -> getPrecio() ?></div>
        </div></a>
        <br>
        <?php endforeach; ?>
    </div>
    <?php if($pagina==0): ?>
    <a href="index.php?action=misAnuncios&pagina=<?= $pagina+1 ?>" id="pagSig">Página Siguiente ></a>
    <?php else: ?>
    <a href="index.php?action=misAnuncios&pagina=<?= $pagina-1 ?>" id="pagAnt">< Página Anterior</a>
    <a href="index.php?action=misAnuncios&pagina=<?= $pagina+1 ?>" id="pagSig">Página Siguiente ></a>
    <?php endif; ?>
<?php
        
$vista = ob_get_clean();
require 'vistas/plantilla.php';   

?>
