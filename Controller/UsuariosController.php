<?php
// importamos nuestro modelo
require_once 'Model/Usuarios.php';
require_once 'Model/Roles.php';
require_once 'Model/Contrataciones.php';
class UsuariosController{
    // para accender al modelo y sus atributos
    private $model;
    private $modelRoles;
    private $contrataciones;
    private $vista = "Usuarios";

    // Constructos
    public function __CONSTRUCT(){
        $this->model = new Usuarios();
        $this->modelRoles = new Roles();
        $this->contrataciones = new Contrataciones();
    }

   /** Inicio de llamado de la vistas */
    public function Index(){
        require_once 'views/backend/header.php';
        require_once 'views/backend/usuarios/index.php';
        require_once 'views/backend/footer.php';
    }

    public function AccountView(){
        require_once 'views/backend/header.php';
        require_once 'views/backend/usuarios/cuenta.php';
        require_once 'views/backend/footer.php';
    }

    public function NuevoUsuario(){
        require_once 'views/backend/header.php';
        require_once 'views/backend/usuarios/crear.php';
        require_once 'views/backend/footer.php';
    }

    public function EditarUsuario(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        // crear el metodo para listar un dato especifico
        $data = $this->model->obtenerRegistro($id);
        require_once 'views/backend/header.php';
        require_once 'views/backend/usuarios/editar.php';
        require_once 'views/backend/footer.php';
    }
    public function BorrarUsuario(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        require_once 'views/backend/header.php';
        require_once 'views/backend/usuarios/borrar.php';
        require_once 'views/backend/footer.php';
    }
    /** Fin de llamado de la vistas */

    /** Metodos CRUD */   

    public function CrearUsuario(){
        // capturo los valores enviados por post o get        
        $this->model->usuario     = $_REQUEST['usuario'];
        $this->model->email       = $_REQUEST['email'];
        $this->model->pass        = $_REQUEST['pass'];
        $this->model->passRepear  = $_REQUEST['passRepear'];
        $this->model->permanente  = $_REQUEST['permanente'];
        if($this->model->RegistrarUsuario($this->model)){
            $texto = "Registro exitosamente ";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo, $this->vista);
        }else{
            $texto = "Ocurrio un error ";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo, $this->vista);
        }
    }

    public function ActualizarPro(){
        // capturo los valores enviados por post o get
            $this->model->id           = $_REQUEST['id'];
            $this->model->usuario     = $_REQUEST['usuario'];
            $this->model->email       = $_REQUEST['email'];
            $this->model->pass        = $_REQUEST['pass'];
            $this->model->roles_id  = $_REQUEST['roles_id'];
            $this->model->permanente  = $_REQUEST['permanente'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->ActualizarUsuario($this->model)){
            $texto = "Actualizó exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo, $this->vista);
        }else{
            $texto = "Ocurrio un error";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo, $this->vista);
        }
    }

    public function BorrarUse(){
        // capturo los valores enviados por post o get
        $this->model->id = $_REQUEST['id'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->BorrarUsuario($this->model)){            
            $texto = "Registro borrado exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo, $this->vista);
        }else{
            $texto = "Ocurrio un error ";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo, $this->vista);
        }
    }

  
}
?>