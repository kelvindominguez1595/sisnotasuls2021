  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Materias Asignadas al Docente</h1>
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
    <div class="row">
        <?php  
        $i = 1;
        foreach($this->materias->Listar() as $item){  ?> 
            <div class="col-xl-4 col-md-6 mb-4">
                <a href="?view=Notas&action=ListAlumnosMaterias&id=<?php echo $item->id;?>" style="text-decoration: none;">
                    <div class="card shadow h-100 py-2" style=" border-left: 0.25rem solid  <?php echo $this->materias->randomColor(); ?>  !important;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <?php  echo $item->nombregrado." ". $item->seccion; ?>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php  echo $item->materia; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>    
            </div>
  
        <?php $i++;} ?>
    </div>

  </div>
        <!-- /.container-fluid -->