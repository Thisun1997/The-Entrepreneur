<?php

class User extends Dbh{
   

    protected function getAllUsers(){
        $sql = "SELECT * FROM signup"; //table name
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        
        if ($numRows>0){
            #code..
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }    
        }
        return $data;
    }
    
    public function sendMessage(){
        $msg=$_POST['msg'];
        $name=$_SESSION['name'];

        if(!empty($_POST['msg'])){
            $sql="insert into posts(msg,name) values ('$msg','$name')";
            $result=$this->connect()->query($sql); 
        }
        header("Location:home.php");
    }
    
    
    public function checkUser(){
        $uname=mysqli_real_escape_string($this->connect(),$_POST['uname']);
        $pass=md5($_POST['pass']);

        $sql="SELECT * FROM signup WHERE username='$uname' AND password='$pass'";
        $result=$this->connect()->query($sql);
        
        if(!$row = $result->fetch_assoc()){
            header("Location:error.php");
        }else{
            $_SESSION['name']=$_POST['uname'];
            header("Location:Home.php") ;  
        }
        
    }
    
    
    public function signup(){
        $uname=$_POST['uname'];
        $email=$_POST['Email'];
        $pass=md5($_POST['Password']);

        $sql="insert into signup(username,email,password) values ('$uname','$email','$pass')";
        $result=$this->connect()->query($sql);
        
        header("Location:index.php");
    }
    
    
    public function logout(){
        session_start();
        session_destroy();

        header("Location:index.php");

    }

}
?>