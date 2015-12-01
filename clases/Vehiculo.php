<?php
class Vehiculo {
    private $matricula, $marca, $modelo, $precio, $oficina, $disponible;
    
    //1º Constructor -> null
    function __construct($matricula = null, $marca = null, $modelo = null, $precio = null, $oficina = null, $disponible = null) {
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->precio = $precio;
        $this->oficina = $oficina;
        $this->disponible = $disponible;
    }
    //2º getter y setter
    function getMatricula() {
        return $this->matricula;
    }

    function getMarca() {
        return $this->marca;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getOficina() {
        return $this->oficina;
    }

    function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setOficina($oficina) {
        $this->oficina = $oficina;
    }
    
    function getDisponible() {
        return $this->disponible;
    }
    function getDisponibleModificado(){
        $r="";
        if($this->disponible == 1){
            $r = "Disponible";
        }
        if ($this->disponible == 0){
            $r = "No disponible";
        }
        return $r;
    }
    function setDisponibleModificado($disponible){
        if($disponible === "Disponible"){
            $this->disponible = 1;
            return true;
        }else{
        if ($disponible === "No disponible"){
            $this->disponible = 0;
            return false;
        }    
        }
    }
            
    function setDisponible($disponible) {
        $this->disponible = $disponible;
    }

        //3º getJson
    public function getJson(){
        $r = '{';
        foreach ($this as $indice => $valor) {
            $r .= '"' .$indice . '":"' .$valor. '",';
        }
        $r = substr($r, 0,-1);
        $r .='}';
        return $r;
    }
    //4º set genérico
    function set($valores, $inicio=0){
        $i = 0;
        foreach ($this as $indice => $valor) {
           $this->$indice = $valores[$i+$inicio];
           $i++;
        }
    }
    
    public function __toString() {
        $r ='';
        foreach ($this as $key => $valor) { 
            $r .= "$valor ";
        }
        return $r;
    }


}
