<?php
class VehiculoCliente {
   private $vehiculo, $cliente;
   function __construct(Vehiculo $vehiculo, Cliente $cliente) {
       $this->vehiculo = $vehiculo;
       $this->cliente = $cliente;
   }
   function getVehiculo() {
       return $this->vehiculo;
   }

   function getCliente() {
       return $this->cliente;
   }

   function setVehiculo(Vehiculo $vehiculo) {
       $this->vehiculo = $vehiculo;
   }

   function setCliente(Cliente $cliente) {
       $this->cliente = $cliente;
   }


}
