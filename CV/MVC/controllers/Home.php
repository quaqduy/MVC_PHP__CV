<?php 

    class Home extends Controller{

        public function __construct() {
        }

        public function index(){
            $this->view('home',[
                'name'=> 'aaaaaa'
            ]);
        }

        function login(){
            echo "login";
        }
    }

?>