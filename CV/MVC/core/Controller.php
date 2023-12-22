<?php 

    class Controller {
        protected $isLogin = false;

        public function __construct() {
            if(isset($_SESSION['password']) && $_SESSION['password'] != ''){
                $this->isLogin = true;
            }
        }

        function view($view,$data=[]){
            require_once("./MVC/views/layouts/pageLayout.php");
        }

        function model($model){
            require_once("./MVC/models/".$model.".php");
            return new $model();
        }
    }

?>