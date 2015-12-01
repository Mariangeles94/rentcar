<?php

class ManageOficinaVehiculo {

    private $bd = null;

    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function getListOficinaVehiculo($condicion = null, $parametros = array()){
        if ($condicion === null) {
            $condicion = "";
        } else {
            $condicion = "where $condicion";
        }
        $sql = "select v.*, o.* 
                from vehiculo v
                left join oficina o
                on v.oficina = o.id $condicion";
        $this->bd->send($sql, $parametros);
        $r = array();
         while ($fila = $this->bd->getRow()) {
            $oficina = new Oficina();
            $oficina->set($fila);
            $vehiculo = new Vehiculo();
            $vehiculo->set($fila);
            $r = new OficinaVehiculo($oficina, $vehiculo);
          }
          return $r;
    }
     function getDisponible($disponible, $oficina) {
        $parametros = array();
        $parametros['disponible'] = $disponible;
        $parametros['oficina'] = $oficina;
        $this->bd->select($this->tabla, "*", "disponible=:disponible", $parametros);///////////////Ver aqui//////////////////////
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $vehiculo = new Vehiculo();
            $vehiculo->set($fila);
            $r[] = $vehiculo;
        }
        return $r;
    }
    function getListPrueba($id){
        $parametros=array();
        $parametros["id"]=$id;
        $sql = "select v.*, o.* 
                from vehiculo v
                right join oficina o
                on v.oficina = o.id 
                where o.id=:id";
        $this->bd->send($sql, $parametros);
        $r=array();
        $contador=0;
        while ($fila = $this->bd->getRow()) {
            $vehiculo = new Vehiculo();
            $vehiculo->set($fila);
            $oficina = new Oficina();
            $oficina->set($fila,6);
            
           
            $r[$contador]["oficina"]=$oficina;
            $r[$contador]["vehiculo"]=$vehiculo;
            $contador++;
          }
        
        return $r;
        
    }



}
