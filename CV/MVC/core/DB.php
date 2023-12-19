<?php

    class DB {
        protected $conn;
        protected $servername = "localhost";
        protected $username = "root";
        protected $password = "";
        protected $dbname = "CV";

        function __construct() {
            // Create connection
            $this->conn = new mysqli($this->servername, $this->username, $this->password);
            mysqli_select_db($this->conn, $this->dbname);
            mysqli_query($this->conn,"SET NAMES 'utf8");
        }
    }

?>