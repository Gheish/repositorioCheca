<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoDAO
 *
 * @author Gheish
 */
class TipoDAO {
    
    private $conn;
    
    public function __construct($conn){
        
        $conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_BD);

        if(!$conn instanceof mysqli){
                
            return false;

        }
            
        $this -> conn = $conn; 
            
    }
    
    public function insertar(Tipo $t){
        
        $sql = "insert into tipo (nombre, foto) "
            . "values (?, ?)";
        
        if(!$stmt = $this -> conn -> prepare($sql)){
                
                die("Error al ejecutar la sentencia: " . $this -> conn -> error);
                
        }
        
        $nombre = $t -> getNombre();
        $foto = $t -> getFoto();
        
        $stmt -> bind_param('ss', $nombre, $foto);
        $stmt -> execute();
            
    }
    
    public function obtener() {
        
        $sql = "select * "
            . "from tipo";
        
        if(!$result = $this -> conn -> query($sql)){
                
            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
                
        }
       
        $tipos = array();
        
        while($tipo = $result -> fetch_object('Tipo')){
            
            $tipos[] = $tipo;
            
        }
        
        return $tipos;
        
    }
    
    public function obtenerEspecifico($tipo) {
        
        $sql = "select foto "
            . "from tipo "
            . "where id = '$tipo'";
        
        if(!$stmt = $this -> conn -> prepare($sql)){
                
            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
                
        }
        
        $stmt -> execute();
        $result = $stmt -> get_result();
        $tipoCorrecto = $result -> fetch_object('Tipo');
        
        return $tipoCorrecto;
        
    }
    
}
