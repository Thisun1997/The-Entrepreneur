<?php

session_star();
if(isset($_SESSION['name'])){
    
    echo $_SESSION['name']; 
    
}


?>