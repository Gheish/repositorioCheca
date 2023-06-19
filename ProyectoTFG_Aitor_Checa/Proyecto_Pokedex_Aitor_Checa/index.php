<?php
       session_start();
       require_once './MensajeFlash.php';
       require_once './config.php';
       require_once 'modelo/Conexion.php';
       require_once 'modelo/Pokemon.php';
       require_once 'modelo/PokemonDAO.php';
       require_once 'modelo/Foto.php';
       require_once 'modelo/FotoDAO.php';
       require_once 'modelo/Tipo.php';
       require_once 'modelo/TipoDAO.php';
       require_once 'modelo/Usuario.php';
       require_once 'modelo/UsuarioDAO.php';
       require_once 'controladores/PokemonControlador.php';
       require_once 'controladores/UsuariosControlador.php';
       
$map = array("login" => array("controller" => "UsuariosControlador", "method" => "login", "publica" => true),
    "logout" => array("controller" => "UsuariosControlador", "method" => "logout", "publica" => false),
    "registro" => array("controller" => "UsuariosControlador", "method" => "registro", "publica" => true),
    "comprobarEmail" => array("controller" => "UsuariosControlador", "method" => "comprobarEmail", "publica" => true),
    "sobreMi" => array("controller" => "UsuariosControlador", "method" => "sobreMi", "publica" => true),
    
    /*Inicio Controlador Pokemon*/
//    "insertarPokemon" => array("controller" => "PokemonControlador", "method" => "insertar", "publica" => false),
//    "borrarPokemon" => array("controller" => "PokemonControlador", "method" => "borrarPokemon", "publica" => false),
//    "misPokemon" => array("controller" => "PokemonControlador", "method" => "misPokemon", "publica" => false),
//    "modificarPokemon" => array("controller" => "PokemonControlador", "method" => "modificarPokemon", "publica" => false),
//    "BorrarFoto" => array("controller" => "PokemonControlador", "method" => "modificarMsg", "publica" => false),
//    "insertarFoto" => array("controller" => "PokemonControlador", "method" => "insertarFoto", "publica" => false),
    "inicio" => array("controller" => "PokemonControlador", "method" => "inicio", "publica" => true),
    "listaPokemon" => array("controller" => "PokemonControlador", "method" => "listaPokemon", "publica" => false),
    "pokemonSeleccionado" => array("controller" => "PokemonControlador", "method" => "pokemonSeleccionado", "publica" => false),
    "adivinaNombre" => array("controller" => "PokemonControlador", "method" => "adivinaNombre", "publica" => false),
    "fotosSeleccionadas" => array("controller" => "PokemonControlador", "method" => "fotosSeleccionadas", "publica" => false),
    "guardarAtributo" => array("controller" => "PokemonControlador", "method" => "guardarAtributo", "publica" => false));
    /*Fin Controlador Pokemon*/

//parseo de ruta

if(!isset($_GET['action'])){
    
    $ruta = 'inicio';
    
} else {

    if(!isset($map[$_GET['action']])){
    
        print "La acción que has elegido no existe.";
        
        header('Status: 404 Not Found');
        die();

    } else {

        $ruta = filter_var($_GET['action'], FILTER_SANITIZE_SPECIAL_CHARS);

    }
    
}

if(!$map[$ruta]["publica"] && !isset($_SESSION['email'])){
    
    MensajeFlash::guardarMensaje("Debes identificarte para ello.");
    
    header("Location: index.php");
    die();
    
}

if (!isset($_SESSION['email']) && isset($_COOKIE['email'])) {
    //Obtenemos el usuario de la BD
    $email = filter_var($_COOKIE['email'], FILTER_SANITIZE_STRING);
    $usuarioDAO = new UsuarioDAO(Conexion:: conectar());
    $usuario = $usuarioDAO -> obtenerPorEmail($email);

    if(!$usuario){    //Si no se encuentra el usuario
        
        setcookie("email", "", 0);   //Borramos la cookie
        header("Location: index.php");
        
    } else {
        //Iniciamos sesión
        $_SESSION['email'] = $usuario -> getEmail();
        $_SESSION['contras'] = $usuario -> getContras();
      
        setcookie("email", $email, time() + 20 * 24 * 60 * 60);
        
    }
    
}
//ejecucion del controlador

$controller = $map[$ruta]['controller'];
$method = $map[$ruta]['method'];

if(method_exists($controller, $method)){

    $objContr = new $controller();
    $objContr -> $method();

} else {
    
    header('Status: 404 Not Found');
    echo "El método $method del controlador $controller no existe.";
    
}
       
    