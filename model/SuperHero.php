<?php

require_once 'Conexion.php';

class SuperHero extends Conexion{

  private $conexion;

  public function __CONSTRUCT(){
    $this->conexion = parent::getConexion();
  }

  public function listarSuperHero($publisher_id){
    try{
      $consulta = $this->conexion->prepare("CALL spu_superhero_list(?)");
      $consulta->execute(array($publisher_id));
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage);
    }
  }

  public function filtrarSuperHero($filtros = []){
    try{
      $consulta = $this->conexion->prepare("CALL spu_superhero_filter_multiple(?,?,?)");
      $consulta->execute(
        array(
          $filtros['race_id'],
          $filtros['gender_id'],
          $filtros['alignment_id']
        )
      );
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage);
    }
  }

  public function getAlignmentResume(){
    try{
      $consulta = $this->conexion->prepare("CALL spu_superhero_alignment_resume()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage);
    }
  }

  public function getAlignmentByPublisher($publisher_id){
    try{
      $consulta = $this->conexion->prepare("CALL spu_superhero_getalignment_by_publisher(?)");
      $consulta->execute(array($publisher_id));
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage);
    }
  }

}