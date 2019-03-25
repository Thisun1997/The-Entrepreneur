<?php
session_start();
include 'dbh.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Chat theme example</title>
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
    
    
    
    
    
    
    

	<div class="chatbox">
        
        <?php $sql = "SELECT * FROM posts";
					$result = $conn->query($sql);
				
					if($result->num_rows >0){
						while($row = $result->fetch_assoc()){
							//echo $_SESSION['name'];
							//echo "" .$row["name"];
                            
                            <div class="chatlogs">
                                if($_SESSION['name'] == "" .$row["name"]){
                                    <div class="chat self">
				                        <div class="user-photo"></div>
				                        <p class="chat-message">
					                       echo "" .$row["name"]. " " .": " .$row["msg"]. "<br>";
				                        </p>	

			                     </div>
                                    
                                }
                                
                                </div>
                            
						    if($_SESSION['name'] == "" .$row["name"]){
                                
                                
                                // set other user profile name
                                
							echo "" .$row["name"]. " " .": " .$row["msg"]. "<br>"; //." --" .$row["data"]
							echo "<br>";
						    }
						}
					}else{
						echo "Start your convesation";
					}
					$conn->close();
					?>
        
        
        
        
        
        
        
        
        
        
		<div class="chatlogs">
			<div class="chat friend">
				<div class="user-photo"></div>
				<p class="chat-message">What's up, Brother ..!!</p>	
			</div>
			
			<div class="chat self">
				<div class="user-photo"></div>
				<p class="chat-message">
					
				</p>	

			</div>
			
            <div class="chat friend">
				<div class="user-photo"></div>
				<p class="chat-message">What's up, Brother ..!!</p>	
			</div>
			
		</div>

        
        
        <form method="post" action="send.php">
    
        <textarea name="msg" placeholder= "Type to send message...." 
        class="form-control"></textarea><br>
        <input type="submit" value="Send">    
        </form>
        
        
        
	</div>

	

</body>
</html>