<?php

require_once '../model/Alignment.php';
require_once '../model/Gender.php';
require_once '../model/Race.php';

//Esta función recibe un objeto tipo arreglo y renderiza 
//en el navegador JSON siempre que contenga datos
function renderJSON($object = []){
  if ($object){
    echo json_encode($object);
  }
}

if (isset($_POST['operacion'])){

  switch ($_POST['operacion']){
    case 'listarBandos':
      $alignment = new Alignment();
      renderJSON($alignment->listarAlignments());
      break;
    case 'listarRazas':
      $race = new Race();
      renderJSON($race->listarRaces());
      break;
    case 'listarGeneros':
      $gender = new Gender();
      renderJSON($gender->listarGenders());
      break;
  }

}