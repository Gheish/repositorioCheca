<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

class Foto {
    
    private $idfoto;
    private $direccion;
    private $numPoke;
    private $principal;
    
    public function __construct() {
        
    }
    
    public function getIdfoto() {
        return $this->idfoto;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getNumPoke() {
        return $this->numPoke;
    }

    public function getPrincipal() {
        return $this->principal;
    }

    public function setIdfoto($idfoto): void {
        $this->idfoto = $idfoto;
    }

    public function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }

    public function setNumPoke($numPoke): void {
        $this->numPoke = $numPoke;
    }

    public function setPrincipal($principal): void {
        $this->principal = $principal;
    }



    
    
}