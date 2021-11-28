<?php
// importamos nuestro modelo
require_once 'Model/Alumnos.php';
require_once 'Model/Grados.php';
require_once 'Model/Secciones.php';
require_once 'Model/Usuarios.php';

class AlumnosController{
    // para accender al modelo y sus atributos
    private $model;
    private $modelgrado;
    private $modelseccion;
    private $modeluser;

    // Constructos
    public function __CONSTRUCT(){
        $this->model = new Alumnos();
        $this->modelseccion = new Secciones();
        $this->modelgrado = new Grados();
        $this->modeluser = new Usuarios();
    }

   /** Inicio de llamado de la vistas */
    public function Index(){
        require_once 'views/backend/header.php';
        require_once 'views/backend/alumnos/index.php';
        require_once 'views/backend/footer.php';
    }
    public function Nuevo(){
        $id = $_REQUEST['id'];
        require_once 'views/backend/header.php';
        require_once 'views/backend/alumnos/crear.php';
        require_once 'views/backend/footer.php';
    }

    public function Editar(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        // crear el metodo para listar un dato especifico
        $data = $this->model->obtenerRegistro($id);
        require_once 'views/backend/header.php';
        require_once 'views/backend/alumnos/editar.php';
        require_once 'views/backend/footer.php';
    }
    public function Borrar(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        require_once 'views/backend/header.php';
        require_once 'views/backend/alumnos/borrar.php';
        require_once 'views/backend/footer.php';
    }
    /** Fin de llamado de la vistas */

    /** Metodos CRUD */    
    public function Registrar(){
        // capturo los valores enviados por post o get
        $this->model->nombres = $_REQUEST['nombres'];
        $this->model->apellidos = $_REQUEST['apellidos'];
        $this->model->genero = $_REQUEST['genero'];
        $this->model->fechanac = $_REQUEST['fechanac'];
        $this->model->matriculaid = $_REQUEST['matriculaid'];
        $this->model->seccionid = $_REQUEST['seccionid'];
        $this->model->gradoid = $_REQUEST['gradoid'];
        $this->model->gradoid = $_REQUEST['gradoid'];
        

            $this->modeluser->usuario     = $_REQUEST['nombres'];
            $this->modeluser->email       = $_REQUEST['email'];
            $this->modeluser->pass        = $_REQUEST['pass'];


         // utilizamos el metodo de guardar de SQL
         $res = $this->model->Registrar($this->model);
        if($res){
            $this->modeluser->alumnoid  = $res;
            if($this->modeluser->RegistrarAlumno($this->modeluser)){
                $texto = "Registro exitosamente";
                $tipo = "success";
                $this->model->SesionesMessage($texto, $tipo);
            }else {
                $texto = "Ocurrio un error";
                $tipo = "error";
                $this->model->SesionesMessage($texto, $tipo);
            }
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