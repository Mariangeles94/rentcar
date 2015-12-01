<?php

class ManageVehiculoCliente {

    private $bd = null;

    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    function getListVehiculoCliente($idmatricula){
        $parametros=array();
        $parametros["idmatricula"]=$idmatricula;
        $sql = "select v.*, c.* 
                from vehiculo v
                right join cliente c
                on v.matricula = c.idmatricula 
                where c.idmatricula=:idmatricula";
        $this->bd->send($sql, $parametros);
        $r=array();
        $contador=0;
        while ($fila = $this->bd->getRow()) {
            $vehiculo = new Vehiculo();
            $vehiculo->set($fila);
            $cliente = new Cliente();
            $cliente->set($fila,6);
            
            
            
            $r[$contador]["vehiculo"]=$vehiculo;
            $r[$contador]["cliente"]=$cliente;
            
            $contador++;
          }
        
        return $r;
        
    }
    function getListPrueba($idmatricula){
        $parametros=array();
        $parametros["idmatricula"]=$idmatricula;
        $sql = "select v.*, c.* 
                from vehiculo v
                right join cliente c
                on v.matricula = c.idmatricula 
                where c.idmatricula=:idmatricula";
        $this->bd->send($sql, $parametros);
        $r=array();
        $contador=0;
        while ($fila = $this->bd->getRow()) {
            $vehiculo = new Vehiculo();
            $vehiculo->set($fila);
            $cliente = new Cliente();
            $cliente->set($fila,6);
            
           
            $r[$contador]["cliente"]=$cliente;
            $r[$contador]["vehiculo"]=$vehiculo;
            $contador++;
          }
        
        return $r;
        
    }

}
