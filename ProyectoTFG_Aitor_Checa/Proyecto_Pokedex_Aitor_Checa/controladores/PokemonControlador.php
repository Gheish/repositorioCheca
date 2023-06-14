<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of MensajesControlador
 *
 * @author Alumno
 */
class PokemonControlador {
    
     function insertar(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $pokemon = new Pokemon();
            $pokemonDAO = new PokemonDAO(Conexion::conectar());
            $usuario = new Usuario();
            $usuarioDAO = new UsuarioDAO(Conexion::conectar());
            $foto = new Foto();
            $fotoDAO = new FotoDAO(Conexion::conectar());
            $tipo = new Tipo();
            $tipoDAO = new TipoDAO(Conexion::conectar());
            $email = $_SESSION['email'];
            $usuario = $usuarioDAO -> obtenerPorEmail($email);
            
            $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
            $categoria = filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);
            $tipoP = filter_var($_POST['tipoP'], FILTER_SANITIZE_NUMBER_INT);
            $tipoS = filter_var($_POST['tipoS'], FILTER_SANITIZE_NUMBER_INT);
            $habilidad = filter_var($_POST['habilidad'], FILTER_SANITIZE_STRING);
            $habilidadO = filter_var($_POST['habilidadO'], FILTER_SANITIZE_STRING);
            $peso = filter_var($_POST['peso'], FILTER_SANITIZE_STRING);
            $altura = filter_var($_POST['altura'], FILTER_SANITIZE_STRING);
            $color = filter_var($_POST['color'], FILTER_SANITIZE_STRING);
            $generacion = filter_var($_POST['generacion'], FILTER_SANITIZE_STRING);
            $huella = filter_var($_POST['huella'], FILTER_SANITIZE_STRING);
            $grito = filter_var($_POST['grito'], FILTER_SANITIZE_STRING);
            
            $error = false;
            
            if($_FILES['foto']['type'] != 'image/jpeg' && $_FILES['foto']['type'] != 'image/gif' && $_FILES['foto']['type'] != 'image/png' && $_FILES['foto']['type'] != 'image/webp'){

                MensajeFlash::guardarMensaje("El archivo no es una imagen");
                $error = true;
                
            }

            //Compruebo el tamaño del archivo
            if($_FILES['foto']['size'] > 10048576){
                
                MensajeFlash::guardarMensaje("El archivo no puede ser superior a 10MB");
                $error = true;
                
            }
            
            if(!$error){
               //Generamos un nombre aleatorio para la foto
               $nuevoNombre = md5(rand());
               //Cogemos la extensión
               $nombreOriginal = $_FILES['foto']['name'];
               $extension = substr($nombreOriginal, strrpos($nombreOriginal, '.'));
               $nuevoNombreCompleto = $nuevoNombre . $extension;

               //y en ese caso volvemos a generar un nombre
               while(file_exists('imagenes/' . $nuevoNombreCompleto)){
                   
                   $nuevoNombre = md5(rand());
                   $nuevoNombreCompleto = $nuevoNombre . $extension;
                   
               }

               //Movemomoves la foto a la carpeta donde los queramos guardar
               move_uploaded_file($_FILES['foto']['tmp_name'], 'imagenes/' . $nuevoNombreCompleto);
               
               $pokemon -> setNombre($nombre);
               $pokemon -> setDescripcion($descripcion);
               $pokemon -> setCategoria($categoria);
               $pokemon -> setTipoP($tipoP);
               $pokemon -> setTipoS($tipoS);
               $pokemon -> setHabilidad($habilidad);
               $pokemon -> setHabilidadO($habilidadO);
               $pokemon -> setPeso($peso);
               $pokemon -> setAltura($altura);
               $pokemon -> setColor($color);
               $pokemon -> setGeneracion($generacion);
               $pokemon -> setHuella($huella);
               $pokemon -> setGrito($grito);
               $pokemonDAO -> insertar($pokemon);
               $pokemon = $pokemonDAO -> obtenerLimite();
               $foto -> setPrincipal(1);
               $foto -> setNumPoke($pokemon -> getNumPoke());
               $foto -> setDireccion($nuevoNombreCompleto);
               $fotoDAO -> insertar($foto);

               header("Location: index.php");
               
            }
            
        } else {
            
            require 'vistas/insertar_pokemon.php';
            
        }
        
    }

    function inicio(){
          
        require 'vistas/inicio.php';
        
    }

    function listaPokemon(){
        
        $conn = Conexion::conectar();    
        $pokemonDAO = new PokemonDAO($conn);
        
        if(!isset($_GET['pagina'])){
            
            $pagina = 0;
            
        } else {
            
            $pagina = filter_var($_GET['pagina'], FILTER_SANITIZE_NUMBER_INT);
        
        }
        
        $pokemon = $pokemonDAO ->obtenerPaginado($pagina);
        $fotodao = new FotoDAO($conn);
        $tipodao = new TipoDAO($conn);
          
        require 'vistas/listaPokemon.php';
        
    }
    
    function pokemonSeleccionado(){
        
        $conn = Conexion::conectar();   
        
        $pokemonDAO = new PokemonDAO($conn);
        $numPoke = filter_var($_POST['ID'], FILTER_SANITIZE_NUMBER_INT);        
        $pokemon = $pokemonDAO -> obtener($numPoke);
        
//        $fotodao = new FotoDAO($conn);
//        $fotos = $fotodao -> obtenerFotosResto($numPoke);
        
    }
    
//    function borrarPokemon(){
//        
//        $conn = Conexion::conectar();    
//        $pokemonDAO = new PokemonDAO($conn);
//        $numPoke = filter_var($_GET['numPoke'], FILTER_SANITIZE_NUMBER_INT);
//        $pokemon = $pokemonDAO -> obtener($numPoke);
//        $fotodao = new FotoDAO($conn);
//        $fotos = $fotodao -> obtenerPorPokemon($numPoke);
//        
//        foreach($fotos as $f){
//            
//            $fotodao -> borrar($f);
//            
//        }
//        
//        $pokemonDAO -> borrar($pokemon);
//        
//        header("Location: index.php");
//        die();
//        
//    }
    
    function modificarPokemon(){
        
        $numPoke = filter_var($_GET['numPoke'], FILTER_SANITIZE_NUMBER_INT);
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $pokemonDAO = new PokemonDAO(Conexion::conectar());
            $foto = new Foto();
            $fotoDAO = new FotoDAO(Conexion::conectar());
            
            $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
            $categoria = filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);
            $tipoP = filter_var($_POST['tipoP'], FILTER_SANITIZE_NUMBER_INT);
            $tipoS = filter_var($_POST['tipoS'], FILTER_SANITIZE_NUMBER_INT);
            $habilidad = filter_var($_POST['habilidad'], FILTER_SANITIZE_STRING);
            $habilidadO = filter_var($_POST['habilidadO'], FILTER_SANITIZE_STRING);
            $peso = filter_var($_POST['peso'], FILTER_SANITIZE_STRING);
            $altura = filter_var($_POST['altura'], FILTER_SANITIZE_STRING);
            $color = filter_var($_POST['color'], FILTER_SANITIZE_STRING);
            $generacion = filter_var($_POST['generacion'], FILTER_SANITIZE_STRING);
            $huella = filter_var($_POST['huella'], FILTER_SANITIZE_STRING);
            $grito = filter_var($_POST['grito'], FILTER_SANITIZE_STRING);
            
            if($_FILES['foto']['type'] != 'image/jpeg' && $_FILES['foto']['type'] != 'image/gif' && $_FILES['foto']['type'] != 'image/png' && $_FILES['foto']['type'] != 'image/webp'){

                MensajeFlash::guardarMensaje("El archivo no es una imagen");
                $error = true;
                
            }

            //Compruebo el tamaño del archivo
            if($_FILES['foto']['size'] > 10048576){
                
                MensajeFlash::guardarMensaje("El archivo no puede ser superior a 10MB");
                $error = true;
                
            }
            
            if(!$error){
                
                $pokemon = $pokemonDAO -> obtener($numPoke);
                $pokemon -> setNombre($nombre);
                $pokemon -> setDescripcion($descripcion);
                $pokemon -> setCategoria($categoria);
                $pokemon -> setTipoP($tipoP);
                $pokemon -> setTipoS($tipoS);
                $pokemon -> setHabilidad($habilidad);
                $pokemon -> setHabilidadO($habilidadO);
                $pokemon -> setPeso($peso);
                $pokemon -> setAltura($altura);
                $pokemon -> setColor($color);
                $pokemon -> setGeneracion($generacion);
                $pokemon -> setHuella($huella);
                $pokemon -> setGrito($grito);
                $pokemonDAO -> actualizar($pokemon);
              
                header("Location: index.php");
            
            }
             
        } else {
            
            require 'vistas/modificarPokemon.php';
            
        }
    }
    
    function insertarfoto(){
        
        $numPoke = filter_var($_GET['numPoke'], FILTER_SANITIZE_NUMBER_INT);
      
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            if (isset($_FILES['foto']['error'][0])){
                
                if ($_FILES['foto']['error'][0] == UPLOAD_ERR_OK){
                    
                    foreach($_FILES['foto']['type'] as $key => $error){
                        
                        if($error == UPLOAD_ERR_OK){
                            
                            $tipo = $_FILES['foto']['type'][$key];
                            $tamano = $_FILES['foto']['size'][$key];
                            
                            if ($_FILES['foto']['type'][$key] != 'image/jpeg' && $_FILES['foto']['type'][$key] != 'image/gif' && $_FILES['foto']['type'][$key] != 'image/png' && $_FILES['foto']['type'][$key] != 'image/webp') {
                                
                                MensajeFlash::guardarMensaje("Uno de los archivos no es una imagen");
                                $error = true;
                                die();
                                
                            }
                            
                            if($tamano > 10048576){
                                
                                MensajeFlash::guardarMensaje("Uno de los archivos tiene más de 10 MB y no se puede subir");
                                die();

                            }

                        }

                    }
                    
                    $fotoDAO = new FotoDAO(Conexion::conectar());
                    $nombres = $_FILES['foto']['name'];
                    $num_elementos = count($nombres);
                    
                    for($i = 0; $i<$num_elementos; $i++){
                        
                        $foto = new Foto;
                        $nombreArchivo = md5(rand());
                        $nombreOriginal = $_FILES['foto']['name'][$i];
                        $extension = substr($nombreOriginal, strrpos($nombreOriginal, '.'));
                        $nuevoNombre = $nombreArchivo . $extension;
                        
                        while(file_exists('imagenes/' . $nuevoNombre)){
                            
                            $nombreArchivo = md5(rand());
                            $nuevoNombre = $nombreArchivo . $extension;

                        }
                        
                        move_uploaded_file($_FILES['foto']['tmp_name'][$i], 'imagenes/' . $nuevoNombre);
                        $nombreFoto = $_FILES['foto']['name'][$i];
                        $foto -> setDireccion($nuevoNombre);
                        $foto -> setNumPoke($numPoke);
                        $foto -> setPrincipal(false);
                        $fotoDAO -> insertar($foto);

                    }
                    
                    header("Location: index.php");
                    die();

                } else {
                    
                    MensajeFlash::guardarMensaje("Debes subir una foto como mínimo");

                }

            }
 
        } else {
            
            require 'vistas/insertarFoto.php';
            
        }
        
    }
    
}