  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Actualizar Rol de Usuarios</h1>
      <a href="?view=Roles&action=CrearRol" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-save fa-sm "></i> Crear nuevo rol</a>
    </div>
    <div clas="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Nuevo rol</h6>
                </div>
                <div class="card-body">
                    <form action="?view=Roles&action=ActualizarRol" method="post" class="user">
                    <div class="form-group row">
                        <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="nombre" class="form-control form-control-user" required id="nombre" placeholder="Rol" value="<?php echo $data->nombrerol; ?>">
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
