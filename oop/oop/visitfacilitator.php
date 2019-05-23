<?php 
	require_once 'core/init.php';
    
    
        $user = new Facilitator(Input::get('user'));
        
        if(!$user->findType(Input::get('user'))){
            //Redirect::to("index.php");
            echo Input::get('user');
        }
        else{
            $data = $user->data();
            if(isset($_POST["msg"])){
              $firstname = $user->data()->firstname;
              Redirect::to("message.php?user={$firstname}");
            }
        }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Facilitator account</title>
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
<div class="conatiner">
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
</div>

  <div class="container-fluid">
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
          <h1><?php echo escape($user->data()->firstname)." ".escape($user->data()->lastname); ?></h2>
                <h3></h1>
          <h3>Facilitator</h3>
          <br>      
          <div class ="main-container">
                  <p>I am interested in <strong><?php echo escape($user->data()->categories); ?><strong></p>
                  
                  <p><i class="fa fa-home info"></i>    <?php echo escape($user->data()->address); ?></p>
                  
                  <p><i class="fa fa-envelope info"></i> <?php echo escape($user->data()->email); ?></p>
                  
                  <p><i class="fa fa-phone info"></i> <?php echo escape($user->data()->phonenumber); ?></p>

                  
                  <div class="bio">
                  <p><?php echo "\" ".escape($user->data()->bio)." \"" ?></p></div>
          </div>
          </div>          
      </div>
      <div class="col-md-8">
        <div class="row">
        <form method="post">
            <button type="submit" name="msg"><i class="fas fa-envelope"></i>  message</button>
        </form>
        </form>
      </div>
        <div class="row">
          <div class="container tabs">
            <h2>What I have done</h2>
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#home">Posts commented</a></li>
              <li><a data-toggle="tab" href="#menu1">Posts with set flags</a></li>
              <li><a data-toggle="tab" href="#menu2">Posts with offers</a></li>
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
    function fun(){
    window.alert("Succssfully logged out.");
  }

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

