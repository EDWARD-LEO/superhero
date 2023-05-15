<?php

require_once '../model/Publisher.php';

if (isset($_POST['operacion'])){

  $publisher = new Publisher();

  if ($_POST['operacion'] == 'listar'){
    $datos = $publisher->listarPublishers();
    
    if ($datos){
      echo json_encode($datos);
    }
  }

}