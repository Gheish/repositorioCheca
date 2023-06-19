<?php
        
ob_start();

if(isset($_SESSION['listaAdivinados'])){
    
    $listaAdivinados = $_SESSION['listaAdivinados'];
    
} else {
    
    // El valor del atributo no está disponible en la sesión
    echo 'Valor del atributo no encontrado.';
  
}
        
?>
<div>
    <?php if($pagina == 0): ?>
    <a href="index.php?action=listaPokemon&pagina=<?= $pagina+1 ?>" class="pagSig col-lg-12">Página Siguiente ></a>
    <?php elseif($pagina < $totalPaginas-1): ?>
    <a href="index.php?action=listaPokemon&pagina=<?= $pagina-1 ?>" class="pagAnt col-lg-6">< Página Anterior</a>
    <a href="index.php?action=listaPokemon&pagina=<?= $pagina+1 ?>" class="pagSig col-lg-6">Página Siguiente ></a>
    <?php else: ?>
    <a href="index.php?action=listaPokemon&pagina=<?= $pagina-1 ?>" class="pagAnt col-lg-12">< Página Anterior</a>
    <?php endif; ?>
    <br>
    <br>
    <div class="listadoPokemon">
        <div class="container-fluid">
            <?php foreach($pokemon as $p): ?>
                <?php if(in_array($p -> getNumPokedex(), $listaAdivinados)): ?>
                <a class="pokeTexto" data-toggle="modal" data-target="#modalPokemon" id="<?= $p -> getNumPokedex() ?>" onclick="$('#modalPokemon').modal('show')"><div class="col-lg-11 pokemon" id="pokemon_<?= $p -> getNumPokedex() ?>">
                    <div class="foto" class="col-lg-4" style="background-image:url('imagenes/pokemon/<?= ($fotodao -> obtenerPrincipal($p -> getNumPokedex())) -> getDireccion() ?>')"></div>
                    <?php if(($p -> getNumPokedex() >= 0) && ($p -> getNumPokedex() <= 9)): ?>
                    <div class="texto_pokemon col-lg-2" id="numeroPoke">No #00<?= $p -> getNumPokedex() ?></div>
                    <?php elseif(($p -> getNumPokedex() >= 10) && ($p -> getNumPokedex() <= 99)): ?>
                        <div class="texto_pokemon col-lg-2" id="numeroPoke">No #0<?= $p -> getNumPokedex() ?></div>
                    <?php else: ?>
                        <div class="texto_pokemon col-lg-2" id="numeroPoke">No #<?= $p -> getNumPokedex() ?></div>
                    <?php endif; ?>
                    <div class="texto_pokemon col-lg-4"><?= $p -> getNombre() ?></div>
                    <br>
                    <?php if(($p -> getTipoPrimario()) == ($p -> getTipoSecundario())): ?>
                        <div class="fototipo" class="col-lg-8" style="background-image:url('imagenes/tipos/<?= ($tipodao -> obtenerEspecifico($p -> getTipoPrimario())) -> getFoto() ?>')"></div>
                    <?php else: ?>
                        <div class="fototipo" class="col-lg-4" style="background-image:url('imagenes/tipos/<?= ($tipodao -> obtenerEspecifico($p -> getTipoPrimario())) -> getFoto() ?>')"></div>
                        <div class="fototipo" class="col-lg-4" style="background-image:url('imagenes/tipos/<?= ($tipodao -> obtenerEspecifico($p -> getTipoSecundario())) -> getFoto() ?>')"></div>
                    <?php endif; ?>
                </div></a>
                <br>
                <?php else: ?>
                <a class="pokeTexto" data-toggle="modal" data-target="#modalPokemon" id="<?= $p -> getNumPokedex() ?>" disabled><div class="col-lg-11 pokemon" id="pokemon_<?= $p -> getNumPokedex() ?>">
                    <div class="foto" class="col-lg-4" style="background-image:url('imagenes/pokemon/0.png')"></div>
                    <?php if(($p -> getNumPokedex() >= 0) && ($p -> getNumPokedex() <= 9)): ?>
                    <div class="texto_pokemon col-lg-2" id="numeroPoke">No #00<?= $p -> getNumPokedex() ?></div>
                    <?php elseif(($p -> getNumPokedex() >= 10) && ($p -> getNumPokedex() <= 99)): ?>
                        <div class="texto_pokemon col-lg-2" id="numeroPoke">No #0<?= $p -> getNumPokedex() ?></div>
                    <?php else: ?>
                        <div class="texto_pokemon col-lg-2" id="numeroPoke">No #<?= $p -> getNumPokedex() ?></div>
                    <?php endif; ?>
                    <div class="texto_pokemon col-lg-4">???????</div>
                    <br>
                    <?php if(($p -> getTipoPrimario()) == ($p -> getTipoSecundario())): ?>
                        <div class="fototipo" class="col-lg-8" style="background-image:url('imagenes/tipos/Misterio.png')"></div>
                    <?php else: ?>
                        <div class="fototipo" class="col-lg-4" style="background-image:url('imagenes/tipos/Misterio.png')"></div>
                        <div class="fototipo" class="col-lg-4" style="background-image:url('imagenes/tipos/Misterio.png')"></div>
                    <?php endif; ?>
                </div></a>
                <br>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php if($pagina == 0): ?>
    <a href="index.php?action=listaPokemon&pagina=<?= $pagina+1 ?>" class="pagSig col-lg-12">Página Siguiente ></a>
    <?php elseif($pagina < $totalPaginas-1): ?>
    <a href="index.php?action=listaPokemon&pagina=<?= $pagina-1 ?>" class="pagAnt col-lg-6">< Página Anterior</a>
    <a href="index.php?action=listaPokemon&pagina=<?= $pagina+1 ?>" class="pagSig col-lg-6">Página Siguiente ></a>
    <?php else: ?>
    <a href="index.php?action=listaPokemon&pagina=<?= $pagina-1 ?>" class="pagAnt col-lg-12">< Página Anterior</a>
    <?php endif; ?>
</div>
<div>
    <div class="modal fade" id="modalPokemon" tabindex="10" role="document" aria-labelledby="myModalLabel" data-backdrop="static">
        <div class="modal-dialog" id="modalGrande" role="document">
            <div class="modal-document" style="width: 65vw;" id="modal-document-pokemon">
                <div class="modal-content" style="border: 10px solid darksalmon">
                    <div class="modal-body" style="background-image: url('imagenes/fondo pokemon2.png'); background-size: cover;">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="row">
                                        <p class="texto" id="numPoke" class="col-lg-6"></p>
                                        <p class="texto" id="nombre" class="col-lg-6"></p>
                                    </div>
                                    <div class="row">
                                        <div class="fototipo" class="col-lg-6" id="tipoP"></div>
                                        <div class="fototipo" class="col-lg-6" id="tipoS"></div>
                                    </div>
                                </div>
                                <hr align="left" noshade="noshade" size="2" width="100%" />
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                           <p class="form-group texto_modalPok" id="categoria"></p>
                                        </div>
                                        <div id="carouselExampleCaptions" class="carousel slide col-lg-4" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div id="fotoCarousel" class="d-block w-100"></div>
                                                    <div id="motivo" class="carousel-caption d-none d-md-block" style="color: rgba(0, 0, 0, 0.7)"></div>
                                                </div>
                                            </div>
<!--                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: black; border-radius: 5px"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: black; border-radius: 5px"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>-->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="texto_modalPok" id="habilidad"></div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="texto_modalPok" id="habilidadOculta"></div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="texto_modalPok" id="color"></div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="texto_modalPok" id="altura"></div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="texto_modalPok" id="peso"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="texto_modalPok" id="descripcion" style="background-color: rgba(255, 255, 255, 0.7); border-left: 8px solid rgba(0, 136, 99, 0.8); border-top: 3px solid rgba(0, 136, 99, 0.8); border-right: 8px solid rgba(0, 136, 99, 0.8); border-bottom: 3px solid rgba(0, 136, 99, 0.8); border-radius: 10px; padding: 2%;"></div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div id="fotoHuella"></div>
                                        </div>
                                        <div class="col-lg-7">
                                            <audio id="audio">
                                                <source id="gritoPoke" type="audio/mpeg">
                                            </audio>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<script>

    function buscaPokemon(event){
        
        var pokemonID = event.target.parentElement.id;
        pokemonID = pokemonID.replace("pokemon_", "");
        
        var continuar = true;
        
        if(pokemonID === ""){

            continuar = false;

        }

        if(continuar === true){

            $.ajax({
                url: "index.php?action=pokemonSeleccionado",
                type: 'POST',
                data: {"ID": pokemonID},
                async: true,
                beforeSend: function(xhr){

                    $('#overlay').fadeIn("fast"); 

                },
                success: function(datos){
                    
                    VaciarDatos();

                    if((pokemonID >= 0) && (pokemonID <= 9)){
                        
                        $('#numPoke').text("Nº #00" + pokemonID);
                        
                    } else if((pokemonID >= 10) && (pokemonID <= 99)){
                        
                        $('#numPoke').text("Nº #0" + pokemonID);
                        
                    } else {
                        
                        $('#numPoke').text("Nº #" + pokemonID);
                        
                    }
                    
                    datos = $.trim(datos);

                    if(datos !== 'false'){

                        obj = JSON.parse(datos);

                        //Cargamos los datos obtenidos
                        $('#nombre').text(obj.nombre);
                        $("#tipoP").html("<img src='imagenes/tipos/" + obj.tipoP + "' alt='Tipo' class='fototipoModal' id='TipoPrimario'>");
                        
                        if(obj.tipoP != obj.tipoS){
                            
                            $("#tipoS").html("<img src='imagenes/tipos/" + obj.tipoS + "' alt='Tipo Secundario' class='fototipoModal' id='TipoSecundario'>");
                            
                        }
                        
                        $('#categoria').text("Pokémon " + obj.categoria);
                        $("#fotoCarousel").html("<img src='imagenes/pokemon/" + obj.direccion + "' alt='Foto' class='fotoCarrusel'>");
                        $("#motivo").text(obj.motivo);
                        $('#habilidad').text("Habilidad: " + obj.habilidad);
                        $('#habilidadOculta').text("Habilidad Oculta: " + obj.habilidadOculta);
                        $('#color').text("Color: " + obj.color);
                        $('#altura').text(obj.altura + "m");
                        $('#peso').text(obj.peso + "kg");
                        $('#descripcion').text("'" + obj.descripcion + "'");
                        $("#fotoHuella").html("<img src='imagenes/huellas/" + obj.huella + "' alt='Huella' class='fotoHuella' id='huella'>");
                        $('#gritoPoke').attr('src="imagenes/gritos/' + obj.grito + ');"');
                        
//                        buscaFotos(pokemonID);

                    } else {

                        $('#msj_alerta').html('El Pokémon especificado no existe.');
                        $("#ModalAlerta").modal("show");

                    }

                },
                complete: function(jqXHR, textStatus){

                    $('#overlay').fadeOut();

                }
            });

        } else {

            $('#msj_alerta').html('Hay un problema en la obtención de datos.');
            $("#ModalAlerta").modal("show");

        }

    }
    
//    function buscaFotos(pokemonID){
//        
//        $.ajax({
//            url: "index.php?action=fotosSeleccionadas",
//            type: 'POST',
//            data: {"ID": pokemonID},
//            async: true,
//            beforeSend: function(xhr){
//
//                $('#overlay').fadeIn("fast"); 
//
//            },
//            success: function(datos) {
//                datos = JSON.parse(datos);
//                var fotoCarousel = $('#carouselExampleCaptions .carousel-inner');
//                fotoCarousel.empty(); // Limpia el contenido existente del carrusel
//                var activeItem = $('#carouselExampleCaptions .carousel-item.active');
//
//                for(var i = 0; i < datos.length; i++){
//                    
//                    var value = datos[i];
//                    var nombreArchivo = datos[i].replace(/\.[^/.]+$/, "");
//                    var nombreFiltrado = nombreArchivo.replace(/\(([^)]+)\)/, "$1");
//
//                    var newCarouselItem = $('<div>').addClass('carousel-item d-block w-100 pokemon-carousel-item').attr('id', nombreFiltrado);
//
//                    var newImage = $('<img>').attr('src', 'imagenes/pokemon/' + datos[i]).attr('alt', 'FotoFormas').addClass('fotoCarrusel');
//
//                    newCarouselItem.append(newImage);
//                    fotoCarousel.append(newCarouselItem);
//                  
//                    var nextItem = activeItem.next();
//
//                    if(nextItem.length === 0){
//                        
//                        nextItem = $('#carouselExampleCaptions .carousel-item').first();
//                      
//                    }
//
//                    if(i === 0){
//                        
//                    //                    newCarouselItem.addClass('active'); // Agrega la clase 'active' al primer elemento
//                      activeItem.removeClass('active');
//                      $(nextItem).addClass('active');
//                    
//                    }
//                    
//                }
//                
//            },
//            complete: function(jqXHR, textStatus){
//
//                $('#overlay').fadeOut();
//
//            }
//        });
//
//    }
    
    
    function VaciarDatos(){
        
        $('#Numero').val('');
        $('#nombre').text('');
        $("#tipoP #TipoPrimario").remove();
        $('#tipoS #TipoSecundario').remove();
        $('#categoria').text('');
        $('#motivo').text('');
        $('#habilidad').text('');
        $('#habilidadOculta').text('');
        $('#color').text('');
        $('#altura').text('');
        $('#peso').text('');
        $('#descripcion').text('');
        $('#fotoHuella #huella').remove();
        
    }

</script>
<?php
       
$vista = ob_get_clean();
require 'vistas/plantilla.php';   

?>
