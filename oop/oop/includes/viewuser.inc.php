
<?php
class ViewUser extends Dbh{
   

    public function showAllUsers(){
        $datas = $this->getAllUsers();
        foreach($datas as $data){
            echo "user name is :" .$data['username']."<br>";
            echo "password is :".$data['password']."<br>";
        }
    }
   
    public function getMessage(){

        $sql = "SELECT * FROM posts";
        $result = $this->connect()->query($sql);
    
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                //echo $_SESSION['name'];
                //echo "" .$row["name"];
             //   if($_SESSION['name'] == "" .$row["name"]){   set other user profile name
                echo "" .$row["firstname"]. " " .": " .$row["msg"]. "<br>"; //." --" .$row["data"]
                echo "<br>";
               // }
            }
            }else{
            echo "Start your convesation";
            }
        $this->connect()->close();
           

    
    }
    
    

}
?>