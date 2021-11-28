
<!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Agregar Docente</h1>
    </div>
    <div clas="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Nuevo Docente</h6>
                </div>
                <div class="card-body">
                <form id="formregistro" action="?view=Usuarios&action=CrearUsuario" method="post" submit enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="nombre">Nombre Completo</label>
                            <input type="text" name="usuario" class="form-control" required id="usuario" placeholder="Nombres">
                        </div>
      
                    </div>             

                    <!-- Datos correo electronico  -->
                    <div class="form-group row">     
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="direccion">Email</label>
                            <input type="text" name="email" required  class="form-control form-control-user" placeholder="example@example">
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="direccion">Contraseña</label>
                            <input type="password" name="pass" id="pass" required class="form-control form-control-user" placeholder="******">
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="direccion">Repetir la contraseña</label>
                            <input type="password" name="passRepear" id="passRepear"  required class="form-control form-control-user" placeholder="******">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="nombre">Tipo Contratacion</label>
                            <br>
                                <label for="contractacion">
                                    <input type="radio" value="1" name="permanente" id="contractacion"> Permanente
                                </label>
                   
                       
                                <label for="servicio">
                                    <input type="radio" value="2" name="permanente" id="servicio"> Servicios
                                </label>                   
                          
                        </div>
                        <input type="submit" value="Guardar" class="btn btn-primary btn-user btn-block">
                    </div>
                    <div class="form-group row">
                        <!-- <div class="col-sm-2 mb-3 mb-sm-0">
                            <label>Nivel de usuario</label>
                                <select name="roles_id" id="" class="form-control">
                                    <option value="0" >Seleccione...</option>
                                    <?php
                                    foreach($this->modelRoles->ListarRoles() as $item){
                                    ?>
                                        <option value="<?php echo $item->id; ?>"><?php echo $item->nombre; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                        </div> -->

             
            
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
