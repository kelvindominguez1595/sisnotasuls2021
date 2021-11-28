<?php
class Usuarios{
    # atributos 
    private $DB; // para la conexion de la base de datos
    public $id;
    public $usuario;
    public $email;
    public $pass;
    public $roles_id;
    public $alumnoid;
    public $permanente;

    public function __CONSTRUCT(){
        try{
            $this->DB = Database::Conexion();
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    public function RegistrarUsuario($data){
         try{
            // Comando SQL
            $sql = "CALL registrar_docente(?,?,?,?)";
            // Encriptamos la contraseña con hash
            $passEncrypt = password_hash($data->pass, PASSWORD_BCRYPT);
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->usuario, $data->email, $passEncrypt, $data->permanente));
            if($resul > 0){ 
                return true;
            }else{ 
                return false;
            }
         }catch(Throwable $t){
             die($t->getMessage());
        }
    }

    public function RegistrarAlumno($data){
        try{
           // Comando SQL
           $sql = "CALL registrar_cuentaalumno(?,?,?,?)";
           // Encriptamos la contraseña con hash
           $passEncrypt = password_hash($data->pass, PASSWORD_BCRYPT);
           // COMENZAMOS LA CONEXION CON PDO
           $pre = $this->DB->prepare($sql);
           $resul = $pre->execute(array($data->usuario, $data->email, $passEncrypt, $data->alumnoid));
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
    public function ListarUsuarios(){
        try{        
            $commd = $this->DB->prepare("CALL listar_usuarios()");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Metodo para obtener un registro en especifico
    public function obtenerRegistro($id){
        try{        
            $commd = $this->DB->prepare("CALL datos_docentes(?)");
            $commd->execute(array($id));
            return $commd->fetch(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Actualizar
    public function ActualizarUsuario($data){
        try{
            // Comando SQL
            $sql = "CALL update_usuarios(?,?,?,?,?,?)";
            // Encriptamos la contraseña con hash
            $passEncrypt = password_hash($data->pass, PASSWORD_BCRYPT);
     
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->usuario, $data->email, $passEncrypt,$data->roles_id, $data->permanente, $data->id));
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
    public function BorrarUsuario($data){
        try{
            // Comando SQL
            $sql = "CALL borrar_usuario(?)";
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
    public function SesionesMessage($texto, $tipo, $ruta){
        $_SESSION['texto'] = $texto;
        $_SESSION['tipo'] = $tipo;
        header("Location: ?view=".$ruta);
    }

}
?>