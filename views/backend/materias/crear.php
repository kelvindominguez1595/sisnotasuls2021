  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Crear nuevo registro</h1>
      <!-- <a href="?view=Roles&action=CrearRol" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-save fa-sm "></i> Crear nuevo rol</a> -->
    </div>
    <div clas="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Nuevo </h6>
                </div>
                <div class="card-body">
                    <form action="?view=Materias&action=Registrar" method="post" class="user">
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="materia">Nombre Materia</label>
                            <input type="text" name="materia" class="form-control form-control-user" required id="materia" placeholder="">
                        </div>
                        <div class="col-sm-2 mb-3 mb-sm-0">
                          <label for="numeval">Num. Evaluaciones</label>
                            <input type="number" name="numeval" class="form-control form-control-user" required id="numeval" placeholder="">
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                          <label for="docente">Docente</label>
                            <select name="docente" id="docente" class="form-control">
                                  <?php foreach($this->modeldocentes->ListarUsuarios() as $item) {  ?>
                                    <option value="<?php echo $item->id; ?>"><?php echo $item->usuario; ?></option>
                                  <?php } ?>
                            </select>
                                            
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                          <label for="grado">Grado</label>
                                <select name="grado" id="grado" class="form-control">
                                  <?php foreach($this->modelgrados->Listar() as $item) {  ?>
                                    <option value="<?php echo $item->id; ?>"><?php echo $item->nombregrado; ?></option>
                                  <?php } ?>
                                </select>
                    
                        </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                          <label for="descripcion">Descripcion</label>
                            <input type="text" name="descripcion" class="form-control form-control-user" required id="descripcion" placeholder="">
                        </div> 
                    </div>
        
                    <div class="form-group row d-flex justify-content-center">
                        <div class="col-sm-6">
                            <input type="submit" value="Guardar" class="btn btn-primary btn-user btn-block">
                        </div>
                    </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
        <!-- /.container-fluid -->
