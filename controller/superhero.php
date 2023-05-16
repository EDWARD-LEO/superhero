<?php

require_once '../model/SuperHero.php';

if (isset($_POST['operacion'])){

  $superhero = new SuperHero();

  if ($_POST['operacion'] == 'listar'){

    $datos = $superhero->listarSuperHero($_POST['publisher_id']);
    if ($datos){
      echo json_encode($datos);
    }

  }

  if ($_POST['operacion'] == 'filtrar'){
    $filtros = [
      "race_id"     => $_POST['race_id'],
      "gender_id"   => $_POST['gender_id'],
      "alignment_id"=> $_POST['alignment_id']
    ];

    $datos = $superhero->filtrarSuperHero($filtros);
    
    if ($datos){
      echo json_encode($datos);
    }
  }

}