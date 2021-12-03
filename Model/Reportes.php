<?php
class Reportes{
    # atributos 
    private $DB; // para la conexion de la base de datos
    public $id;
    public $nombre;
    public $descripcion;

    public function __CONSTRUCT(){
        try{
            $this->DB = Database::Conexion();
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    public function PlazasDocentes(){
        try{
            $commd =  $this->DB->prepare("SELECT * FROM vista_tipo_plaza");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }



    // Metodo para obtener un registro en especifico
    public function MateriasDocente(){
        try{        
            $commd = $this->DB->prepare("SELECT * FROM vista_materias_docente");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    public function MejoresPromedios(){
        try{        
            $commd = $this->DB->prepare("SELECT * FROM vista_mayor_promedio");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    public function AlumnosReprobados(){
        try{        
            $commd = $this->DB->prepare("SELECT * FROM vista_alumnos_reprobados");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    public function ZonaRural(){
        try{        
            $commd = $this->DB->prepare("SELECT * FROM vista_alumnos_rural");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

   
 

}
?>