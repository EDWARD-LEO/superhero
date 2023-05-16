<?php

require_once 'Conexion.php';

class Race extends Conexion{

  private $conexion;

  public function __CONSTRUCT(){
    $this->conexion = parent::getConexion();
  }

  public function listarRaces(){
    try{
      $consulta = $this->conexion->prepare("SELECT * FROM race");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_NUM);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

}