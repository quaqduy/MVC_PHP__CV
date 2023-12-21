<?php

    class cvContentModel extends DB {
        function getContents() {
            $career_objectives_arr = [];
            $educations_arr = [];
            $technical_proficiencies_arr = [];

            //data from career_objectives
            $query1 = "SELECT * FROM career_objectives";
            $result1 = mysqli_query($this->conn,$query1);
            if (mysqli_num_rows($result1) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result1)) {
                    $career_objectives_arr[] = new Career_objective($row['id'],$row['content']);
                }
            }
            
            //data from educations
            $query2 = "SELECT * FROM educations";
            $result2 = mysqli_query($this->conn,$query2);
            if (mysqli_num_rows($result2) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result2)) {
                    $educations_arr[] = new Education($row['id'],$row['content']);
                }
            } 
            
            //data from technical_proficiencies
            $query3 = "SELECT * FROM technical_proficiencies";
            $result3 = mysqli_query($this->conn,$query3);
            if (mysqli_num_rows($result2) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result3)) {
                    $technical_proficiencies_arr[] = new Technical_proficiencie($row['id'],$row['content']);
                }
            } 
            return [
                'career_objectives_arr'=>$career_objectives_arr,
                'educations_arr'=>$educations_arr,
                'technical_proficiencies_arr'=>$technical_proficiencies_arr,
            ];
        }
        function create($objectClass,$Content_objective){
            try {
                $table = '';
                if($objectClass == 'Career_objective'){
                    $table = 'career_objectives';
                }else if($objectClass == 'Education'){
                    $table = 'educations';
                }else if($objectClass == 'Technical_proficiencie'){
                    $table = 'technical_proficiencies';
                }

                // Using prepared statements to prevent SQL injection
                $query = "INSERT INTO $table (content)
                          VALUES (?)";
            
                // SET values
                $content = $Content_objective->content;
            
                // Prepare and execute the statement
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param("s", $content);
                $stmt->execute();
            
                // Check if the insertion was successful
                if ($stmt->affected_rows > 0) {
                    echo "Insert successful";
                } else {
                    echo "Insert failed";
                }
                $stmt->close();
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }

    }

    class Career_objective {
        public $id;
        public $content;

        function __construct($id,$content){ 
            $this->id = $id;
            $this->content = $content;
        }
    }

    class Education {
        public $id;
        public $content;

        function __construct($id,$content){ 
            $this->id = $id;
            $this->content = $content;
        }
    }

    class Technical_proficiencie {
        public $id;
        public $content;

        function __construct($id,$content){ 
            $this->id = $id;
            $this->content = $content;
        }
    }



?>