<?php 
	require_once 'core/init.php';
    $user = new Inventor();
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
  
</head>
<body>
  <div class="container-fluid">

  <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Do youy really want to logout?</h4>
      </div>
      <div class="modal-footer">
        <a href = "logout.php"><button type="button" class="btn btn-default" id="modal-btn-si">Yes</button></a>
        <a href = "index.php"><button type="button" class="btn btn-primary" id="modal-btn-no">No</button></a>
      </div>
    </div>
  </div>
</div>



    <div class="row heading">
      <div class="container">
        <div class="col-md-3 col-sm-6">
          <img src="img/best.png">
        </div>
      </div>
    </div>

  <div class="row">
  <br>
  <?php if(Session::exists('edit')){
            echo Session::flash('edit');
          } ?>


      <div class="col-md-4">
          <div class="box">
          <img id="profile" src="img/img_avatar.png" alt="Avatar">
          <h1><?php echo escape($user->data()->firstname)." ".escape($user->data()->lastname) ?></h1>
                
          <h3>Inventor</h3>
          <br>      
          <div class ="main-container">
                  <p>I am interested in <strong><?php echo escape($user->data()->categories) ?><strong></p>
                  
                  <p><i class="fa fa-home info"></i><?php echo escape($user->data()->address)?></p>
                  
                  <p><i class="fa fa-envelope info"></i> <?php echo escape($user->data()->email)?></p>
                  
                  <p><i class="fa fa-phone info"></i> <?php echo escape($user->data()->phonenumber)?></p>

                  
                  <div class="bio">
                  <p><?php echo "\" ".escape($user->data()->bio)." \"" ?></p></div>
          </div>
          </div>          
      </div>
      <div class="col-md-8">
        <div class="row">
            <a href="inventoredit.php"><button id="update"><i class="fas fa-user-edit"></i>  Edit account</button></a>
            <a href="changepassword.php" ><button id="update"><i class="fas fa-user-password"></i>  Edit password</button></a>
            <a href="#"><button name="comment"><i class="fas fa-eye"></i>  View posts</button></a>
            <button name="logout" id="btn-confirm"><i class="fas fa-sign-out-alt"></i> logout</button>
            <a href="delete.php"><button name="delete"><i class="fas fa-user-slash"></i>  Delete account</button></a>
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

<script>

var modalConfirm = function(callback){
  
  $("#btn-confirm").on("click", function(){
    $("#mi-modal").modal('show');
  });

  $("#modal-btn-si").on("click", function(){
    callback(true);
    $("#mi-modal").modal('hide');
  });
  
  $("#modal-btn-no").on("click", function(){
    callback(false);
    $("#mi-modal").modal('hide');
  });
};

modalConfirm(function(confirm){
  if(confirm){
    
  }else{
    
  }
});

</script>
</body>
</html>

