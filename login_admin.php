<!DOCTYPE html>
<html>
<head>
  <title>Admin-info</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <!-- JQuery -->
   <div>
   <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>

  </div>
</nav>
<!-- Centered Tabs -->
</div>
<div style="margin-top: 90px; width: 15%;height: 70%; margin-left: 10%;">
  <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title"><center>Authentification(admin):</center></div>
                       
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="POST" action="">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder=" email" required="">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required="">
                                    </div>
                    

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <input type="submit" id="btn-login"  class="btn btn-success" name="Login">
                                  
                                    </div>
                                </div>
    
                            </form>     



                        </div>    
                                        
                    </div>  
        </div>
      

               
               
                
         </div> 
    </div>
<?php 
#debut------code-------login#
session_start();
  
if((isset($_POST['email']))&&(isset($_POST['password']))&&(isset($_POST['Login'])))
{
    $email=$_POST["email"];
    $pass=$_POST["password"];
include("par.php");
    $records = $bdd->prepare('SELECT * FROM  admin WHERE email_admin = :email');
            $records->bindParam(':email', $email);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);
            $passn=$results['mot-passe'];
            if((count($results) > 0) && ($pass==$passn)){
                $_SESSION['id_admin'] = $results['id_admin'];

                header('location:admin.php');
               // echo "b1 entrer";
                
            }else{
              //  sleep(4);
                echo '<div style="float:left; margin-left:515px;" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Attention!</strong> Votre mot de passe ou email n est pas correct !!.
</div>
';

            }

}
else{ #echo "les champs sont vide"; echo "string";
}
$bdd=null;
 ?>

</body>
</html>