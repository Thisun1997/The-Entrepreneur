<?php 
	require('functions.php');
  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inventor account</title>
  <meta charset="utf-8">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/profile.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="http://use.fontawesome.com/d1341f9b7a.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" rel="stylesheet">
  <script>
  function fun(){
    window.alert("Succssfully logged out.");
  }
</script>
</head>
<body>
  <div class="container-fluid">
    <div class="row heading">
      <div class="container">
        <div class="col-md-3 col-sm-6">
          <img src="img/best.png">
        </div>
      </div>
    </div>


  <?php if(isset($_SESSION['success'])): ?>
			<div class='error success'>
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
	<?php endif ?>

	<?php  if (isset($_SESSION['email'])) : 
			$userdata = getInventorData($_SESSION['email']);
      ?>
      

  <div class="row">
      <div class="col-md-4">
          <div class="box">
          <h1><?php echo $userdata['firstname']." ".$userdata['lastname'] ?></h2>
                <h3></h1>
          <h3>Inventor</h3>
          <br>      
          <div class ="main-container">
                  <p>I am interested in <strong><?php echo $userdata['categories'] ?><strong></p>
                  
                  <p><i class="fa fa-home info"></i>    <?php echo $userdata['address']?></p>
                  
                  <p><i class="fa fa-envelope info"></i> <?php echo $userdata['email']?></p>
                  
                  <p><i class="fa fa-phone info"></i> <?php echo $userdata['phone-number']?></p>

                  
                  <div class="bio">
                  <p><?php echo "\" ".$userdata['bio']." \"" ?></p></div>
          </div>
          </div>          
      </div>
      <div class="col-md-8">
        <div class="row">
            <a href="inventoredit.php?edit=<?php echo $userdata['email']; ?>" ><button id="update"><i class="fas fa-user-edit"></i>  Edit account</button></a>
            <A href="#"><button name="comment"><i class="fas fa-eye"></i>  View posts</button></A>
            <a href="logout.php" onclick="fun()"><button name="logout"><i class="fas fa-sign-out-alt"></i> logout</button></a>
            <a href="delete.php?del=<?php echo $userdata['email']; ?>"><button name="delete"><i class="fas fa-user-slash"></i>  Delete account</button></a>
      </div>
        <div class="row">
          <div class="container tabs">
            <h2>What I have done</h2>
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#home">Posts I have posted</a></li>
              <li><a data-toggle="tab" href="#menu1">Posts on negotiation</a></li>
              <li><a data-toggle="tab" href="#menu2">Posts I have taken offers</a></li>
            </ul>
            <div class="tab-content">
              <div id="home" class="tab-pane fade in active">
                <h3>0 posts</h3>
                <p> </p>
              </div>
              <div id="menu1" class="tab-pane fade">
                <h3>0 posts</h3>
                <p></p>
              </div>
              <div id="menu2" class="tab-pane fade">
                <h3>0 posts</h3>
                <p></p>
              </div>
            </div>
          </div>  
          <div>  
  </div>
</div>
</div>

<?php endif ?>

</body>
</html>

