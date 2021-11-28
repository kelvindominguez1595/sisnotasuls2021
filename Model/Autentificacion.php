<?php
class Autentificacion
{
    private $DB;
    // atributos de autentificación
    private $idUsuario;
    private $nombres;    
    private $direccion;    
    private $usuario;    
    private $password;    
    private $rol;
    public function __CONSTRUCT(){
        try{
            $this->DB = Database::Conexion();
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    public function Logout(){
 
        session_start();
        session_unset();
        session_destroy();
    
        // require_once 'views/login/index.php';
        $texto = "";
        $tipo = "";
        $ruta = "Home&action=Login";
        $this->SesionesMessage($texto, $tipo, $ruta);
    }
    
    public function Validacion($usuario, $clave){
        try{
            // consultamos el usuario si existe
            $userCommd = $this->DB->prepare("CALL loginauten(?)");
            $userCommd->execute(array($usuario));
            // obtenemos si el usuario existe
            $data = $userCommd->fetch(PDO::FETCH_OBJ);
            if(empty($data)){
                return "no existe"; // el usuario no existe
            }else if(password_verify($clave, $data->password)) {              
              return $data;                
            } else {
               return "error usuario"; // error en la contraseña o usuario
            }
        }catch(Throwable $e){
            die($e->getMessage());
        }
    }
    // para crear la sesión del usuario
    public function Sesion($data, $ruta){
        try{
            if($data == "no existe"){
                // Retornamos al login si no se loguea correctamente o no tieen usuario
                if (!headers_sent()) {
                //     header('Location: ?view=');
                    $texto = "El usuario utilizado no esta registrado";
                    $tipo = "danger";
                    $ruta = "Home&action=Login";
                    $this->SesionesMessage($texto, $tipo, $ruta);
                    exit;
                }
            }elseif($data == "error usuario"){
                // Retornamos al login si no se loguea correctamente o no tieen usuario
                if (!headers_sent()) {
                    $texto = "se ha equivocado en el usuario o contraseña";
                    $tipo = "danger";
                    $ruta = "Home&action=Login";
                    $this->SesionesMessage($texto, $tipo, $ruta);
                    exit;
                }
            }else{        
                $_SESSION['roles_id'] = $data->rol_id;      
                $_SESSION['user_id'] = $data->id;      
                $_SESSION['estadologueado'] = 'logueado';      
                # Entramos al admin template
                header("Location: ?view=Home");     
            
            }
        }catch(Throwable $e){
            die($e->getMessage());
        }
    }

    public function verificarAuten(){ 
        if ($_SESSION['estadologueado'] != 'logueado') {
            // header("Location: ?view=Home");    
            header("Location: ./");      
        }          
    }

    public function ValidateLoginAuht(){ 
        if (isset($_SESSION['estadologueado'])) {
             header("Location: ?view=Home");    
        }          
    }
    
    public function dataUser(){
        try{        
            $procedimiento = '';
            if($_SESSION['roles_id'] == 3){
                $procedimiento = 'datos_docentes';
            }else{
                $procedimiento = 'datos_alumnos';
            }
            $commd = $this->DB->prepare("CALL ".$procedimiento."(?)");
            $commd->execute(array($_SESSION['user_id']));
            return $commd->fetch(PDO::FETCH_OBJ);
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