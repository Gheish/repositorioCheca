<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

class PokemonDAO {
    
    private $conn;
    
    public function __construct($conn){
        
        $conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_BD);

        if(!$conn instanceof mysqli){
                
            return false;

        }
            
        $this -> conn = $conn; 
            
    }
    
    public function insertar(Pokemon $a){
        
        $sql = "insert into pokemon (nombre, descripcion, categoria, tipoPrimario, tipoSecundario, habilidad, habilidadOculta, peso, altura, color, generacion, huella, grito) "
            . "values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        if(!$stmt = $this -> conn -> prepare($sql)){
                
            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
                
        }
        
        $nombre = $a -> getNombre();
        $descripcion = $a -> getDescripcion();
        $categoria = $a -> getCategoria();
        $tipoP = $a -> getTipoP();
        $tipoS = $a -> getTipoS();
        $habilidad = $a -> getHabilidad();
        $habilidadO = $a -> getHabilidadO();
        $peso = $a -> getPeso();
        $altura = $a -> getAltura();
        $color = $a -> getColor();
        $generacion = $a -> getGeneracion();
        $huella = $a -> getHuella();
        $grito = $a -> getGrito();
        
        $stmt -> bind_param('sssiissddssss', $nombre, $descripcion, $categoria, $tipoP, $tipoS, $habilidad, $habilidadO, $peso, $altura, $color, $generacion, $huella, $grito);
        $stmt -> execute();
        
        return $stmt -> insert_id;
            
    }
    
    public function obtener(int $numPoke){
        
        $sql = "select * "
            . "from pokemon "
            . "where numPokedex = ?";
        
        if(!$stmt = $this -> conn -> prepare($sql)){
                
            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
                
        }
        
        $stmt -> bind_param('i', $numPoke);
        $stmt -> execute();
        
        $result = $stmt -> get_result();
        
        print_r($result -> fetch_object('Pokemon'));
        
        return $result -> fetch_object('Pokemon');
            
    }
    
//    public function borrar(Pokemon $a){
//        
//        $sql = "delete from pokemon "
//            . "where numPokedex = ?";
//        
//        if(!$stmt = $this -> conn -> prepare($sql)){
//                
//            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
//                
//        }
//        
//        $numPoke = $a -> getNumPoke();
//        
//        $stmt -> bind_param('i', $numPoke);
//        $stmt -> execute();
//            
//    }
    
    public function actualizar(Pokemon $a){
        
        $sql = "update pokemon "
            . "set nombre = ?, descripcion = ?, categoria = ?, tipoPrimario = ?, tipoSecundario = ?, habilidad = ?, habilidadOculta = ?, peso = ?, altura = ?, color = ?, generacion = ?, huella = ?, grito = ? "
            . "where numPokedex = ?";
        
        if(!$stmt = $this -> conn -> prepare($sql)){
                
            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
                
        }
        
        $numPoke = $a -> getNumPoke();
        $nombre = $a -> getNombre();
        $descripcion = $a -> getDescripcion();
        $categoria = $a -> getCategoria();
        $tipoP = $a -> getTipoP();
        $tipoS = $a -> getTipoS();
        $habilidad = $a -> getHabilidad();
        $habilidadO = $a -> getHabilidadO();
        $peso = $a -> getPeso();
        $altura = $a -> getAltura();
        $color = $a -> getColor();
        $generacion = $a -> getGeneracion();
        $huella = $a -> getHuella();
        $grito = $a -> getGrito();
        
        $stmt -> bind_param('sssiissddssssi', $nombre, $descripcion, $categoria, $tipoP, $tipoS, $habilidad, $habilidadO, $peso, $altura, $color, $generacion, $huella, $grito, $numPoke);
        $stmt -> execute();
            
    }
    
    public function obtenerTodos(){
        
        $sql = "select * "
            . "from pokemon ";
        
        if(!$result = $this -> conn -> query($sql)){
                
            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
                
        }
        
        $pocketMons = array();
        
        while($pokemon = $result -> fetch_object('Pokemon')){
            
            $pocketMons[] = $pokemon;
            
        }
        
        return $pocketMons;
            
    }
    
    public function obtenerPaginado(int $pagina){
        
        $sql = "select * "
            . "from pokemon "
            . "limit " . $pagina*5 . ",5 ";
        
        if(!$result = $this -> conn -> query($sql)){
                
            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
                
        }
        
        $pocketMons = array();
        
        while($pokemon = $result -> fetch_object('Pokemon')){
            
            $pocketMons[] = $pokemon;
            
        }
        
        return $pocketMons;
            
    }
    
    public function obtenerLimite() {
        
        $sql = "select * "
            . "from pokemon "
            . "limit 1";
            
        if(!$result = $this -> conn -> query($sql)){
                
            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
                
        }
        
        $limite = $result -> fetch_object('Pokemon');
        return $limite;
        
    }
    
//    public function obtenerPaginadoMisPokemon(int $pagina, int $idusu){
//        
//        $sql = "select * "
//            . "from pokemon "
//            . "where idusuario = " . $idusu . " "
//            . "limit " . $pagina*5 . ",5 ";
//        
//        if(!$result = $this -> conn -> query($sql)){
//                
//            die("Error al ejecutar la sentencia: " . $this -> conn -> error);
//                
//        }
//        
//        $pocketMons = array();
//        
//        while($pokemon = $result -> fetch_object('Pokemon')){
//            
//            $pocketMons[] = $pokemon;
//            
//        }
//        
//        return $pocketMons;
//            
//    }
    
}
