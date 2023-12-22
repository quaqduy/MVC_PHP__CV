<?php 

    class Home extends Controller{
        public function __construct() {
            parent::__construct();
        }

        public function index(){
            //use model to modify DB
            $cvContentModel = $this->model('cvContentModel');
            $contents = $cvContentModel->getContents();

            $this->view('home',[
                'isLogin'=>$this->isLogin,
                'contents'=>$contents
            ]);
        }

        function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //use model to modify DB
                $accountModel = $this->model('accountModel');
                $password = $accountModel->getPassword();

                //Check if password is correct
                $errorContent = '';
                if($_POST['password'] == $password){
                    $_SESSION['password'] = $_POST['password'];
                    header('location: /MVCPHP/CV');
                }else{
                    $errorContent = 'This password is incorrect please try again.';
                    //render view
                    $this->view('home',[
                        'isLogin'=>$this->isLogin,
                        "errorContent"=>$errorContent
                    ]);
                }
            }else{
                header('location: /MVCPHP/CV');
            }
        }

        function logout(){
            session_destroy();
            header('location: /MVCPHP/CV');
        }

        function create($objectClass){
            //use model to modify DB
            $cvContentModel = $this->model('cvContentModel');
            $contentObj = new $objectClass(0,'New content here');

            $cvContentModel->create($objectClass,$contentObj);
            header('location: /MVCPHP/CV');
        }

        function update($objectClass,$id){
            //use model to modify DB
            $newContent = $_POST['newContent'];
            $cvContentModel = $this->model('cvContentModel');
            $contentObj = new $objectClass($id,$newContent);

            $cvContentModel->update($objectClass,$contentObj);
            header('location: /MVCPHP/CV');
        }

        function delete($objectClass,$id){
            //use model to modify DB
            $cvContentModel = $this->model('cvContentModel');
            $contentObj = new $objectClass($id,  '');

            $cvContentModel->delete($objectClass,$contentObj);
            header('location: /MVCPHP/CV');
        }


        function update_profile_image(){
            $this->uploadImg();
            header('location: /MVCPHP/CV');
        }

        function uploadImg(){
            $uploadDir = "./MVC/public/img/";
            print_r($_FILES);
            $originalFileName = $_FILES['avatar']['name'];
            $fileExtension = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
            $uploadOk = 1;

            $allowedFormats = array("jpg", "jpeg", "png", "gif");
            if (!in_array($fileExtension, $allowedFormats)) {
                echo "Only JPG, JPEG, PNG, GIF files are allowed.";
                $uploadOk = 0;
            }

            $uploadedFile = $uploadDir . 'avatar.jpg';

            if ($uploadOk) {
                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadedFile)) {
                    echo "File has been uploaded successfully.";
                } else {
                    echo "Error uploading file.";
                }
            }
        }
    }

?>