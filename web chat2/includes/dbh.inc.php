<?php

class Dbh {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    

    public function connect(){
        $servername = "localhost";

        $username = "root";
        $password = "";
        $dbname = "mydatabase";

        $conn =new mysqli($servername,$username,$password,$dbname);

        return $conn;
    }

}
?>