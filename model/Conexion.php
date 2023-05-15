<?php

class Conexion{

  public function getConexion(){
    try{
      $cadenaConexion = "mysql:host=localhost;port=3306;dbname=superhero;charset=UTF8";
      $usuario = "root";
      $clave = "";

      $pdo = new PDO($cadenaConexion, $usuario, $clave);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

}
