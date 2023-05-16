<?php

require_once '../model/SuperHero.php';

function renderJSON($object = []){
  if ($object){
    echo json_encode($object);
  }
}

if (isset($_POST['operacion'])){

  $superhero = new SuperHero();
  if ($_POST['operacion'] == 'listar'){
    renderJSON($superhero->listarSuperHero($_POST['publisher_id']));
  }

  if ($_POST['operacion'] == 'filtrar'){
    $filtros = [
      "race_id"     => $_POST['race_id'],
      "gender_id"   => $_POST['gender_id'],
      "alignment_id"=> $_POST['alignment_id']
    ];
    renderJSON($superhero->filtrarSuperHero($filtros));
  }

  if ($_POST['operacion'] == 'resumenBandos'){
    $datos = $superhero->getAlignmentResume();
    renderJSON($datos);
  }

}