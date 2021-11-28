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
                    <form action="?view=Matriculas&action=Registrar" method="post" class="user">
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="nombre">Nombre encargado</label>
                            <input type="text" name="nombre" class="form-control form-control-user" required id="nombre" placeholder="">
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="apellido">Apellido encargado</label>
                            <input type="text" name="apellido" class="form-control form-control-user" required id="apellido" placeholder="">
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="parentesco">Parentesco</label>
                          <select name="parentesco" id="parentesco" class="form-control">
                            <option value="Padre">Padre</option>
                            <option value="Madre">Madre</option>
                            <option value="Tia">Tia</option>
                            <option value="Tio">Tio</option>
                            <option value="Abuela">Abuela</option>
                            <option value="Abuelo">Abuelo</option>
                          </select>                     
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="zona">Zona</label>
                          <select name="zona" id="zona" class="form-control" required>
                            <option value="">Seleccionar...</option>
                            <option value="Urbana">Urbana</option>
                            <option value="Rural">Rural</option>                       
                          </select>                     
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" class="form-control form-control-user" required id="telefono" placeholder="">
                        </div>
                        <div class="col-sm-12 mb-3 mb-sm-0">
                          <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" class="form-control form-control-user" required id="direccion" placeholder="">
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
