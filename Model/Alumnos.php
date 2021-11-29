<?php
class Alumnos{
    # atributos 
    private $DB; // para la conexion de la base de datos
    public $id;
    public $nombres;
    public $apellidos;
    public $genero;
    public $fechanac;
    public $matriculaid;
    public $seccionid;
    public $gradoid;

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
            $sql = "CALL registrar_alumnos(?,?,?,?,?,?,?)";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->nombres, $data->apellidos, $data->genero, $data->fechanac, $data->matriculaid, $data->seccionid, $data->gradoid));
            $temp = $pre->fetch(PDO::FETCH_ASSOC);
            $idRespuesta=0;
            foreach ($temp as $key => $value) {
                $idRespuesta = $value;
            }
            if($resul > 0){ 
                return $idRespuesta;
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
            $commd = $this->DB->prepare("CALL listar_secciones()");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Metodo para obtener un registro en especifico
    public function obtenerRegistro($id){
        try{        
            $commd = $this->DB->prepare("CALL search_alumno(?)");
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
            $sql = "CALL actualizar_alumnos(?,?,?,?,?,?,?)";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->id, $data->nombres, $data->apellidos, $data->genero, $data->fechanac, $data->seccionid, $data->gradoid));
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
            $sql = "CALL eliminar_secciones(?)";
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
        header("Location: ?view=Matriculas");
    }

}
?>