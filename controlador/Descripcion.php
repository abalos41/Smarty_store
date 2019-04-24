<?php

class Descripcion {
    private $cod;
    private $procesador;
    private $RAM;
    private $disco;
    private $grafica;
    private $unidadOptica;
    private $SO;
    private $otros;
    
    public function getCod() {return $this->cod;}

    public function getProcesador() {return $this->procesador;}

    public function getRAM() {return $this->RAM;}

    public function getDisco() {return $this->disco;}

    public function getGrafica() {return $this->grafica;}

    public function getUnidadOptica() {return $this->unidadOptica;}

    public function getSO() {return $this->SO;}

    public function getOtros() {return $this->otros;}

    public function __construct($fila) {
        $this->cod = $fila['cod'];
        $this->procesador = $fila['procesador'];
        $this->RAM = $fila['RAM'];
        $this->disco = $fila['disco'];
        $this->grafica = $fila['grafica'];
        $this->unidadOptica = $fila['unidadoptica'];
        $this->SO = $fila['SO'];
        $this->otros = $fila['otros'];
    }
    
}

?>