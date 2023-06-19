<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UsuariosControlador
 *
 * @author Aitor
 */
class UsuariosControlador {
    
    function registro(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $usuario = new Usuario();
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $pass = filter_var($_POST['contras'], FILTER_SANITIZE_STRING);
            $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $fecha = filter_var($_POST['fechaNac'], FILTER_SANITIZE_STRING);
            
            $usuarioDAO = new UsuarioDAO(Conexion::conectar());

            if($usuarioDAO -> obtenerPorEmail($email)){

                MensajeFlash::guardarMensaje("Email repetido");
                
                header("Location: index.php?action=registro");
                die();

            } else {

                $passCodific = password_hash($pass, PASSWORD_BCRYPT);

                $usuario -> setEmail($email);
                $usuario -> setContras($passCodific);
                $usuario -> setNombre($nombre);
                $usuario -> setFecha($fecha);

                $usuarioDAO -> insertar($usuario);

                header("Location: index.php");
                die();

            }

        } else {

            require 'vistas/registro.php';

        }
        
    }
    
    function login(){
        
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $pass = filter_var($_POST['contras'], FILTER_SANITIZE_STRING);
        $usuarioDAO = new UsuarioDAO(Conexion::conectar());
        $usuario = $usuarioDAO -> obtenerPorEmail($email);

        if(!$usuario){

            header("Location: index.php");
            die();

        }

        if(!password_verify($pass, $usuario -> getContras())){

            header("Location: index.php");
            die();

        }

        $_SESSION['email'] = $email;
        $_SESSION['contras'] = $pass;
        setcookie("email", $email, time() + 20 * 24 * 60 * 60);
        header("Location: index.php");
        die();
        
    }
    
    function logout(){
        
        session_destroy();
        setcookie("email", "", time()-5);
        
        header("Location: index.php");
        die();
        
    }
    
//    function cambiaFoto(){
//        
//        $nombreFoto = md5(rand());
//        $nombreOriginal = $_FILES['foto']['name'];
//        $extension = substr($nombreOriginal, strrpos($nombreOriginal, ".")+1);
//        $nuevoNombre = $nombreFoto.$extension;
//
//        while(file_exists('imagenes/'.$nuevoNombre)){
//
//            $nombreFoto = md5(rand());
//            $nuevoNombre = $nombreFoto.$extension;
//
//        }
//
//        move_uploaded_file($_FILES['foto']['tmp_name'], 'imagenes/'.$nuevoNombre);
//
//        $usuarioDAO = new UsuarioDAO(Conexion::conectar());
//        $usuarioDAO -> insertar($usuario);
//
//        header('Location: index.php');
//        die();
//        
//    }
    
    function comprobarEmail(){

        header("Content-type: spplicatios/json; charset=utf-8");
        
        if(!isset($_POST['email'])){
            
            print json_encode(["error" => "falta parámetro email"]);
            die();
            
        }
        
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $usuarioDAO = new UsuarioDAO(Conexion::conectar());

        if($usuarioDAO -> obtenerPorEmail($email) == false){

            print json_encode(["repetido" => true]);

        } else {

            print json_encode(["repetido" => false]);

        }
        
    }
    
    function sobreMi(){
        
        
        header("Location: vistas/sobreMi.php");
        die();
        
    }
    
}
