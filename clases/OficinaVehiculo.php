<?php
class OficinaVehiculo {
  private $oficina, $vehiculo;
  function __construct(Oficina $oficina, Vehiculo $vehiculo) {
      $this->oficina = $oficina;
      $this->vehiculo = $vehiculo;
  }
  function getOficina() {
      return $this->oficina;
  }

  function getVehiculo() {
      return $this->vehiculo;
  }

  function setOficina(Oficina $oficina) {
      $this->oficina = $oficina;
  }

  function setVehiculo(Vehiculo $vehiculo) {
      $this->vehiculo = $vehiculo;
  }



}
