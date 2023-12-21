<?php  

    class Project extends Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->view("project",[
                'isLogin'=>$this->isLogin
            ]);
        }
    }

?>