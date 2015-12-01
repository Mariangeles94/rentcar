<?php

class ManageVehiculo {

    private $bd = null;
    private $tabla = "vehiculo";

    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }

    function get($matricula) {
        $parametros = array();
        $parametros['matricula'] = $matricula;
        $this->bd->select($this->tabla, "*", "matricula=:matricula", $parametros);
        $fila = $this->bd->getRow();
        $vehiculo = new Vehiculo();
        $vehiculo->set($fila);
        return $vehiculo;
    }
    function getPorOficina($oficina) {
        $parametros = array();
        $parametros['oficina'] = $oficina;
        $this->bd->select($this->tabla, "*", "oficina=:oficina", $parametros);
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $vehiculo = new Vehiculo();
            $vehiculo->set($fila);
            $r[] = $vehiculo;
        }
        return $r;
    }
    function getDisponible($disponible) {
        $parametros = array();
        $parametros['disponible'] = $disponible;
        $this->bd->select($this->tabla, "*", "disponible=:disponible", $parametros);
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $vehiculo = new Vehiculo();
            $vehiculo->set($fila);
            $r[] = $vehiculo;
        }
        return $r;
    }

    function count($condicion = "1 = 1", $parametros = array()) {
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }

    function delete($matricula) {
        $parametros = array();
        $parametros['matricula'] = $matricula;
        return $this->bd->delete($this->tabla, $parametros);
    }

    function deleteVehiculos($parametros) {
        return $this->bd->delete($this->tabla, $parametros);
    }

    function erase(Vehiculo $vehiculo) {
        return $this->delete($vehiculo->getMatricula());
    }

    function set(Vehiculo $vehiculo) {
        $parametrosSet = array();
        $parametrosSet['marca'] = $vehiculo->getMarca();
        $parametrosSet['modelo'] = $vehiculo->getModelo();
        $parametrosSet['precio'] = $vehiculo->getPrecio();
        $parametrosSet['oficina'] = $vehiculo->getOficina();
        $parametrosSet['disponible'] = $vehiculo->getDisponible();
        
        $parametrosWhere = array();
        $parametrosWhere['matricula'] = $vehiculo->getMatricula();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }

    function insert(Vehiculo $vehiculo) {
        $parametrosSet = array();
        $parametrosSet['matricula'] = $vehiculo->getMatricula();
        $parametrosSet['marca'] = $vehiculo->getMarca();
        $parametrosSet['modelo'] = $vehiculo->getModelo();
        $parametrosSet['precio'] = $vehiculo->getPrecio();
        $parametrosSet['oficina'] = $vehiculo->getOficina();
        $parametrosSet['disponible'] = $vehiculo->getDisponible();
        
        return $this->bd->insert($this->tabla, $parametrosSet);
    }

    function getList($pagina = 1, $nrpp = Constant::NRPP) {
        $resgistroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", "1=1", array(), "matricula", "$resgistroInicial, $nrpp"); /* limite va desde 1 y saca 10 registros */
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $vehiculo = new Vehiculo();
            $vehiculo->set($fila);
            $r[] = $vehiculo;
        }
        return $r;
    }

    function getValuesSelect() {
        $this->bd->query($this->tabla, "matricula, precio", array(), "precio");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }

}
