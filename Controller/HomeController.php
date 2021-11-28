<?php

class HomeController{
    public function __CONSTRUCT(){

    }
    public function Login(){
        require_once 'views/backend/login/index.php';
    }

    public function Index(){        
        require_once 'views/backend/header.php';
        require_once 'views/backend/home.php';
        require_once 'views/backend/footer.php';
    }
}
?>