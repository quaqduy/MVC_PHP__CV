<?php 

    class projectModel extends DB{
        public function readProject(){
            $projects_arr = [];
            //data from projects
            $query = "SELECT * FROM projects";
            $result = mysqli_query($this->conn,$query);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    $projects_arr[] = new projectObj($row['id'],$row['pathImg'],$row['title'],$row['des'],$row['linkProduct'],$row['linkCode']);
                }
            }
            return $projects_arr;
        }

        function create(){
            try {
                // Using prepared statements to prevent SQL injection
                $query = "INSERT INTO projects (pathImg,title,des,linkProduct,linkCode)
                          VALUES (?,?,?,?,?)";

                // SET values
                $project = new projectObj("","","","","","");
                $pathImg = $project->pathImg;
                $title = $project->title;
                $des = $project->des;
                $linkProduct = $project->linkProduct;
                $linkCode = $project->linkCode;
            
                // Prepare and execute the statement
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param("sssss", $pathImg,$title,$des,$linkProduct,$linkCode);
                $stmt->execute();
                $stmt->close();
            } catch (Exception $e) {
            }
        }

        function delete($id){
            try {
                // Using prepared statements to prevent SQL injection
                $query = "DELETE FROM projects WHERE id = ?";
            
                // Prepare and execute the statement
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('s' , $id);
                $stmt->execute();
                $stmt->close();
            } catch (Exception $e) {
            }
        }

        function edit($obj){
            try {
                // Using prepared statements to prevent SQL injection
                $query = "
                    UPDATE projects
                    SET pathImg = ?, title = ?, des = ?, linkProduct = ?, linkCode = ?
                    WHERE id = ?;
                ";
            
                // SET values
                $id = $obj->id;
                $pathImg = $obj->pathImg;
                $title = $obj->title;
                $des = $obj->des;
                $linkProduct = $obj->linkProduct;
                $linkCode = $obj->linkCode;
            
                // Prepare and execute the statement
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('ssssss' , $pathImg , $title , $des , $linkProduct , $linkCode , $id);
                $stmt->execute();

                $stmt->close();
            } catch (Exception $e) {
            }
        }

        function updateImgPath($id,$path){
            try {
                // Using prepared statements to prevent SQL injection
                $query = "
                    UPDATE projects
                    SET pathImg = ?
                    WHERE id = ?;
                ";
            
                // SET values
                $pathImg = $path;
            
                // Prepare and execute the statement
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('ss' , $pathImg , $id);
                $stmt->execute();

                $stmt->close();
            } catch (Exception $e) {
            }
        }
    }

    class projectObj{
        public $id;
        public $pathImg = '/MVCPHP/CV/MVC/public/img/projectImgs/item.png';
        public $title = 'Title here';
        public $des = 'Description here';
        public $linkProduct = 'Project here';
        public $linkCode = 'Code here';

        function __construct($id , $pathImg , $title , $des , $linkProduct , $linkCode){
            $this->id = $id;
            if($pathImg != ''){
                $this->pathImg = $pathImg;
            }
            if( $title != ''){
                $this->title = $title;
            }
            if( $des != ''){
                $this->des = $des;
            }
            if( $linkProduct != ''){
                $this->linkProduct = $linkProduct;
            }
            if($linkCode != ''){
                $this->linkCode = $linkCode;
            }
        }

        function __toString(){
            return ''.$this->id.''.$this->pathImg.''.$this->title.''.$this->des.''.$this->linkProduct.''.$this->linkCode;
        }
    }

?>