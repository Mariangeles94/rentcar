<?php
class Oficina {
    private $id, $direccion, $ciudad, $telefono, $correo;
    
     //1º Constructor -> null
     function __construct($id = null, $direccion = null, $ciudad = null, $telefono = null, $correo = null) {
         $this->id = $id;
         $this->direccion = $direccion;
         $this->ciudad = $ciudad;
         $this->telefono = $telefono;
         $this->correo = $correo;
     }
     //2º getter y setter
     function getId() {
         return $this->id;
     }

     function getDireccion() {
         return $this->direccion;
     }

     function getCiudad() {
         return $this->ciudad;
     }

     function getTelefono() {
         return $this->telefono;
     }

     function getCorreo() {
         return $this->correo;
     }

     function setId($id) {
         $this->id = $id;
     }

     function setDireccion($direccion) {
         $this->direccion = $direccion;
     }

     function setCiudad($ciudad) {
         $this->ciudad = $ciudad;
     }

     function setTelefono($telefono) {
         $this->telefono = $telefono;
     }

     function setCorreo($correo) {
         $this->correo = $correo;
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
