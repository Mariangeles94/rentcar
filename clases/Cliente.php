<?php
class Cliente {
   private $id, $idmatricula, $fechasalida, $fechaentrada, $nombre, $apellidos, $dni, $telefono, $precio;
   
   //1º Constructor -> null
   function __construct($id = null, $idmatricula = null, $fechasalida = null, $fechaentrada = null, $nombre = null, $apellidos = null, $dni = null, $telefono = null, $precio = null) {
       $this->id = $id;
       $this->idmatricula = $idmatricula;
       $this->fechasalida = $fechasalida;
       $this->fechaentrada = $fechaentrada;
       $this->nombre = $nombre;
       $this->apellidos = $apellidos;
       $this->dni = $dni;
       $this->telefono = $telefono;
       $this->precio = $precio;
   }
   //2º getter y setter
   function getId() {
       return $this->id;
   }

   function getIdmatricula() {
       return $this->idmatricula;
   }

   function getFechasalida() {
       return $this->fechasalida;
   }

   function getFechaentrada() {
       return $this->fechaentrada;
   }

   function getNombre() {
       return $this->nombre;
   }

   function getApellidos() {
       return $this->apellidos;
   }

   function getDni() {
       return $this->dni;
   }

   function getTelefono() {
       return $this->telefono;
   }

   function getPrecio() {
       return $this->precio;
   }

   function setId($id) {
       $this->id = $id;
   }

   function setIdmatricula($idmatricula) {
       $this->idmatricula = $idmatricula;
   }

   function setFechasalida($fechasalida) {
       $this->fechasalida = $fechasalida;
   }

   function setFechaentrada($fechaentrada) {
       $this->fechaentrada = $fechaentrada;
   }

   function setNombre($nombre) {
       $this->nombre = $nombre;
   }

   function setApellidos($apellidos) {
       $this->apellidos = $apellidos;
   }

   function setDni($dni) {
       $this->dni = $dni;
   }

   function setTelefono($telefono) {
       $this->telefono = $telefono;
   }

   function setPrecio($precio) {
       $this->precio = $precio;
   }
   
   function fechaValidar($fecha1, $fecha2){
       if($fecha1 > $fecha2){
          return false;
       }
       return true;
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
