<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

/**
 * Description of FotoDAO
 *
 * @author Aitor
 */
class FotoDAO {
    
    private $conn;
    
    public function __construct($conn){
        
        $conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_BD);

        if(!$conn instanceof mysqli){
                
            return false;

        }
            
        $this -> conn = $conn; 
            
    }
    
    public function insertar(Foto $f){
        
        $sql = "insert into fotos (direccion, numPokemon, principal) "
            . "values (?, ?, ?)";
        
        if(!$stmt = $this -> conn -> prepare($sql)){
                
            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
                
        }
        
        $direccion = $f -> getDireccion();
        $numPoke = $f -> getNumPoke();
        $principal = $f -> getPrincipal();
        
        $stmt -> bind_param('sii', $direccion, $numPoke, $principal);
        $stmt -> execute();
            
    }
    
    public function obtenerPorPokemon($numPoke) {
        
        $sql = "select * "
            . "from fotos "
            . "where numPokemon = " . $numPoke;
        
        if(!$result = $this -> conn -> query($sql)){
                
            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
                
        }
       
        $fotos = array();
        
        while($foto = $result -> fetch_object('Foto')){
            
            $fotos[] = $foto;
            
        }
        
        return $fotos;
        
    }
    
    public function obtenerFotosResto($numPoke){
        
        $con = $this -> conn;
        
        $sql = "select * "
            . "from fotos "
            . "where numPokemon = " . $numPoke . " "
            . "and principal = 0";
        
        $consulta = mysqli_query($con, $sql);
        $fotos = array(); 
        
        while($result = mysqli_fetch_assoc($consulta)){
            array_push($fotos, $result['direccion']);
            
        }
        
        if(!empty($fotos)){
            
            return json_encode($fotos);
        
        } else {
            
            return 'false';
            
        }
        
    }
    
    public function obtenerPrincipal($numPoke) {
        
        $sql = "select * "
            . "from fotos "
            . "where numPokemon = ? "
            . "and principal = 1";
        
    if(!$stmt = $this -> conn -> prepare($sql)){
                
            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
                
        }
        
        $stmt -> bind_param('i', $numPoke);
        $stmt -> execute();
        
        $result = $stmt -> get_result();
        
        $foto = $result -> fetch_object('Foto');
        
        return $foto;
        
    }
    
//    public function borrar(Foto $f){
//        
//        $sql = "delete from fotos "
//            . "where idfoto = ?";
//        
//        if(!$stmt = $this -> conn -> prepare($sql)){
//                
//            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
//                
//        }
//        
//        $id = $f ->getIdfoto();
//        
//        $stmt -> bind_param('i', $id);
//        $stmt -> execute();
//            
//    }
    
}

