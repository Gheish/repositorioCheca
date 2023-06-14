<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

class Usuario {
    
    private $idusu;
    private $email;
    private $contras;
    private $nombre;
    private $fecha;
    
    public function __construct() {
        
    }
    
    public function getIdusu() {
        return $this->idusu;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getContras() {
        return $this->contras;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setIdusu($idusu): void {
        $this->idusu = $idusu;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setContras($contras): void {
        $this->contras = $contras;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

}

