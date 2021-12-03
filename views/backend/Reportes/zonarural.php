<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Alumnos Zona Rural</title>
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
        <h1>Reporte de Alumnos Zona Rural</h1>
        <p></p>
    </div>
    <!-- HTML Code: Place this code in the document's body (between the <body> tags) where the table should appear -->
<table class="customTable">
  <thead>
    <tr>
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Zona</th>
    </tr>
  </thead>
  <tbody>
  <?php  
  foreach($this->model->ZonaRural() as $item){ ?>
    <tr>
      <td><?php echo  $item->nombres;?></td>
      <td><?php echo  $item->apellidos;?></td>
      <td><?php echo  $item->zona;?></td>
    </tr>
    <?php 

    } ?>
  </tbody>
</table>
<!-- Generated at CSSPortal.com -->
</body>
</html>