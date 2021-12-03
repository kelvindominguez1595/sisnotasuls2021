<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Mejores promedios</title>
    <!-- CSS Code: Place this code in the document's head (between the <head> -- </head> tags) -->
<style>
table.customTable {
  padding-top: 10%;
  width: 100%;
  background-color: #FFFFFF;
  border-collapse: collapse;
  border-width: 2px;
  border-color: #7ea8f8;
  border-style: solid;
  color: #000000;
}

table.customTable td, table.customTable th {
  border-width: 2px;
  border-color: #7ea8f8;
  border-style: solid;
  padding: 5px;
}

table.customTable thead {
  background-color: #7ea8f8;
}
.titulo{
    position: absolute;
    top: 1%;
    left: 25%;
    bottom: 35%;
}
</style>
</head>
<body>
    <div class="titulo">
        <h1>Mejores promedios</h1>
        <p></p>
    </div>
    <!-- HTML Code: Place this code in the document's body (between the <body> tags) where the table should appear -->
<table class="customTable">
  <thead>
    <tr>
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Grupo</th>
      <th>Seccion</th>
      <th>Calificación</th>
    </tr>
  </thead>
  <tbody>
  <?php  
  foreach($this->model->MejoresPromedios() as $item){ ?>
    <tr>
      <td><?php echo  $item->nombres;?></td>
      <td><?php echo  $item->apellidos;?></td>
      <td><?php echo  $item->nombregrado;?></td>
      <td><?php echo  $item->seccion;?></td>
      <td><?php echo  $item->calificacion;?></td>
    </tr>
    <?php 

    } ?>
  </tbody>
</table>
<!-- Generated at CSSPortal.com -->
</body>
</html>