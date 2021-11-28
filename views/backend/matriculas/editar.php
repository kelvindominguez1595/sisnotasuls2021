  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Actualizar</h1>
      <a href="?view=Materias&action=Nuevo" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-save fa-sm "></i> Agregar</a>
    </div>
    <div clas="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Actualizar</h6>
                </div>
                <div class="card-body">
                    <form action="?view=Matriculas&action=Actualizar" method="post" class="user">
                      <input type="hidden" name="id" value="<?php echo $data->id; ?>">

                      <div class="form-group row">
                      <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="nombre">Nombre encargado</label>
                            <input type="text" name="nombre" class="form-control form-control-user" required id="nombre" value="<?php echo $data->nombreencargado; ?>" placeholder="">
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="apellido">Apellido encargado</label>
                            <input type="text" name="apellido" class="form-control form-control-user" required id="apellido" value="<?php echo $data->apellidocargado; ?>" placeholder="">
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="parentesco">Parentesco</label>
                          <select name="parentesco" id="parentesco" class="form-control">
                            <option value="Padre"  <?php if($data->parentesco == 'Padre'){ echo "selected"; } ?>>Padre</option>
                            <option value="Madre"  <?php if($data->parentesco == 'Madre'){ echo "selected"; } ?>>Madre</option>
                            <option value="Tia"  <?php if($data->parentesco == 'Tia'){ echo "selected"; } ?>>Tia</option>
                            <option value="Tio"  <?php if($data->parentesco == 'Tio'){ echo "selected"; } ?>>Tio</option>
                            <option value="Abuela"  <?php if($data->parentesco == 'Abuela'){ echo "selected"; } ?>>Abuela</option>
                            <option value="Abuelo"  <?php if($data->parentesco == 'Abuelo'){ echo "selected"; } ?>>Abuelo</option>
                          </select>                     
                        </div>

                       <input type="hidden" name="idzona" id="idzona" value="<?php if(isset($dire->id)) { echo $dire->id; } else{ echo "no"; } ?>">
                       <input type="hidden" name="idusuario" id="idusuario" value="<?php if(isset($datauuser->idusuario)) { echo $datauuser->idusuario; } else{ echo "no"; } ?>">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="zona">Zona</label>
                          <select name="zona" id="zona" class="form-control" required>
                            <option value="">Seleccionar...</option>
                            <option value="Urbana" <?php if(isset($dire->zona)){ if($dire->zona == 'Urbana'){ echo "selected"; } } ?>>Urbana</option>
                            <option value="Rural" <?php if(isset($dire->zona)){ if($dire->zona == 'Rural'){ echo "selected"; } } ?> >Rural</option>                       
                          </select>                     
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" class="form-control form-control-user" value="<?php echo $data->telefono; ?>"  required id="telefono" placeholder="">
                        </div>
                        <div class="col-sm-12 mb-3 mb-sm-0">
                          <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" class="form-control form-control-user" value="<?php echo $data->direccionencargado; ?>" required id="direccion" placeholder="">
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
