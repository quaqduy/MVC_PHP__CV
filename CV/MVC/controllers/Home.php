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
            //use model to modify DB
            $accountModel = $this->model('accountModel');
            $password = $accountModel->getPassword();

            //Check if password is correct
            $errorContent = '';
            if($_POST['password'] == $password){
                $_SESSION['password'] = $_POST['password'];
            }else{
                $errorContent = 'This password is incorrect please try again.';
            }

            //render view
            $this->view('home',[
                "password"=>$password,
                "errorContent"=>$errorContent
            ]);
        }
    }

?>