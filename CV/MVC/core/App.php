<?php 

    class App{
        protected $controller = "Home";
        protected $action = "index";
        protected $params = array();

        public function __construct(){
            //check login
            if(isset($_SESSION['password']) && $_SESSION['password'] != ''){
                $this->islogin = true;
            }

            //handle url to array of url item localHost::MVC/CV/a/b/c/d => [..,..,a,b,c,d]
            $arrURL = $this->processURL();
            
            if(isset($arrURL[2])){
                //Check if urlArr[2] has item initialize a new controller
                if(file_exists("./MVC/controllers/".$arrURL[2].".php")){
                    $this->controller = $arrURL[2];
                    unset($arrURL[2]);
                }
            }
            
            //initialize controller
            require_once("./MVC/controllers/".$this->controller.".php");
            $this->controller = new $this->controller;

            //initialize method of class controller if method exists
            if(isset($arrURL[3])){
                if(method_exists($this->controller, $arrURL[3])){
                    $this->action = $arrURL[3];
                    unset($arrURL[3]);
                }
            }

            //initialize params for method controller
            unset($arrURL[0]);
            unset($arrURL[1]);
            $this->params = $arrURL?array_values($arrURL):[];

            //call function in class controller
            call_user_func_array([ $this->controller, $this->action ], $this->params);
        }

        function processURL(){
            return explode("/", filter_var(trim($_SERVER["REQUEST_URI"],"/")));
        }
    }

?>