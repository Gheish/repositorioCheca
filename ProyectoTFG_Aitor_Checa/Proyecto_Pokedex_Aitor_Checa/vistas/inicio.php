<?php
        
ob_start();
        
?>
<div id="map-container">
    <div id="map">
        <img src="imagenes/kanto.png" alt="Mapa">
    </div>
    <div id="mini-map">
        <img src="imagenes/kanto.png" alt="Mini Mapa">
        <div id="pointer"></div>
    </div>
</div>
<script>
    
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

        var mouseX = (event.pageX / window.innerWidth) * 100;
        var mouseY = (event.pageY / window.innerHeight) * 100;

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
        iconos.style.transform = "translate(" + -imgPosX + "px, " + -imgPosY + "px)";

    });

    //
    
    function getRandomPosition(element){
        
        var mapWidth = map.offsetWidth;
        var mapHeight = map.offsetHeight;
        var elementWidth = element.offsetWidth;
        var elementHeight = element.offsetHeight;

        var xPos = Math.floor(Math.random() * (mapWidth - elementWidth));
        var yPos = Math.floor(Math.random() * (mapHeight - elementHeight));

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
            
            var newImg = document.createElement("img");
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
            
        }
        
    }

    function checkOverlap(element1, element2){
        
        var rect1 = element1.getBoundingClientRect();
        var rect2 = element2.getBoundingClientRect();

        return(rect1.left < rect2.right && rect1.right > rect2.left && rect1.top < rect2.bottom && rect1.bottom > rect2.top);
        
    }

</script>
<?php
        
$vista = ob_get_clean();
require 'vistas/plantilla.php';   

?>
