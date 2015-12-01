<?php

class ManageOficina {
    private $bd = null;
    private $tabla = "oficina";

    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
     function get($id) {
        $parametros = array();
        $parametros['id'] = $id;
        $this->bd->select($this->tabla, "*", "id=:id", $parametros);
        $fila = $this->bd->getRow();
        $oficina = new Oficina();
        $oficina->set($fila);
        return $oficina;
    }
    function count($condicion = "1 = 1", $parametros = array()) {
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
    function delete($id) {
        $parametros = array();
        $parametros['id'] = $id;
        return $this->bd->delete($this->tabla, $parametros);
    }
    function deleteOficina($parametros) {
        return $this->bd->delete($this->tabla, $parametros);
    }

    function erase(Oficina $oficina) {
        return $this->delete($oficina->getId());
    }

    function set(Oficina $oficina) {
        $parametrosSet = array();
        $parametrosSet['direccion'] = $oficina->getDireccion();
        $parametrosSet['ciudad'] = $oficina->getCiudad();
        $parametrosSet['telefono'] = $oficina->getTelefono();
        $parametrosSet['correo'] = $oficina->getCorreo();

        $parametrosWhere = array();
        $parametrosWhere['id'] = $oficina->getId();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }
    function insert(Oficina $oficina) {
        $parametrosSet = array();
        $parametrosSet['id'] = $oficina->getId();
        $parametrosSet['direccion'] = $oficina->getDireccion();
        $parametrosSet['ciudad'] = $oficina->getCiudad();
        $parametrosSet['telefono'] = $oficina->getTelefono();
        $parametrosSet['correo'] = $oficina->getCorreo();
        return $this->bd->insert($this->tabla, $parametrosSet);
    }
     function getList($pagina = 1, $nrpp = Constant::NRPP) {
        $resgistroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", "1=1", array(), "id", "$resgistroInicial, $nrpp"); /* limite va desde 1 y saca 10 registros */
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $oficina = new Oficina();
            $oficina->set($fila);
            $r[] = $oficina;
        }
        return $r;
    }
     function getValuesSelect() {
        $this->bd->query($this->tabla, "id, ciudad", array(), "ciudad");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    function getValuesSelectOficina() {
        $this->bd->query($this->tabla, "id,direccion, ciudad", array(), "ciudad");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }


}
