<?php 
	require_once 'core/init.php';
    $user = new Inventor();
    if((time()-$_SESSION['last_time'])>3600):
      $user->logout();
      Session::flash('success','<div class="alert alert-danger">
                    Sorry!. Session timeout. please log in and try again.
                  </div>');
      Redirect::to('index.php');
    else:
      $_SESSION['last_time'] = time();
      if(isset($_POST["edit"])){
        Redirect::to("inventoredit.php");
      }
      elseif(isset($_POST["changepass"])){
        Redirect::to("changepassword.php");
      }
      elseif(isset($_POST["postview"])){
        Redirect::to("visitfacilitator.php?user=kalsara@gmail.com");
      }
      elseif(isset($_POST["addpost"])){
        Redirect::to("#");
      }
      elseif(isset($_POST["delete"])){
        Redirect::to("delete.php");
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>post-form</title>
  <link rel="stylesheet" href="assets/css/styles.css">

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


<div class="modal fade" role="dialog" tabindex="-1" style="height: 600px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add a new post</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body" style="width: 498px;">
                    <div class="d-inline-flex">
                        <p class="text-center" style="width: 100px;height: 36px;">Category</p>
                        <div class="dropdown"><button class="btn btn-light btn-block dropdown-toggle text-left text-primary d-inline" data-toggle="dropdown" aria-expanded="false" type="button" style="height: 36px;">Dropdown </button>
                            <div class="dropdown-menu dropdown-menu-right"
                                role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                        </div>
                    </div>
                    <div>
                        <form><textarea class="form-control" rows="8" cols="60" name="postbody" style="height: 150px;"></textarea>
                            <div style="margin-top: 10px;">
                                <p><strong>You have to upload photos</strong></p><input type="file" style="width: 200px;"><input type="file" style="width: 200px;"><input type="file" style="width: 200px;"></div>
                            <div style="margin-top: 10px;">
                                <p><strong>You have to upload a product video link</strong></p><input class="form-control" type="url"></div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Post</button></div>
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
        <form method="post">
            <button type="submit" name="edit"><i class="fas fa-user-edit"></i>  Edit account</button>
            <button type="submit" name="changepass"><i class="fas fa-user-password"></i>  Edit password</button>
            <button type="submit" name="postview"><i class="fas fa-eye"></i>  View posts</button>
            <button type="submit" name="postadd"><i class="fas fa-eye"></i>  Add posts</button>
            <button type="submit" name="delete" style="margin-top:10px"><i class="fas fa-user-slash"></i>  Delete account</button></form>
            <button name="logout" id="btn-confirm" style="margin-top:10px"><i class="fas fa-sign-out-alt"></i> logout</button>
            </form>
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
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</script>
</body>
</html>

<?php endif ?>

