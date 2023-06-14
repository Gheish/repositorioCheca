<?php
        
ob_start();
        
?>
    <?php if(isset($_SESSION['email'])): ?>
<a href="index.php?action=insertarPokemon" class="nuevoPokemon">Introducir Pokémon</a>
<br>
<br>
<?php endif; ?>
<div class="listadoPokemon">
    <div class="container-fluid">
        <?php foreach($pokemon as $p): ?>
        <a class="pokeTexto"><div class="col-lg-11 pokemon" id="pokemon_<?= $p -> getNumPokedex() ?>">
            <div id="foto" class="col-lg-4" style="background-image:url('imagenes/pokemon/<?= ($fotodao -> obtenerPrincipal($p -> getNumPokedex())) -> getDireccion() ?>')"></div>
            <!-- <?php if(($p -> getNumPokedex() >= 0) && ($p -> getNumPokedex() <= 9)): ?>
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
            <?php endif; ?> -->
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
<div>
    <div class="modal fade" id="modalPokemon" tabindex="10" role="document" aria-labelledby="myModalLabel" data-backdrop="static">
        <div class="modal-dialog" id="modalGrande" role="document">
            <div class="modal-document" style="width: 50vw">
                <div class="modal-content" style="border: 5px solid lightblue">
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-heading">
                                   <div class="numPoke" id="texto" class="col-lg-6"></div>
                                   <div class="nombre" id="texto" class="col-lg-6"></div>
                                </div>
                                <hr align="left" noshade="noshade" size="2" width="100%" />
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                           <div class="form-group categoria" id="texto"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="descripcion" id="texto"></div>
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
<script>

    
//    function BuscarCentroAdmin(event){
        
//        var $i;
//        
//        if(event.target.id == "btn_facturae_tramitadora"){
//            
//            $i = "tramitadora";
//            console.log(event.target.id);
//            
//        } else if(event.target.id == "btn_facturae_contable"){
//            
//            $i = "contable";
//            console.log(event.target.id);
//            
//        } else if(event.target.id == "btn_facturae_gestor"){
//            
//            $i = "gestor";
//            console.log(event.target.id);
//            
//        } else if(event.target.id == "btn_facturae_proponente"){
//            
//            $i = "proponente";
//            console.log(event.target.id);
//            
//        }
//            
//        var centro = $('#i_facturae_' + $i).val();
//        var codCli = $("#i_facturae_cod_cliente").val();
//        var rol = $('#i_facturae_' + $i + '_rol').val();
//        var continuar = true;
//        console.log(centro, rol);
//        if(centro === ""){
//
//            AniadirAlerta('centro');
//            continuar = false;
//
//        }
//
//        if(codCli === ""){
//
//            AniadirAlerta('codCli');
//            continuar = false;
//
//        }
//
//        if(rol === ""){
//
//            AniadirAlerta('rol');
//            continuar = false;
//
//        }
//
//        if(continuar === true){
//
//            $.ajax({
//                url: "buscar_centro_administrativo",
//                type: 'POST',
//                data: {"ROL": rol, "CODCLI": codCli},
//                async: true,
//                beforeSend: function(xhr){
//
//                    $('#overlay').fadeIn("fast"); 
//
//                },
//                success: function(datos){
//                    console.log(datos);
//                    //Antes de rellenar los campos limpio los campos de la factura anterior.
//                    VaciarDatosCentro();
//
//                    $('#i_facturae_' + $i + '_cod').val(centro);
//                    datos = $.trim(datos);
//
//                    if(datos !== 'false'){
//
//                        obj = JSON.parse(datos);
//
//                        //Cargamos los datos obtenidos
//                        $('#i_facturae_' + $i + '_nombre').val(obj.NOMBRE_CENTRO);
//                        $('#i_facturae_' + $i + '_via').val(obj.DIRECCION);
//                        $('#i_facturae_' + $i + '_numero').val(obj.NUM_DIR);
//                        $('#i_facturae_' + $i + '_CP').val(obj.CODIGO_POSTAL);
//                        $('#i_facturae_' + $i + '_municipio').val(obj.LOCALIDAD);
//                        $('#i_facturae_' + $i + '_prov').val(obj.CODIGO_PROVINCIA);
//
//                    } else {
//
//                        $('#msj_alerta').html('La Factura que has especificado no existe.');
//                        $("#ModalAlerta").modal("show");
//
//                    }
//
//                },
//                complete: function(jqXHR, textStatus){
//
//                    $('#overlay').fadeOut();
//
//                }
//            });
//
//        } else {
//
//            $('#msj_alerta').html('Hay un problema en la obtención de datos.');
//            $("#ModalAlerta").modal("show");
//
//        }

//        if(event.target.id === "btn_facturae_tramitadora" || event.target.id === "btn_facturae_tramitadora2"){
//        // Modal individual Tramitadora
//        
//            var centro = $('#i_facturae_tramitadora').val();
//            var codCli = $('#i_facturae_cod_cliente').val();
//            var rol = $('#i_facturae_tramitadora_rol').val();
//            var continuar = true;
//
//            if(codCli === ""){
//                
//                setTimeout(function(){
//                    
//                  BuscarCentroAdmin(event);
//                  
//                }, 10);
//
//            }
//
//            if(rol === ""){
//                
//                setTimeout(function(){
//                    
//                  BuscarCentroAdmin(event);
//                  
//                }, 10);
//
//            }
//
//            if(continuar === true){
//
//                $.ajax({
//                    url: "buscar_centro_administrativo",
//                    type: 'POST',
//                    data: {"ROL": rol, "CODCLI": codCli},
//                    async: true,
//                    beforeSend: function(xhr){
//
//                        $('#overlay').fadeIn("fast"); 
//
//                    },
//                    success: function(datos){
//                        //Antes de rellenar los campos limpio los campos de la factura anterior.
//
//                        $('#i_facturae_tramitadora_cod').val(centro);
//                        datos = $.trim(datos);
//
//                        obj = JSON.parse(datos);
//
//                        //Cargamos los datos obtenidos
//                        $('#i_facturae_tramitadora_nombre').val(obj.NOMBRE_CENTRO);
//                        $('#i_facturae_tramitadora_via').val(obj.DIRECCION);
//                        $('#i_facturae_tramitadora_numero').val(obj.NUM_DIR);
//                        $('#i_facturae_tramitadora_CP').val(obj.CODIGO_POSTAL);
//                        $('#i_facturae_tramitadora_municipio').val(obj.LOCALIDAD);
//                        $('#i_facturae_tramitadora_prov').val(obj.CODIGO_PROVINCIA);
//
//                        $('#i_facturae_tramitadora_CP').on('input', BuscarLocalidad.bind(null, 'i_facturae_tramitadora_CP'));
//
//                        if(datos !== 'false'){
//                            
//                            $('#codigo_tramitadora').val(3);
//                            
//                        } else {
//                            
//                            $('#codigo_tramitadora').val(-1);
//                            
//                        }
//
//                    },
//                    complete: function(jqXHR, textStatus){
//
//                        $('#overlay').fadeOut();
//
//                    }
//                });
//
//            }
//            
//        } else if(event.target.id === "btn_facturae_contable" || event.target.id === "btn_facturae_contable2"){
//        // Modal individual Contable
//            
//            var centro = $('#i_facturae_contable').val();
//            var codCli = $('#i_facturae_cod_cliente').val();
//            var rol = $('#i_facturae_contable_rol').val();
//            var continuar = true;
//
//            if(codCli === ""){
//                
//                setTimeout(function(){
//                    
//                  BuscarCentroAdmin(event);
//                  
//                }, 10);
//
//            }
//
//            if(rol === ""){
//                
//                setTimeout(function(){
//                    
//                  BuscarCentroAdmin(event);
//                  
//                }, 10);
//
//            }
//
//            if(continuar === true){
//
//                $.ajax({
//                    url: "buscar_centro_administrativo",
//                    type: 'POST',
//                    data: {"ROL": rol, "CODCLI": codCli},
//                    async: true,
//                    beforeSend: function(xhr){
//
//                        $('#overlay').fadeIn("fast"); 
//
//                    },
//                    success: function(datos){
//                        //Antes de rellenar los campos limpio los campos de la factura anterior.
//
//                        $('#i_facturae_contable_cod').val(centro);
//                        datos = $.trim(datos);
//
//                        obj = JSON.parse(datos);
//
//                        //Cargamos los datos obtenidos
//                        $('#i_facturae_contable_nombre').val(obj.NOMBRE_CENTRO);
//                        $('#i_facturae_contable_via').val(obj.DIRECCION);
//                        $('#i_facturae_contable_numero').val(obj.NUM_DIR);
//                        $('#i_facturae_contable_CP').val(obj.CODIGO_POSTAL);
//                        $('#i_facturae_contable_municipio').val(obj.LOCALIDAD);
//                        $('#i_facturae_contable_prov').val(obj.CODIGO_PROVINCIA);
//
//                        $('#i_facturae_contable_CP').on('input', BuscarLocalidad.bind(null, 'i_facturae_contable_CP'));
//
//                        if(datos !== 'false'){
//                            
//                            $('#codigo_contable').val(3);
//                            
//                        } else {
//                            
//                            $('#codigo_contable').val(-1);
//                            
//                        }
//
//                    },
//                    complete: function(jqXHR, textStatus){
//
//                        $('#overlay').fadeOut();
//
//                    }
//                });
//
//            }
//            
//        } else if(event.target.id === "btn_facturae_gestor" || event.target.id === "btn_facturae_gestor2"){
//        // Modal individual Gestor
//        
//            var centro = $('#i_facturae_gestor').val();
//            var codCli = $('#i_facturae_cod_cliente').val();
//            var rol = $('#i_facturae_gestor_rol').val();
//            var continuar = true;
//
//            if(codCli === ""){
//                
//                setTimeout(function(){
//                    
//                  BuscarCentroAdmin(event);
//                  
//                }, 10);
//
//            }
//
//            if(rol === ""){
//                
//                setTimeout(function(){
//                    
//                  BuscarCentroAdmin(event);
//                  
//                }, 10);
//
//            }
//
//            if(continuar === true){
//
//                $.ajax({
//                    url: "buscar_centro_administrativo",
//                    type: 'POST',
//                    data: {"ROL": rol, "CODCLI": codCli},
//                    async: true,
//                    beforeSend: function(xhr){
//
//                        $('#overlay').fadeIn("fast"); 
//
//                    },
//                    success: function(datos){
//                        //Antes de rellenar los campos limpio los campos de la factura anterior.
//
//                        $('#i_facturae_gestor_cod').val(centro);
//                        datos = $.trim(datos);
//
//                        obj = JSON.parse(datos);
//
//                        //Cargamos los datos obtenidos
//                        $('#i_facturae_gestor_nombre').val(obj.NOMBRE_CENTRO);
//                        $('#i_facturae_gestor_via').val(obj.DIRECCION);
//                        $('#i_facturae_gestor_numero').val(obj.NUM_DIR);
//                        $('#i_facturae_gestor_CP').val(obj.CODIGO_POSTAL);
//                        $('#i_facturae_gestor_municipio').val(obj.LOCALIDAD);
//                        $('#i_facturae_gestor_prov').val(obj.CODIGO_PROVINCIA);
//
//                        $('#i_facturae_gestor_CP').on('input', BuscarLocalidad.bind(null, 'i_facturae_gestor_CP'));
//
//                        if(datos !== 'false'){
//                            
//                            $('#codigo_gestor').val(3);
//                            
//                        } else {
//                            
//                            $('#codigo_gestor').val(-1);
//                            
//                        }
//
//                    },
//                    complete: function(jqXHR, textStatus){
//
//                        $('#overlay').fadeOut();
//
//                    }
//                });
//
//            }
//            
//        } else if(event.target.id === "btn_facturae_proponente" || event.target.id === "btn_facturae_proponente2"){
//        // Modal individual Proponente 
//        
//            var centro = $('#i_facturae_proponente').val();
//            var codCli = $('#i_facturae_cod_cliente').val();
//            var rol = $('#i_facturae_proponente_rol').val();
//            var continuar = true;
//
//            if(codCli === ""){
//                
//                setTimeout(function(){
//                    
//                  BuscarCentroAdmin(event);
//                  
//                }, 10);
//
//            }
//
//            if(rol === ""){
//                
//                setTimeout(function(){
//                    
//                  BuscarCentroAdmin(event);
//                  
//                }, 10);
//
//            }
//
//            if(continuar === true){
//
//                $.ajax({
//                    url: "buscar_centro_administrativo",
//                    type: 'POST',
//                    data: {"ROL": rol, "CODCLI": codCli},
//                    async: true,
//                    beforeSend: function(xhr){
//
//                        $('#overlay').fadeIn("fast"); 
//
//                    },
//                    success: function(datos){
//                        //Antes de rellenar los campos limpio los campos de la factura anterior.
//
//                        $('#i_facturae_proponente_cod').val(centro);
//                        datos = $.trim(datos);
//
//                        obj = JSON.parse(datos);
//
//                        //Cargamos los datos obtenidos
//                        $('#i_facturae_proponente_nombre').val(obj.NOMBRE_CENTRO);
//                        $('#i_facturae_proponente_via').val(obj.DIRECCION);
//                        $('#i_facturae_proponente_numero').val(obj.NUM_DIR);
//                        $('#i_facturae_proponente_CP').val(obj.CODIGO_POSTAL);
//                        $('#i_facturae_proponente_municipio').val(obj.LOCALIDAD);
//                        $('#i_facturae_proponente_prov').val(obj.CODIGO_PROVINCIA);
//
//                        $('#i_facturae_proponente_CP').on('input', BuscarLocalidad.bind(null, 'i_facturae_proponente_CP'));
//
//                        if(datos !== 'false'){
//                            
//                            $('#codigo_proponente').val(3);
//                            
//                        } else {
//                            
//                            $('#codigo_proponente').val(-1);
//                            
//                        }
//
//                    },
//                    complete: function(jqXHR, textStatus){
//
//                        $('#overlay').fadeOut();
//
//                    }
//                });
//
//            }
//            
//        } 
//        
//    }


</script>
<?php
        
$vista = ob_get_clean();
require 'vistas/plantilla.php';   

?>
