<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

/**
 * Description of Pokemon
 *
 * @author Aitor
 */
class Pokemon {
    
    public $numPokedex;
    public $nombre;
    public $descripcion;
    public $categoria;
    public $tipoPrimario;
    public $tipoSecundario;
    public $habilidad;
    public $habilidadOculta;
    public $peso;
    public $altura;
    public $color;
    public $generacion;
    public $huella;
    public $grito;
    
    public function __construct() {
        
    }
    
    public function getNumPokedex() {
        return $this->numPokedex;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getTipoPrimario() {
        return $this->tipoPrimario;
    }

    public function getTipoSecundario() {
        return $this->tipoSecundario;
    }

    public function getHabilidad() {
        return $this->habilidad;
    }

    public function getHabilidadOculta() {
        return $this->habilidadOculta;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function getColor() {
        return $this->color;
    }

    public function getGeneracion() {
        return $this->generacion;
    }

    public function getHuella() {
        return $this->huella;
    }

    public function getGrito() {
        return $this->grito;
    }

    public function setNumPokedex($numPokedex): void {
        $this->numPokedex = $numPokedex;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function setCategoria($categoria): void {
        $this->categoria = $categoria;
    }

    public function setTipoPrimario($tipoPrimario): void {
        $this->tipoPrimario = $tipoPrimario;
    }

    public function setTipoSecundario($tipoSecundario): void {
        $this->tipoSecundario = $tipoSecundario;
    }

    public function setHabilidad($habilidad): void {
        $this->habilidad = $habilidad;
    }

    public function setHabilidadOculta($habilidadOculta): void {
        $this->habilidadOculta = $habilidadOculta;
    }

    public function setPeso($peso): void {
        $this->peso = $peso;
    }

    public function setAltura($altura): void {
        $this->altura = $altura;
    }

    public function setColor($color): void {
        $this->color = $color;
    }

    public function setGeneracion($generacion): void {
        $this->generacion = $generacion;
    }

    public function setHuella($huella): void {
        $this->huella = $huella;
    }

    public function setGrito($grito): void {
        $this->grito = $grito;
    }

}
