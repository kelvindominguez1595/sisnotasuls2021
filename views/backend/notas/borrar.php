  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">
        <span class='font-weight-bolder'>Alumno:</span>
          <?php echo $student->nombres." ".$student->apellidos; ?>
        <span class='font-weight-bolder'> Materia:</span>
          <?php echo $mat->materia; ?> 
      </h1>
     
    </div>
      
    </div>
    <div clas="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Borrar una nota</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center" >
                      <thead>
                        <th>#</th>
                        <th>Nota</th>
           
                        <th>Acción</th>
                      </thead>
                      <tbody>
                        <?php
                        
                        $i = 1;
                        $sumaNotas = 0;
                        $promedioFInal = 0;
                          foreach ($notas as $item) {
                        
                          ?>
                            <form action="?view=Notas&action=BorrarNota" method="post" submit enctype="multipart/form-data">
                          <tr>
              
                            <input type="hidden" name="materiaid" id="materiaid" value="<?php echo $materiaid; ?>" >
                              <input type="hidden" name="notaid" id="notaid" value="<?php echo $item->id; ?>" >
                        
                              <td><?php  echo $i; ?></td>
                              <td><?php echo number_format($item->nota, 2); ?></td>
                        
                            
                              <td>
                                <Button type="submit" class="btn btn-primary">Borrar</Button>
                              </td>
                              
                            </tr>
                          </form>
                        <?php
                        $sumaNotas = $sumaNotas + $item->nota;
                        $i++;
                          } 
                             // obtengo la cantidad de notas calificadas
                             $countNo = $this->model->CountNotas($alumnoid, $materiaid);
                             $promedioFInal =  $sumaNotas /  $countNo->countnotas;
                        ?>
                      </tbody>
                    </table>
                        <p>
                          <div class="alert alert-<?php if($promedioFInal >= 7){echo 'success'; }else{ echo 'danger'; }?>" role="alert">
                              Su nota final es: 
                             <h3> <span class="text-monospace font-weight-bold"><?php echo number_format( $promedioFInal, 2);?></span></h3>
                             <?php if($promedioFInal >= 7){echo 'Excelente!! esta materia esta aprobada'; }else{ echo 'Esta materia actualmente esta reprobada 😞'; }?>
                          </div>
                          <h3>
                          </h3>
                        </p>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
        <!-- /.container-fluid -->
