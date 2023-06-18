<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UsuarioDAO
 *
 * @author Aitor
 */
class UsuarioDAO {
    
    private $conn;
    
    public function __construct($conn){
        
        $conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_BD);

        if(!$conn instanceof mysqli){
                
            return false;

        }
            
        $this -> conn = $conn; 
            
    }
    
    public function insertar(Usuario $u){
        
        $sql = "insert into usuarios(email, contras, nombre, fecha) "
            . "values (?, ?, ?, ?)";
        
        if(!$stmt = $this -> conn -> prepare($sql)){
                
            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
                
        }
        
        $email = $u -> getEmail();
        $contras = $u -> getContras();
        $nombre = $u-> getNombre();
        $fecha = $u-> getFecha();
    
        
        $stmt -> bind_param('ssss', $email, $contras, $nombre, $fecha);
        $stmt -> execute();
            
    }
    
    public function obtenerPorEmail($email) {
        
        $sql = "select * "
            . "from usuarios "
            . "where email = ?";
        
        if(!$stmt = $this -> conn -> prepare($sql)){
                
            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
                
        }
        
        $stmt -> bind_param('s', $email);
        $stmt -> execute();
        
        $result = $stmt -> get_result();       
        $usuario = $result -> fetch_object('Usuario');
        
        return $usuario;
    
    }
    
       public function obtenerPorId($id) {
        
        $sql = "select * "
            . "from usuarios "
            . "where idusu = ?";
        
        if(!$stmt = $this -> conn -> prepare($sql)){
                
            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
                
        }
        
        $stmt -> bind_param('i', $id);
        $stmt -> execute();
        
        $result = $stmt -> get_result();        
        $usuario = $result -> fetch_object('Usuario');
        
        return $usuario;
    
    }
    
}
