<?php  

    class Project extends Controller{
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            //use model
            $projectModel = $this->model('projectModel');
            $projects = $projectModel->readProject();
            $this->view("project",[
                'isLogin'=>$this->isLogin,
                'projects'=>$projects
            ]);
        }

        function create(){
            //use model
            $projectModel = $this->model('projectModel');
            $projects = $projectModel->create();
            
            header('location: /MVCPHP/CV/Project');
        }

        function delete($id){
            //use model
            $projectModel = $this->model('projectModel');
            $projects = $projectModel->delete($id);
            
            header('location: /MVCPHP/CV/Project');
        }

        function edit($id){
            if(isset($_POST['title'])){
                //use model
                $projectModel = $this->model('projectModel');
                $projectObj = new projectObj(
                    $id,
                    '',
                    $_POST['title'],
                    $_POST['des'],
                    $_POST['linkProduct'],
                    $_POST['linkCode']);
                $projects = $projectModel->edit($projectObj);
                header('location: /MVCPHP/CV/Project');
            }
        }

        function update_project_image(){
            //use model
            $projectModel = $this->model('projectModel');
            $id_project_own_img = $_POST['id'];
            $pathImg = $this->uploadImg();
            $projectModel->updateImgPath($id_project_own_img, $pathImg);

            header('location: /MVCPHP/CV/Project');
        }

        function uploadImg(){
            $id_project_own_img = $_POST['id'];
            $uploadDir = "./MVC/public/img/projectImgs/";
            $originalFileName = $_FILES['projectImg']['name'];
            $fileExtension = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
            $uploadOk = 1;

            $allowedFormats = array("jpg", "jpeg", "png", "gif");
            if (!in_array($fileExtension, $allowedFormats)) {
                $uploadOk = 0;
            }

            $uploadedFile = $uploadDir . $id_project_own_img . '.jpg';

            if ($uploadOk) {
                if (move_uploaded_file($_FILES['projectImg']['tmp_name'], $uploadedFile)) {
                    return $uploadedFile;
                } else {
                    return 0;
                }
            }
        }
    }

?>