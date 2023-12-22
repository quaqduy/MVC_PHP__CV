<?php

    class accountModel extends DB {

        function getPassword() {
            $query = "SELECT * FROM account";
            $result = mysqli_query($this->conn,$query);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                  return $row['password'];
                }
            } else {
                return null;
            }
        }
    }

?>