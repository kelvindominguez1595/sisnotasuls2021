  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Actualizar</h1>
      <a href="?view=Matriculas&action=Nuevo" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-save fa-sm "></i> Agregar</a>
    </div>
    <div clas="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Actualizar</h6>
                </div>
                <div class="card-body">
                    <form action="?view=Alumnos&action=Actualizar" method="post" class="user">
                      <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                      <div class="form-group row">              

                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="nombres">Nombres</label>
                            <input type="text" name="nombres" class="form-control form-control-user" value="<?php echo $data->nombres; ?>" required id="materia" placeholder="">
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control form-control-user" value="<?php echo $data->apellidos; ?>" required id="materia" placeholder="">
                        </div>

                        <div class="col-sm-3 mb-3 mb-sm-0">
                          <label for="seccionid">Sección</label>
                            <select name="seccionid" id="seccionid" class="form-control">
                                  <?php foreach($this->modelseccion->Listar() as $item) {  ?>
                                    <option <?php if($data->seccion_id == $item->id){ echo "selected"; } ?> value="<?php echo $item->id; ?>"><?php echo $item->seccion; ?></option>
                                  <?php } ?>
                            </select>
                                            
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                          <label for="gradoid">Grado</label>
                                <select name="gradoid" id="gradoid" class="form-control">
                                  <?php foreach($this->modelgrado->Listar() as $item) {  ?>
                                    <option <?php if($data->grado_id == $item->id){ echo "selected"; } ?> value="<?php echo $item->id; ?>"><?php echo $item->nombregrado; ?></option>
                                  <?php } ?>
                                </select>

                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="genero">Genero</label>
                                    <select name="genero" id="genero" class="form-control">
                                      <option value="Hombre" <?php if($data->genero == "Hombre"){ echo "selected"; } ?>>Hombre</option>
                                      <option value="Mujer" <?php if($data->genero == "Mujer"){ echo "selected"; } ?>>Mujer</option>
                                      <option value="Otro" <?php if($data->genero == "Otro"){ echo "selected"; } ?>>Otro</option>
                                    </select>
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="fechanac">Fecha de Nacimiento</label>
                          <input type="date" name="fechanac" id="fechanac" class="form-control" value="<?php echo $data->fechanacimiento; ?>" >
                        </div>

                

                        </div>
                    <div class="form-group row d-flex justify-content-center">
                        <div class="col-sm-6">
                            <input type="submit" value="Actualizar" class="btn btn-primary btn-user btn-block">
                        </div>
                    </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
        <!-- /.container-fluid -->
