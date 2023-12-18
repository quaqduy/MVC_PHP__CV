<?php  

    class Project extends Controller{
        public function __construct(){

        }

        public function index(){
            $this->view("project",[
                "title"=> "",""=> ""
            ]);
        }
    }

?>