  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
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
      <a href="?view=Usuarios&action=NuevoUsuario" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user fa-sm "></i> Agregar usuario</a>
    </div>

    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listar usuarios</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>                       
                      <th>#</th>
                      <th>Nombre</th>                     
                      <th>Email</th>                                    
                      <th>Nivel</th>                     
                      <th>Contratacion</th>                     
                      <th>Fecha</th>                     
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>                     
                      <th>Email</th>                            
                      <th>Nivel</th>                     
                      <th>Contratacion</th>                     
                      <th>Fecha</th>                     
                      <th>Opciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php  
                  $i = 1;
                  foreach($this->model->ListarUsuarios() as $item){  ?>                
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $item->usuario; ?></td>
                      <td><?php echo $item->email; ?></td>            
                      <td><?php echo $item->nombrerol; ?></td>
                      <td><?php echo $item->contratacion; ?></td>
                      <td><?php echo $item->created_at; ?></td>            
                      <td>                          
                        <a href="?view=Usuarios&action=EditarUsuario&id=<?php echo $item->id;?>" class="btn btn-primary btn-circle"> <i class="fas fa-pencil-alt" data-toggle="tooltip" data-placement="left" title="Editar Registro"></i></a>
                        <a href="?view=Usuarios&action=BorrarUsuario&id=<?php echo $item->id;?>" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="right" title="Borrar Registro"> <i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                <?php $i++;} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

  </div>
        <!-- /.container-fluid -->