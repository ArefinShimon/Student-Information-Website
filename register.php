<?php
require ("controller/user.php");

$user = new User();

$result = "";

            if(isset($_REQUEST['reg_submit'])){
                $firstName = $_REQUEST['firstName'];
                $lastName = $_REQUEST['lastName'];
                $email = $_REQUEST['email'];
                $userName = $_REQUEST['username'];
                $password = $_REQUEST['password'];

                        if(strlen($firstName) > 0 && strlen($lastName) > 0 && strlen($email) > 0 &&  strlen($userName) > 0 && strlen($password) > 0){
                            
                            if($user->userAuthentication($userName, $password)){
                                $result = "User already exist";
                                
                            }else{
                                if($user->addNewUser($firstName, $lastName, $email, $userName, $password)){
                                    header('Location: login.php');
                                }else{
                                    $result = "Try again";
                                }            
                            }
                            
                        }else{

                            $result = "Please insert the right information";
                        } 
                        
                
            }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="assets/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/public/js/bootstrap.bundle.min.js">
    <style>
        .container {
            height: 100vh
        }

        .card {
            top margin: 30px;
            width: 70%;
            height: 95%;
            padding: 30px
        }

        .form {
            padding: 30px
        }

        .form-control {
            height: 30px;
            background-color: #eee
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #f50057;
            outline: 0;
            box-shadow: none;
            background-color: #eee
        }

        .inputbox {
            margin-bottom: 5px
        }

        .register {
            width: 200px;
            height: 51px;
            background-color: #f50057;
            border-color: #f50057
        }

        .register:hover {
            width: 200px;
            height: 51px;
            background-color: #f50057;
            border-color: #f50057
        }

        .login {
            color: #f50057;
            text-decoration: none
        }

        .login:hover {
            color: #f50057;
            text-decoration: none
        }

        .form-check-input:checked {
            background-color: #f50057;
            border-color: #f50057
        }

        body {
            background-color: #11324D;
        }
    </style>
</head>

<body>

    <form action="" method="post">
        <div class="container d-flex justify-content-center align-items-center">
            <div style="background-color: #316B83; border-radius: 35px;" class="card">
                <div class="row">
                    <div class="col-md-6">

                        <div class="form">
                            <h2 style="color: white;">Registration</h2>
                            <div style="color: white;" for="firstName" class="inputbox mt-3"> <span>First Name</span>
                                <input type="text" placeholder="Name" name="firstName" id="firstName"
                                    class="form-control"> </div>
                            <div style="color: white;" for="lastName" class="inputbox mt-3"> <span>Last Name</span>
                                <input type="text" placeholder="Name" name="lastName" id="lastName"
                                    class="form-control"> </div>

                            <div style="color: white;" for="email" class="inputbox mt-3"> <span>Email</span> <input
                                    type="text" placeholder="Email" name="email" id="email" class="form-control"> </div>

                            <div style="color: white;" for="username" class="inputbox mt-3"> <span>Username</span>
                                <input type="text" placeholder="Enter UserName" name="username" id="username"
                                    class="form-control"> </div>
                            <div style="color: white;" for="password" class="inputbox mt-3"> <span>Password</span>
                                <input type="text" placeholder="*******" name="password" id="password"
                                    class="form-control"> </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <input type="submit" name="reg_submit" class="btn btn-primary" value="Register" />
                            </div>

                            <div class="form-check mt-2"> <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckChecked" checked> <label style="color: white;" class="form-check-label"
                                    for="flexCheckChecked"> I agree to the terms and conditions of <a>Privacy &
                                        Policy</a>
                                </label> </div>
                            <p style="color: white;">Have already an account? <a href="login.php"
                                    class="fw-bold text-body"><u><span style="color: #EBE645;">Login Here</span></u></a>
                            </p>

                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="text-center mt-5">
                            <img src="assets/images/re.png" width="300">
                            <?php
                            if(strlen($result) > 0){
                                echo '<div class="alert alert-danger" role="alert">'.$result.'</div>';
                                $result = "";
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
</form>

</html>