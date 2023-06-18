<?php
        
ob_start();

?>
<div id="infrabody">
    <div id="map-container">
        <div id="map">
            <img src="imagenes/kanto.png" alt="Mapa">
        </div>
        <div id="mini-map">
            <img src="imagenes/kanto.png" alt="Mini Mapa">
            <div id="pointer"></div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalAdivinar" tabindex="10" role="document" aria-labelledby="myModalLabel" data-backdrop="static">
    <div class="modal-dialog" id="modalGrande" role="document">
        <div class="modal-document" style="width: 45vw">
            <div class="modal-content" style="border: 5px solid lightblue">
                <form action="index.php?action=login" method="post">
                    <div class="modal-body" style="background-image: url('imagenes/adivinar.png'); background-size: cover;">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-body">    
                                    <div id="fotoAdivinar" class="col-lg-4"></div>
                                    <div class="col-lg-6">
                                        <h5 class="modal-title" id="exampleModalLabel">Cuál es este pokémon?</h5>
                                        <div class="form-group">
                                            <input type="text" name="nombre" id="campoNombre" class="campoent" autocomplete="off">
                                        </div>
                                        <button type="button" class="boton2" id="adivinar">Adivinar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalAlerta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-image: url('imagenes/fondo pokemon2.png'); background-size: cover;">
                <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
            </div>
            <div class="modal-body" style="background-image: url('imagenes/fondo pokemon2.png'); background-size: cover;">
                <strong><span id="msj_alerta"></span></strong>
            </div>
            <div class="modal-footer" style="background-image: url('imagenes/fondo pokemon2.png'); background-size: cover;">
                <button class="btn btn-primary boton2" type="button" data-dismiss="modal" id="cerrarAlerta">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade acierto" id="ModalAcierto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body"  style="background-image: url('imagenes/adivinado.jpg'); background-size: cover;">
                <strong><span id="msj_acierto" class="col-lg-12"></span></strong>
                <div id="fotoAcierto" class="col-lg-12"></div>
                <button class="btn btn-primary boton2 col-lg-12" type="button" data-dismiss="modal" id="cerrarAceptar">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<script>
    
    $(document).ready(function(){
        
        var pokemonID = "";
        var nombreImagen = "";
        
        $(document).on('click', '.monstruitos', function(){
            
            if(!(email !== 'undefined' && email !== null)){
                
                $('#msj_alerta').html('Debes iniciar sesión para ello.');
                $("#ModalAlerta").modal("show");
                
            } else {
                
                $('#modalAdivinar').modal('show');
            
                pokemonID = event.target.id;
                var imagen = event.target.src; 
                var inicio = imagen.lastIndexOf("/") + 1; // Busca la última aparición de "/" en la URL y obtiene su posición más 1
                nombreImagen = imagen.substr(inicio); // Obtiene el substring a partir de la posición obtenida

                $("#fotoAdivinar").html("<img src='imagenes/iconos/" + nombreImagen + "' alt='FotoAdivinar' class='fotoCarrusel'>");
                
            }
            
        });
        
        var boton = $('#adivinar');

        boton.on('click', function(){

            buscanombre(pokemonID, nombreImagen);

        });
        
    });
    
    var newImg; 
    var map = document.getElementById("map");
    var mapImg = map.querySelector("img");
    var mapWidth = map.offsetWidth;
    var mapHeight = map.offsetHeight;
    var imgWidth = mapImg.offsetWidth;
    var imgHeight = mapImg.offsetHeight;
    var miniMap = document.getElementById("mini-map");
    var pointer = document.getElementById("pointer");
    var iconos = document.getElementsByClassName("monstruitos");
    
    map.addEventListener("mousemove", function(event){

        var mouseX = (event.pageX / window.innerWidth) * 90;
        var mouseY = (event.pageY / window.innerHeight) * 92;

        var pointerPosX = (mouseX / 100) * miniMap.offsetWidth;
        var pointerPosY = (mouseY / 100) * miniMap.offsetHeight;

        pointer.style.left = pointerPosX + "px";
        pointer.style.top = pointerPosY + "px";

    });

    map.addEventListener("mousemove", function(event){

        var mouseX = event.pageX - map.offsetLeft;
        var mouseY = event.pageY - map.offsetTop;

        var percentX = (mouseX / mapWidth) * 90;
        var percentY = (mouseY / mapHeight) * 80;

        var imgPosX = (percentX * (imgWidth - mapWidth)) / 100;
        var imgPosY = (percentY * (imgHeight - mapHeight)) / 100;

        mapImg.style.transform = "translate(" + -imgPosX + "px, " + -imgPosY + "px)";

    });

    map.addEventListener("mousemove", function(event){

        var mouseX = event.pageX - map.offsetLeft;
        var mouseY = event.pageY - map.offsetTop;

        var percentX = (mouseX / mapWidth) * 90;
        var percentY = (mouseY / mapHeight) * 80;

        var imgPosX = (percentX * (imgWidth - mapWidth)) / 100;
        var imgPosY = (percentY * (imgHeight - mapHeight)) / 100;
        
        for(var i = 0; i < iconos.length; i++){
            
            var monstruito = iconos[i];

            // Aplicar la misma transformación que a newImg
            monstruito.style.transform = "translate(" + -imgPosX + "px, " + -imgPosY + "px)";
            
        }

    });

    //
    
    function getRandomPosition(element){
        
        var mapWidth = mapImg.offsetWidth;
        var mapHeight = mapImg.offsetHeight;
        var elementWidth = element.offsetWidth;
        var elementHeight = element.offsetHeight;

        var minTop = 0.2 * mapHeight;  // 5vh from the top
        var maxTop = 0.9 * mapHeight;  // 17vh from the top
        var yPos = Math.floor(Math.random() * (maxTop - minTop)) + minTop;

    var minLeft = 0.1 * mapWidth;  // 5vw from the left
    var maxLeft = 0.9 * mapWidth - elementWidth;  // 5vw from the right
    var xPos = Math.floor(Math.random() * (maxLeft - minLeft)) + minLeft;

        return [xPos, yPos];
        
    }

    var mapContainer = document.getElementById("map-container");
    var imgCount; // Variable para almacenar el número total de imágenes

    // Realizar solicitud AJAX para obtener la lista de archivos en el directorio
    $.ajax({
        
        url: "imagenes/iconos",
        success: function(data){

            // Filtrar la lista de archivos para obtener solo las imágenes
            var imageFiles = $(data).find("a[href$='.png'], a[href$='.jpg'], a[href$='.jpeg']");

            // Obtener el número total de imágenes
            imgCount = imageFiles.length;

            // Llamar a la función para agregar las imágenes al mapa
            addImagesToMap();

        }
      
    });

    function addImagesToMap(){
        
        var count = 0;

        while (count < imgCount){
            
            newImg = document.createElement("img");
            newImg.src = "imagenes/iconos/" + (count + 1) + ".png";
            newImg.style.position = "absolute";
            newImg.id = count + 1;
            newImg.classList.add("monstruitos");

            var randomPos = getRandomPosition(newImg);
            newImg.style.left = randomPos[0] + "px";
            newImg.style.top = randomPos[1] + "px";

            var overlap = false;
            
            for(var i = 0; i < mapContainer.children.length; i++){
                
                var existingImg = mapContainer.children[i];

                if(checkOverlap(newImg, existingImg)){

                    overlap = true;
                    break;

                }
              
            }

            if(!overlap){
                
                mapContainer.appendChild(newImg);
                count++;
              
            }
        
        $('#msj_alerta').html('Han aparecido ' + iconos.length + ' Pokémon en el mapa. Atrápalos a todos!');
        $("#ModalAlerta").modal("show");
            
        }
        
    }

    function checkOverlap(element1, element2){
        
        var rect1 = element1.getBoundingClientRect();
        var rect2 = element2.getBoundingClientRect();

        return(rect1.left < rect2.right && rect1.right > rect2.left && rect1.top < rect2.bottom && rect1.bottom > rect2.top);
        
    }
    
    function buscanombre(PokemonID, nombreImagen){
        
        var respuesta = $('#campoNombre').val();
        
        var continuar = true;
        
        if(respuesta === ""){
            
            continuar = false;
            
        }
        
        if(continuar === true){

            $.ajax({
                url: "index.php?action=adivinaNombre",
                type: 'POST',
                data: {"ID": PokemonID},
                beforeSend: function(xhr){

                    $('#overlay').fadeIn("fast"); 

                },
                success: function(datos){
                    
                    datos = JSON.parse(datos);
   
                    if(datos.nombre === respuesta){
                    
                        $('#msj_acierto').html('Es ' + respuesta + '!');
                        $("#fotoAcierto").html("<img src='imagenes/iconos/" + nombreImagen + "' alt='FotoAcierto' class='fotoCarrusel'>");
                        $("#ModalAcierto").modal("show");
                        $("#modalAdivinar").modal("hide");
                        $('#campoNombre').val("")
                        
                        ponerLista(PokemonID);
                        
                    } else {

                        AniadirAlerta('campoNombre');
                        
                    }

                },
                complete: function(jqXHR, textStatus){

                    $('#overlay').fadeOut();

                }
            });

        } else {

            $('#msj_alerta').html('Debes introducir un nombre.');
            $("#ModalAlerta").modal("show");

        }
        
    }
    
    function AniadirAlerta(campo){
        
        $('#' + campo).addClass('is-invalid');
        
    }
    
    function QuitarAlerta(campo){
        
        $('#' + campo).removeClass('is-invalid');
        
    }
    
    function ponerLista(PokemonID){
    
        $.ajax({
            url: 'index.php?action=guardarAtributo',
            type: 'POST',
            data: {"PokemonID": PokemonID},
            async: true,
            success: function(response){
                
//                console.log(response);
                
              // Si la respuesta del servidor es exitosa, puedes redirigir a la otra página aquí.
//              window.location.href = 'index.php?action=listaPokemon';
              
            }
        });
    
    }

</script>
<?php
        
$vista = ob_get_clean();
require 'vistas/plantilla.php';   

?>
