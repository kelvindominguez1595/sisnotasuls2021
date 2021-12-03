<?php
class Notas{
    # atributos 
    private $DB; // para la conexion de la base de datos
    public $id;
    public $nota;
    public $observacion;
    public $alumnoid;
    public $materiaid;

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
            $sql = "CALL guardarnotas(?,?,?)";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->nota, $data->alumnoid, $data->materiaid));
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
    public function obtenerRegistro($alumnoid, $materiaid){
        try{        
            $commd = $this->DB->prepare("CALL buscar_notas(?,?)");
            $commd->execute(array($alumnoid, $materiaid));
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Actualizar
    public function actualizar($data){
        try{
            // Comando SQL
            $sql = "CALL update_notas(?,?,?)";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->id, $data->nota, $data->observacion));
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
            $sql = "CALL borrar_nota(?)";
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
            $params = "Notas";
        }
        header("Location: ?view=".$params);
    }

    function randomColor(){
        $str = "#";
        for($i = 0 ; $i < 6 ; $i++){
        $randNum = rand(0, 15);
        switch ($randNum) {
        case 10: $randNum = "A"; 
        break;
        case 11: $randNum = "B"; 
        break;
        case 12: $randNum = "C"; 
        break;
        case 13: $randNum = "D"; 
        break;
        case 14: $randNum = "E"; 
        break;
        case 15: $randNum = "F"; 
        break; 
        }
        $str .= $randNum;
        }
        return $str;
    }

    // obtener registro 
    public function ListarMatalumnos($data){
        try {
            $commd = $this->DB->prepare("CALL listar_materiasusuario(?)");
            $commd->execute(array($data));
            return $commd->fetchAll(PDO::FETCH_OBJ);
        } catch(Throwable $t) {
            die($t->getMessage());
        }
    }

    // obtener la cantidad  de notas calificadas 
    public function CountNotas($alumid, $mateid){
        try {
            $commd = $this->DB->prepare("CALL countnotasalumnos(?,?)");
            $commd->execute(array($alumid, $mateid));
            return $commd->fetch(PDO::FETCH_OBJ);
        } catch(Throwable $t) {
            die($t->getMessage());
        }
    }
    // obtener los valores de la nota 
    public function ValNotas($alumid, $mateid){
        try {
            $commd = $this->DB->prepare("CALL notasEstudiantes(?,?)");
            $commd->execute(array($alumid, $mateid));
            return $commd->fetchAll(PDO::FETCH_OBJ);
        } catch(Throwable $t) {
            die($t->getMessage());
        }
    }
}
?>