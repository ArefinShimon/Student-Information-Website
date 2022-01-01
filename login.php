<?php
require ("controller/user.php");

$user = new User();

$result = "";

            if($user->checkLogin()){
              header('Location: home.php');
            }
            if(isset($_REQUEST['submit'])){
              $userName = $_REQUEST['username'];
              $password = $_REQUEST['password'];

              if(strlen($userName) > 0 && strlen($password) > 0){
                  if($user->userAuthentication($userName, $password)){
                      $user->setCookies($userName, $password);            
                      header('Location: home.php');
                  }
                  
              }else{

                  $result = "Please insert the right information";
              } 
              
              unset($_REQUEST['submit']);
              
            }

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="assets/public/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/public/js/bootstrap.bundle.min.js">
  <style>
    section {
      background-color: #11324D;
    }
  </style>

</head>

<body>

  <section>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 3rem; background-color: #0A1931;">
            <div class="row g-0">
              <div style="margin-left: 150px; margin-top: 40px;" class="col-md-6 col-lg-3 d-none d-md-block">
                <img src="assets/images/student.png" alt="login form" class="img-fluid"
                  style="border-radius: 3rem 0 0 1rem;" />
              </div>
              <div style="margin-left: 20px;" class="col-md-6 col-lg-5 d-flex align-items-center"
                action="/controller/login.php" method="get">
                <div style="background-color: rgba(241, 239, 228, 0.719); border-radius: 15%;"
                  class="card-body p-4 p-lg-5 text-black">

                  <form style="height: 450px;">

                    <div class="d-flex align-items-center mb-3 pb-1 ">
                      <i class="fas fa-cubes fa-2x me-3" style="color: blue;"></i>
                      <span class="h1 fw-bold mb-3 ">Login</span>
                    </div>
                    <div>
                      <?php
                            if(strlen($result) > 0){
                                echo '<div class="alert alert-danger" role="alert">'.$result.'</div>';
                                $result = "";
                            }
                        ?>
                    </div>


                    <div class="form-group">
                      <label for="username">Username:</label><br>
                      <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="password">Password:</label><br>
                      <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="remember-me">
                        <span>Remember me</span> <span><input id="remember-me" name="remember-me"
                            type="checkbox"></span></label><br><br>
                      <div class="text-center">
                        <input type="submit" name="submit" class="btn btn-dark btn-lg btn-block" value="Sign In">
                      </div>

                    </div>

                   

                    <a style="color: black;" href="#!">Forgot password?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register.php"
                        style="color: blue;">Register here</a></p>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

</body>

</html>