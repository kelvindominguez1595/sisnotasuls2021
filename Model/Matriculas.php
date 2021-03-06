<?php
class Matriculas{
    # atributos 
    private $DB; // para la conexion de la base de datos
    public $id;
    public $nombre;
    public $apellido;
    public $parentesco;
    public $telefono;
    public $direccion;

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
            $sql = "CALL matriculas_insert(?,?,?,?,?)";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->nombre, $data->apellido,  $data->direccion, $data->parentesco, $data->telefono));
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
            $commd = $this->DB->prepare("CALL listar_alumnosdocentes(?)");
            $commd->execute(array($_SESSION['user_id']));
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Metodo para obtener un registro en especifico
    public function obtenerRegistro($id){
        try{        
            $commd = $this->DB->prepare("CALL search_matriculas(?)");
            $commd->execute(array($id));
            return $commd->fetch(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    public function obtenerZona($id){
        try{        
            $commd = $this->DB->prepare("CALL search_direalumnos(?)");
            $commd->execute(array($id));
            return $commd->fetch(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    public function obtenerUsu($id){
        try{        
            $commd = $this->DB->prepare("CALL sear_useralumno(?)");
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
            $sql = "CALL actualizar_matriculas(?,?,?,?,?,?)";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->id, $data->nombre, $data->apellido, $data->direccion, $data->parentesco, $data->telefono));
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
    public function SesionesMessage($texto, $tipo, $params){
        $_SESSION['texto'] = $texto;
        $_SESSION['tipo'] = $tipo;
        if($params != ""){
            $params;
        } else {
            $params = "Matriculas";
        }
        header("Location: ?view=".$params);
    }

}
?>