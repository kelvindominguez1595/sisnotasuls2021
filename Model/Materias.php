<?php
class Materias{
    # atributos 
    private $DB; // para la conexion de la base de datos
    public $id;
    public $materia;
    public $numeval;
    public $descripcion;
    public $docente;
    public $grado;

    public function __CONSTRUCT(){
        try{
            $this->DB = Database::Conexion();
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    public function Registrar($data){
        try{
            // Comando SQL
            $sql = "CALL materias_insert(?,?,?,?,?)";

            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->materia, $data->numeval, $data->descripcion, $data->docente, $data->grado));
            if($resul > 0){ 
                return true;
            }else{ 
                return false;
            }
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    // Metodo para listar los roles
    public function Listar(){
        try{        
            if($_SESSION['roles_id'] == 2){
                $commd = $this->DB->prepare("CALL listar_materiasdocentes(?)");
                $commd->execute(array($_SESSION['user_id']));
            } else {
                $commd = $this->DB->prepare("CALL listar_materiasadmin()");
                $commd->execute();
            }  
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Metodo para obtener un registro en especifico
    public function obtenerRegistro($id){
        try{        
            $commd = $this->DB->prepare("CALL search_materias(?)");
            $commd->execute(array($id));
            return $commd->fetch(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Actualizar
    public function actualizar($data){
        try{
            // Comando SQL
            $sql = "CALL actualizar_materias(?,?,?,?,?,?)";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->id, $data->materia, $data->numeval, $data->descripcion, $data->docente, $data->grado));
            if($resul > 0){ 
                return true;
            }else{ 
                return false;
            }
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    // Borrar
    public function delete($data){
        try{
            // Comando SQL
            $sql = "CALL eliminar_materias(?)";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->id));
            if($resul > 0){ 
                return true;
            }else{ 
                return false;
            }
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    // Para los mensajes
    public function SesionesMessage($texto, $tipo){
        $_SESSION['texto'] = $texto;
        $_SESSION['tipo'] = $tipo;
        header("Location: ?view=Materias");
    }

}
?>