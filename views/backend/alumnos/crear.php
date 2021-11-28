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
                    <form action="?view=Alumnos&action=Registrar" method="post" class="user">
                    <div class="form-group row">

                        <input type="hidden" name="matriculaid" id="matriculaid" value="<?php echo $id; ?>" />

                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="nombres">Nombres</label>
                            <input type="text" name="nombres" class="form-control form-control-user" required id="materia" placeholder="">
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control form-control-user" required id="materia" placeholder="">
                        </div>
              
                        <div class="col-sm-3 mb-3 mb-sm-0">
                          <label for="seccionid">Sección</label>
                            <select name="seccionid" id="seccionid" class="form-control">
                                  <?php foreach($this->modelseccion->Listar() as $item) {  ?>
                                    <option value="<?php echo $item->id; ?>"><?php echo $item->seccion; ?></option>
                                  <?php } ?>
                            </select>
                                            
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                          <label for="gradoid">Grado</label>
                                <select name="gradoid" id="gradoid" class="form-control">
                                  <?php foreach($this->modelgrado->Listar() as $item) {  ?>
                                    <option value="<?php echo $item->id; ?>"><?php echo $item->nombregrado; ?></option>
                                  <?php } ?>
                                </select>
                    
                        </div>

                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="genero">Genero</label>
                                    <select name="genero" id="genero" class="form-control">
                                      <option value="Hombre">Hombre</option>
                                      <option value="Mujer">Mujer</option>
                                      <option value="Otro">Otronmnn</option>
                                    </select>
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="fechanac">Fecha de Nacimiento</label>
                           <input type="date" name="fechanac" id="fechanac" class="form-control">
                        </div>
                   
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="direccion">Email</label>
                            <input type="text" name="email" required  class="form-control form-control-user" placeholder="example@example">
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="direccion">Contraseña</label>
                            <input type="password" name="pass" id="pass" required class="form-control form-control-user" placeholder="******">
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
