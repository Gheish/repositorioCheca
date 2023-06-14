<?php
        
ob_start();
        
?>
<div>
    <?php if(isset($_SESSION['email'])): ?>
    <a href="index.php?action=insertarPokemon" class="nuevoPokemon">Introducir Pokémon</a>
    <br>
    <br>
    <?php endif; ?>
    <div class="listadoPokemon">
        <div class="container-fluid">
            <?php foreach($pokemon as $p): ?>
            <a class="pokeTexto" data-toggle="modal" data-target="#modalPokemon" id="poke_mostrar"><div class="col-lg-11 pokemon" id="pokemon_<?= $p -> getNumPokedex() ?>">
                <div id="foto" class="col-lg-4" style="background-image:url('imagenes/pokemon/<?= ($fotodao -> obtenerPrincipal($p -> getNumPokedex())) -> getDireccion() ?>')"></div>
                <?php if(($p -> getNumPokedex() >= 0) && ($p -> getNumPokedex() <= 9)): ?>
                <div class="texto_pokemon col-lg-2">No #00<?= $p -> getNumPokedex() ?></div>
                <?php elseif(($p -> getNumPokedex() >= 10) && ($p -> getNumPokedex() <= 99)): ?>
                    <div class="texto_pokemon col-lg-2">No #0<?= $p -> getNumPokedex() ?></div>
                <?php else: ?>
                    <div class="texto_pokemon col-lg-2">No #<?= $p -> getNumPokedex() ?></div>
                <?php endif; ?>
                <div class="texto_pokemon col-lg-4"><?= $p -> getNombre() ?></div>
                <br>
                <?php if(($p -> getTipoPrimario()) == ($p -> getTipoSecundario())): ?>
                    <div id="fototipo" class="col-lg-8" style="background-image:url('imagenes/tipos///<?= ($tipodao -> obtenerEspecifico($p -> getTipoPrimario())) -> getFoto() ?>')"></div>
                <?php else: ?>
                    <div id="fototipo" class="col-lg-4" style="background-image:url('imagenes/tipos///<?= ($tipodao -> obtenerEspecifico($p -> getTipoPrimario())) -> getFoto() ?>')"></div>
                    <div id="fototipo" class="col-lg-4" style="background-image:url('imagenes/tipos///<?= ($tipodao -> obtenerEspecifico($p -> getTipoSecundario())) -> getFoto() ?>')"></div>
                <?php endif; ?>
            </div></a>
            <br>
            <?php endforeach; ?>
        </div>
    </div>
    <?php if($pagina==0): ?>
    <a href="index.php?action=inicio&pagina=<?= $pagina+1 ?>" id="pagSig">Página Siguiente ></a>
    <?php else: ?>
    <a href="index.php?action=inicio&pagina=<?= $pagina-1 ?>" id="pagAnt">< Página Anterior</a>
    <a href="index.php?action=inicio&pagina=<?= $pagina+1 ?>" id="pagSig">Página Siguiente ></a>
    <?php endif; ?>
    <div class="modal fade" id="modalPokemon" tabindex="10" role="document" aria-labelledby="myModalLabel" data-backdrop="static">
        <div class="modal-dialog" id="modalGrande" role="document">
            <div class="modal-document" style="width: 50vw">
                <div class="modal-content" style="border: 5px solid lightblue">
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-heading">
                                   <div class="texto" id="numPoke" class="col-lg-6"></div>
                                   <div class="texto" id="nombre" class="col-lg-6"></div>
                                </div>
                                <hr align="left" noshade="noshade" size="2" width="100%" />
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                           <div class="form-group texto" id="categoria"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="texto" id="descripcion"></div>
                                        </div>
                                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div id="foto" class="d-block w-100" style="background-image:url('imagenes/pokemon/')"></div>
                                                    <div class="carousel-caption d-none d-md-block">
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
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
<!--<div class="modal fade" id="modalPokemon" tabindex="10" role="document" aria-labelledby="myModalLabel" data-backdrop="static">
            <div class="modal-dialog" id="modalGrande" role="document">
                <div class="modal-document" style="width: 45vw">
                    <div class="modal-content" style="border: 5px solid lightblue">
                        <form action="index.php?action=login" method="post">
                            <div class="modal-header">
                               <div class="texto" id="numPoke" class="col-lg-6"></div>
                               <div class="texto" id="nombre" class="col-lg-6"></div>
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
        </div>-->
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
    
    $(document).ready(function(){
        
        $(document).on('click', '#poke_mostrar', function(){
            
            $('#modalPokemon').modal('show');
            
        });
        
    });

    function buscaPokemon(event){
        
        pokemonID = event.target.parentElement.id;
        pokemonID = pokemonID.replace("pokemon_", "");
        
        continuar = true;
        
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
                    
                    console.log(datos);

//                    $('#numPoke').val(pokemonID);
//                    datos = $.trim(datos);

//                    if(datos !== 'false'){

//                        obj = JSON.parse(datos);

                        //Cargamos los datos obtenidos
//                        $('#nombre').text(datos.nombre);
//                        $('#categoria').val(2);
//                        $('#descripcion').val(3);
//                        $('#i_facturae_' + $i + '_CP').val(obj.CODIGO_POSTAL);
//                        $('#i_facturae_' + $i + '_municipio').val(obj.LOCALIDAD);
//                        $('#i_facturae_' + $i + '_prov').val(obj.CODIGO_PROVINCIA);

//                    } else {
//
//                        $('#msj_alerta').html('El Pokémon especificado no existe.');
//                        $("#ModalAlerta").modal("show");
//
//                    }

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


</script>
<?php
        
$vista = ob_get_clean();
require 'vistas/plantilla.php';   

?>
