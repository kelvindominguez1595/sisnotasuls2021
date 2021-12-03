  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><?php echo $materia->materia; ?></h1>
      <?php if(isset($_SESSION['texto'])){?>
            <div class="alert alert-<?php if($_SESSION['tipo'] == "success"){ echo "success";}else{echo "danger"; }?> alert-dismissible fade show" role="alert">
            <strong>                   
                    <?php if($_SESSION['tipo'] == "success"){ echo "Exitos!!! 😊";}else{echo "Ooops! Ah Ocurrido un error 😱"; }?>
                 </strong> 
                <?php echo $_SESSION['texto'];?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <?php unset($_SESSION["texto"]); unset($_SESSION["tipo"]); ?>
                </button>
            </div>
      <?php } ?>
      
    </div>


    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listar</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form action="?view=Notas&action=obtenerNotas" method="POST">
                <input type="hidden" name="materiaid" id="materiaid" value="<?php echo $id; ?>">
                <table class="table table-bordered table-striped"  width="100%" cellspacing="0">
                  <thead>
                    <tr>                       
                      <th>#</th>
                      <th>Nombre</th>     
                      <?php
                        for ($i=1; $i <= $materia->num_evaluaciones; $i++) { 
                            # code...
                            echo "<th>Nota ".$i."</th>";
                        }                    
                      ?>         
                      <th>Promedio</th>
                      <?php 
                        if($_SESSION['roles_id'] == 1){
                          echo "<th>Editar</th> <th>Borrar</th>";
                        }
                      ?>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <?php
                        for ($i=1; $i <= $materia->num_evaluaciones; $i++) { 
                            # code...
                            echo "<th>Nota ".$i."</th>";
                        }                    
                      ?>    
                      <th>Promedio</th>
                      <?php 
                        if($_SESSION['roles_id'] == 1){
                          echo "<th>Editar</th> <th>Borrar</th>";
                        }
                      ?>
                    </tr>
                  </tfoot>
               
                    <tbody>
                            <?php  
                                $index = 1;
                                foreach($alum as $item){  ?>                
                                    <tr>
                                    <td><?php echo $index; ?></td>
                                    <td ><?php  echo $item->nombres." ".$item->apellidos; ?>
                                    <input type="hidden" name="alumnoid[]" id="alumnoid<?php echo $item->id; ?>" value="<?php echo $item->id; ?>">
                                    </td>
                                    <?php
                                    // sacar promedio por cada alumno
                                    $promedioFIna = 0;
                                    $sumarnotas = 0;
                                    // para el for 
                                      $cantInpuShow = 0;
                                      // obtengo la cantidad de notas calificadas
                                      $countNo = $this->model->CountNotas($item->id, $id);
                                      // resto las cantidad de notas calificadas
                                      $cantInpuShow = $materia->num_evaluaciones - $countNo->countnotas;
                                      // Mustro los td con las notas ya puestas
                                      foreach ($this->model->ValNotas($item->id, $id) as $itemval) {
                                        echo "<td WIDTH='120'> ".$itemval->nota."</td>";
                                        $sumarnotas = $sumarnotas + $itemval->nota; // sumamos las notas que tengas registradas
                                      }
                                      // Muestro los input para que escriban las notas que faltan
                                        for ($i=1; $i <=  $cantInpuShow; $i++) {                                        
                                              echo "<td WIDTH='120'><input step='any' type='number' class='form-control' min='0' max='10' id='nota".$item->id."' name='nota".$item->id."[]' > </td>";
                                        }                    
                                    ?>    
                                    <td>
                                        <?php 
                                            
                                            $promedioFIna = $sumarnotas / $materia->num_evaluaciones; // dividimos entre cuatro la suma de las notas
                                            // Mostramos el resultado del la ecuacion anterior
                                            echo "  <span class='font-weight-bolder'>".number_format($promedioFIna, 2)."</span>";
                                        ?>
                                    
                                    </td>
                                    <?php 
                                      if($_SESSION['roles_id'] == 1){
                                    ?>
                                    <td>
                                      <a href="?view=Notas&action=ActualizarNota&id=<?php echo $item->id;?>&materidi=<?php echo $id;?>" class="btn btn-primary"> Cambiar Nota</a>
                                    </td>
                                    <td>
                                      <a href="?view=Notas&action=Borrar&id=<?php echo $item->id;?>&materidi=<?php echo $id;?>" class="btn btn-danger"> Borrar Nota</a>

                                    </td>
                                    <?php
                                      }
                                    ?>
                                    </tr>
                                  
                                
                                <?php $index++;} ?> 
                    </tbody>
                </table>

                <div class="form-group">
                    <button type="submit"  class="btn btn-success">Guadar</button>
                </div>
                </form>
              </div>
            </div>
          </div>

  </div>
<!-- /.container-fluid -->