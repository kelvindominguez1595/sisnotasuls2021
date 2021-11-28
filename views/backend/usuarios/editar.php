
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Editar</h1>
    </div>
    <div clas="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Actualizar</h6>
                </div>
                <div class="card-body">
                    <form onsubmit="return validarrPass();" action="?view=Usuarios&action=ActualizarPro" method="post" submit class="user" enctype="multipart/form-data">
                    <div class="form-group row">
                    <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label for="usuario">Nombres</label>
                            <input type="text" name="usuario" class="form-control form-control-user" required id="exampleFirstName" placeholder="usuario"  value="<?php echo $data->usuario; ?>">
                        </div>
        
                 
                    </div>
                    <div class="form-group row">     
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="direccion">Email</label>
                            <input type="text" name="email" required  class="form-control form-control-user" placeholder="example@example"  value="<?php echo $data->email; ?>">
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="direccion">Contraseña</label>
                            <input type="password" name="pass" id="pass" required class="form-control form-control-user" placeholder="******"  value="<?php echo $data->pass; ?>">
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">     
                        <label>Tipo de contratación</label>      
                        <br>             
                            <?php
                                foreach($this->contrataciones->listar() as $item){                        
                            ?>
                                <label for="contractacion_<?php echo $item->id; ?>">
                                    <input type="radio" 
                                        <?php if($item->id == $data->contratacion_id){ echo 'checked'; } ?> 
                                    value="<?php echo $item->id; ?>" name="permanente" id="contractacion_<?php echo $item->id; ?>"> 
                                    <?php echo $item->contratacion; ?> 
                                </label>
                                <br>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">     
                        <label>Nivel de Usuario</label>      
                        <br>             
                            <?php
                                foreach($this->modelRoles->ListarRoles() as $item){                        
                            ?>
                                <label for="roles_id_<?php echo $item->id; ?>">
                                    <input type="radio" 
                                        <?php if($item->id == $data->rol_id){ echo 'checked'; } ?> 
                                    value="<?php echo $item->id; ?>" name="roles_id" id="roles_id_<?php echo $item->id; ?>"> 
                                    <?php echo $item->nombrerol; ?> 
                                </label>
                                <br>
                            <?php
                                }
                            ?>
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
