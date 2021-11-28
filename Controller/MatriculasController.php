<?php
// importamos nuestro modelo
require_once 'Model/Matriculas.php';
require_once 'Model/Direcciones.php';

class MatriculasController{
    // para accender al modelo y sus atributos
    private $model;
    private $modeldire;

    // Constructos
    public function __CONSTRUCT(){
        $this->model = new Matriculas();
        $this->modeldire = new Direcciones();
    }

   /** Inicio de llamado de la vistas */
    public function Index(){
        require_once 'views/backend/header.php';
        require_once 'views/backend/matriculas/index.php';
        require_once 'views/backend/footer.php';
    }
    public function Nuevo(){
        require_once 'views/backend/header.php';
        require_once 'views/backend/matriculas/crear.php';
        require_once 'views/backend/footer.php';
    }

    public function Editar(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        // crear el metodo para listar un dato especifico
        $data = $this->model->obtenerRegistro($id);
        $dire = $this->model->obtenerZona($id);
        $datauuser = $this->model->obtenerUsu($id);
        require_once 'views/backend/header.php';
        require_once 'views/backend/matriculas/editar.php';
        require_once 'views/backend/footer.php';
    }
    public function Borrar(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        require_once 'views/backend/header.php';
        require_once 'views/backend/matriculas/borrar.php';
        require_once 'views/backend/footer.php';
    }
    /** Fin de llamado de la vistas */

    /** Metodos CRUD */    
    public function Registrar(){
        // capturo los valores enviados por post o get
        $this->model->nombre = $_REQUEST['nombre'];
        $this->model->apellido = $_REQUEST['apellido'];
        $this->model->parentesco = $_REQUEST['parentesco'];
        $this->model->telefono = $_REQUEST['telefono'];
        $this->model->direccion = $_REQUEST['direccion'];
        $zona = $_REQUEST['zona'];

        // utilizamos el metodo de guardar de SQL
        $res = $this->model->Registrar($this->model);
        if($res){
           // echo $res;
            $params = "Alumnos&action=Nuevo&id=".$res."&zona=".$zona;
            $texto = "Registro exitosamente";
            $tipo = "success";
           $this->model->SesionesMessage($texto, $tipo, $params);
        }else{
             $params = "";
            $texto = "Ocurrio un error";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo, $params);
        }
    }

    public function Actualizar(){
        // capturo los valores enviados por post o get
        $this->model->id = $_REQUEST['id'];
        $this->model->nombre = $_REQUEST['nombre'];
        $this->model->apellido = $_REQUEST['apellido'];
        $this->model->parentesco = $_REQUEST['parentesco'];
        $this->model->telefono = $_REQUEST['telefono'];
        $this->model->direccion = $_REQUEST['direccion'];

        // utilizamos el metodo de guardar de SQL
        if($this->model->actualizar($this->model)){
             $params = "";
            $texto = "Actualizó exitosamente";
            $tipo = "success";
            $this->modeldire->id = $_REQUEST['idzona'];
            $this->modeldire->zona = $_REQUEST['zona'];
            $this->modeldire->direccion = "-";
            $this->modeldire->telefono = "-";
            $this->modeldire->usuarioid = $_REQUEST['idusuario'];
            if($_REQUEST['idzona'] == "no"){
                $this->modeldire->Registrar($this->modeldire);
            }else{
                $this->modeldire->Actualizar($this->modeldire);
            }
            $this->model->SesionesMessage($texto, $tipo, $params);
        }else{
             $params = "";
            $texto = "Ocurrio un error";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo, $params);
        }
    }

    public function BorrarId(){
        // capturo los valores enviados por post o get
        $this->model->id = $_REQUEST['id'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->delete($this->model)){   
             $params = "";         
            $texto = "Registro borrado exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo, $params);
        }else{
            $params = "";
            $texto = "Ocurrio un error ";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo, $params);
        }
    }


}
?>