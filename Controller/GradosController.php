<?php
// importamos nuestro modelo
require_once 'Model/Grados.php';
class GradosController{
    // para accender al modelo y sus atributos
    private $model;

    // Constructos
    public function __CONSTRUCT(){
        $this->model = new Grados();
    }

   /** Inicio de llamado de la vistas */
    public function Index(){
        require_once 'views/backend/header.php';
        require_once 'views/backend/grados/index.php';
        require_once 'views/backend/footer.php';
    }
    public function Nuevo(){
        require_once 'views/backend/header.php';
        require_once 'views/backend/grados/crear.php';
        require_once 'views/backend/footer.php';
    }

    public function Editar(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        // crear el metodo para listar un dato especifico
        $data = $this->model->obtenerRegistro($id);
        require_once 'views/backend/header.php';
        require_once 'views/backend/grados/editar.php';
        require_once 'views/backend/footer.php';
    }
    public function Borrar(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        require_once 'views/backend/header.php';
        require_once 'views/backend/grados/borrar.php';
        require_once 'views/backend/footer.php';
    }
    /** Fin de llamado de la vistas */

    /** Metodos CRUD */    
    public function Registrar(){
        // capturo los valores enviados por post o get
        $this->model->nombre = $_REQUEST['nombre'];
        $this->model->descripcion = $_REQUEST['descripcion'];

        // utilizamos el metodo de guardar de SQL
        if($this->model->Registrar($this->model)){
            $texto = "Registro exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo);
        }else{
            $texto = "Ocurrio un error";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo);
        }
    }

    public function Actualizar(){
        // capturo los valores enviados por post o get
        $this->model->id = $_REQUEST['id'];
        $this->model->nombre = $_REQUEST['nombre'];

        // utilizamos el metodo de guardar de SQL
        if($this->model->actualizar($this->model)){
            $texto = "Actualizó exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo);
        }else{
            $texto = "Ocurrio un error";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo);
        }
    }

    public function BorrarId(){
        // capturo los valores enviados por post o get
        $this->model->id = $_REQUEST['id'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->delete($this->model)){            
            $texto = "Registro borrado exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo);
        }else{
            $texto = "Ocurrio un error ";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo);
        }
    }


}
?>