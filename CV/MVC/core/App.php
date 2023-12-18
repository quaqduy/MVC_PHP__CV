<?php 

    class App{

        protected $controller = "Home";
        protected $action = "index";
        protected $params = array();

        public function __construct(){
            //handle url to array of url item localHost::/a/b/c/d => [a,b,c,d]
            $arrURL = $this->processURL();
            
            //Check if urlArr[0] has item initialize a new controller
            if(file_exists("./MVC/controllers/".$arrURL[0].".php")){
                $this->controller = $arrURL[0];
                unset($arrURL[0]);
            }

            //initialize controller
            require_once("./MVC/controllers/".$this->controller.".php");
            $this->controller = new $this->controller;

            //initialize method of class controller if method exists
            if(isset($arrURL[1])){
                if(method_exists($this->controller, $arrURL[1])){
                    $this->action = $arrURL[1];
                    unset($arrURL[1]);
                }
            }

            //initialize params for method controller
            $this->params = $arrURL?array_values($arrURL):[];

            //call function in class controller
            call_user_func_array([ $this->controller, $this->action ], $this->params);
        }

        function processURL(){
            if(isset($_GET["url"])){
                return explode("/", filter_var(trim($_GET["url"],"/")));
            }else{
                return [];
            }
        }
    }

?>