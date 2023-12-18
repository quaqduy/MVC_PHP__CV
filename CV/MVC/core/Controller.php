<?php 

    class Controller {
        function view($view,$data=[]){
            require_once("./MVC/views/layouts/pageLayout.php");
        }

        function model($model){
            require_once("./MVC/models/".$model.".php");
        }
    }

?>