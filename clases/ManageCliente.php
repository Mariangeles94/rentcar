<?php
class ManageCliente {
   private $bd = null;
   private $tabla = "cliente";
   
   function __construct(DataBase $bd) {
        $this->bd = $bd;
    }

    
    function get($id) {
        $parametros = array();
        $parametros['id'] = $id;
        $this->bd->select($this->tabla, "*", "id=:id", $parametros);
        $fila = $this->bd->getRow();
        $cliente = new Cliente();
        $cliente->set($fila);
        return $cliente;
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

    function erase(Cliente $cliente) {
        return $this->delete($cliente->getId());
    }
 
    function set(Cliente $cliente) {
        $parametrosSet = array();
        $parametrosSet['idmatricula'] = $cliente->getIdmatricula();
        $parametrosSet['fechasalida'] = $cliente->getFechaentrada();
        $parametrosSet['fechaentrada'] = $cliente->getFechasalida();
        $parametrosSet['nombre'] = $cliente->getNombre();
        $parametrosSet['apellidos'] = $cliente->getApellidos();
        $parametrosSet['dni'] = $cliente->getDni();
        $parametrosSet['telefono'] = $cliente->getTelefono();
        $parametrosSet['precio'] = $cliente->getPrecio();

        $parametrosWhere = array();
        $parametrosWhere['id'] = $cliente->getId();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }
    function insert(Cliente $cliente) {
        $parametrosSet = array();
        
        $parametrosSet['id'] = $cliente->getId();
        $parametrosSet['idmatricula'] = $cliente->getIdmatricula();
        $parametrosSet['fechasalida'] = $cliente->getFechaentrada();
        $parametrosSet['fechaentrada'] = $cliente->getFechasalida();
        $parametrosSet['nombre'] = $cliente->getNombre();
        $parametrosSet['apellidos'] = $cliente->getApellidos();
        $parametrosSet['dni'] = $cliente->getDni();
        $parametrosSet['telefono'] = $cliente->getTelefono();
        $parametrosSet['precio'] = $cliente->getPrecio();
        
        return $this->bd->insert($this->tabla, $parametrosSet);
    }
     function getList($pagina = 1, $nrpp = Constant::NRPP) {
        $resgistroInicial = ($pagina - 1) * $nrpp;
        $this->bd->select($this->tabla, "*", "1=1", array(), "id", "$resgistroInicial, $nrpp"); /* limite va desde 1 y saca 10 registros */
        $r = array();
        while ($fila = $this->bd->getRow()) {
            $cliente = new Cliente();
            $cliente->set($fila);
            $r[] = $cliente;
        }
        return $r;
    }
     function getValuesSelect() {
        $this->bd->query($this->tabla, "id, idmatricula", array(), "idmatricula");
        $array = array();
        while ($fila = $this->bd->getRow()) {
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }


}
