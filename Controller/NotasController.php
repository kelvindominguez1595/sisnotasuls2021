<?php
// importamos nuestro modelo
require_once 'Model/Notas.php';
require_once 'Model/Materias.php';
require_once 'Model/Alumnos.php';

class NotasController{
    // para accender al modelo y sus atributos
    private $model;
    private $materias;
    private $alumnos;

    // Constructos
    public function __CONSTRUCT(){
        $this->model = new Notas();
        $this->materias = new Materias();
        $this->alumnos = new Alumnos();
    }

   /** Inicio de llamado de la vistas */
    public function Index(){
        require_once 'views/backend/header.php';
        require_once 'views/backend/notas/index.php';
        require_once 'views/backend/footer.php';
    }
  
    public function ListAlumnosMaterias(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        // crear el metodo para listar un dato especifico
        $alum = $this->model->ListarMatalumnos($id);
        $materia = $this->materias->obtenerRegistro($id);    
            
        require_once 'views/backend/header.php';
        require_once 'views/backend/notas/listarnotas.php';
        require_once 'views/backend/footer.php';
    }

    public function ActualizarNota(){
        // Capturamos el id enviado por get
        $alumnoid = $_REQUEST['id'];
        $materiaid = $_REQUEST['materidi'];
        $notas = $this->model->obtenerRegistro($alumnoid, $materiaid);  
        $mat = $this->materias->obtenerRegistro($materiaid);   
        $student = $this->alumnos->obtenerRegistro($alumnoid);
        require_once 'views/backend/header.php';
        require_once 'views/backend/notas/editar.php';
        require_once 'views/backend/footer.php';
    }

    public function Actualizar(){
        // capturo los valores enviados por post o get
        $materiaid = $_REQUEST['materiaid'];
        $alumnoid = $_REQUEST['alumnoid'];
        
        $this->model->id = $_REQUEST['notaid'];
        $this->model->nota = $_REQUEST['nota'];
        $this->model->observacion = $_REQUEST['observacion'];


        // utilizamos el metodo de guardar de SQL
        if($this->model->actualizar($this->model)){
            $params = "Notas&action=ActualizarNota&id=".$alumnoid."&materidi=".$materiaid;
            $texto = "Notas guardadas correctamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo, $params);
        }else{
            $params = "Notas&action=ActualizarNota&id=".$alumnoid."&materidi=".$materiaid;
            $texto = "Ocurrio un error";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo, $params);
        }
    }


    public function Borrar(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        require_once 'views/backend/header.php';
        require_once 'views/backend/notas/borrar.php';
        require_once 'views/backend/footer.php';
    }

    /** Fin de llamado de la vistas */
    public function obtenerNotas(){
        $materiaid = $_REQUEST['materiaid'];
        try {           
            $params = "Notas&action=ListAlumnosMaterias&id=".$materiaid;
            // recorremos el array muldimensional creado de las notas 
            foreach ($_REQUEST['alumnoid'] as $alumno => $value) {
                // obtengo lo identificadores de los alumnos
               // echo "<br>Este es el alumno ".$value;
                $alumnoid = $value;                
                foreach ($_REQUEST['nota'.$value] as $key => $nota) {
                    // obtengo las notas de cada estudiante
                    if(!empty($nota)){
                        $this->model->nota = $nota;
                        $this->model->alumnoid = $alumnoid;
                        $this->model->materiaid = $materiaid;
                        $this->model->Registrar($this->model);
                    }
                }    
            }
            $texto = "Notas guardadas correctamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo, $params);
        } catch (\Throwable $th) {
            //throw $th;
            $params = "Notas&action=ListAlumnosMaterias&id=".$materiaid;
            $texto = "Ocurrio un error message: ".$th;
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo, $params);
        }
    }


}
?>