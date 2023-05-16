<h1 class="text-md text-center"><?=$titulo?></h1>

<table class="table table-border mt-3">
  <colgroup>
    <col style='width: 5%'>
    <col style='width: 35%'>
    <col style='width: 15%'>
    <col style='width: 25%'>
    <col style='width: 10%'>
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Color cabello</th>
      <th>Publicado</th>
      <th>Peso</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($datos as $registro): ?>
    <tr>
      <td><?=$registro['id']?></td>
      <td><?=$registro['superhero_name']?></td>
      <td><?=$registro['hair_colour']?></td>
      <td><?=$registro['publisher_name']?></td>
      <td><?=$registro['weight_kg']?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>