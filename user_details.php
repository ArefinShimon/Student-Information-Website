<?php 
    require ("controller/user.php");
    require ("controller/Search.php");

    $user = new User();
    $search = new Search();

    if(!$user->checkLogin()){
        header('Location: login.php');
    }

    if(isset($_REQUEST['id'])) {
        $id =  $_REQUEST['id'];
        $list_data = $search->getStudentByID($id);
        $std_id = "";
        $name = "";
        $img = "";
        $email = "";
        $address = "";
        if(sizeof($list_data) > 0){
            $std_id = $list_data['std_id'];
            $name = $list_data['name'];
            $img = $list_data['image'];
            $email = $list_data['email'];
            $address = $list_data['address'];
        }
    }else{
        header('Location: home.php');
    }



$result = "";

if(isset($_REQUEST['std_update'])){
    $std_id = $_REQUEST['std_id'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];

    if(strlen($std_id) > 0 && strlen($name) > 0 && strlen($email) > 0  && strlen($address) > 0){

        if($search->updateStudentByID($id, $std_id, $name, $email, $address)){
            $result = "Updated";
        }else{
            $result = "Try again";
        }

    }else{

        $result = "Please insert the right information";
    }

    unset($_REQUEST['std_update']);

}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- font awesome for font-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <title>Student Details </title>
    <link rel="stylesheet" href="public/styles/css/bootstrap.min.css">
    <script src="public/styles/js/bootstrap.min.js"></script>
    <script src="public/styles/js/bootstrap.min.js"></script>
    <style>
       .body {
            background-color: #11324D;
        }

        .team-boxed {
            color: #313437;
            background-color: #eef4f7;
        }

        .team-boxed p {
            color: #7d8285;
        }

        .team-boxed h2 {
            font-weight: bold;
            margin-bottom: 40px;
            padding-top: 40px;
            color: inherit;
        }

        @media (max-width:767px) {
            .team-boxed h2 {
                margin-bottom: 25px;
                padding-top: 25px;
                font-size: 24px;
            }
        }

        .team-boxed .intro {
            font-size: 16px;
            max-width: 500px;
            margin: 0 auto;
        }

        .team-boxed .intro p {
            margin-bottom: 0;
        }

        .team-boxed .people {
            padding: 50px 0;
        }

        .team-boxed .item {
            text-align: center;
        }

        .team-boxed .item .box {
            text-align: center;
            padding: 30px;
            background-color: #fff;
            margin-bottom: 30px;
        }

        .team-boxed .item .name {
            font-weight: bold;
            margin-top: 28px;
            margin-bottom: 8px;
            color: inherit;
        }

        .team-boxed .item .title {
            text-transform: uppercase;
            font-weight: bold;
            color: #d0d0d0;
            letter-spacing: 2px;
            font-size: 13px;
        }

        .team-boxed .item .description {
            font-size: 15px;
            margin-top: 15px;
            margin-bottom: 20px;
        }

        .team-boxed .item img {
            max-width: 160px;
        }

        .team-boxed .social {
            font-size: 18px;
            color: #a2a8ae;
        }

        .team-boxed .social a {
            color: inherit;
            margin: 0 10px;
            display: inline-block;
            opacity: 0.7;
        }

        .team-boxed .social a:hover {
            opacity: 1;
        }
        .btn {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 15px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn:hover {
  background: #fc3c7c;
  text-decoration: none;
}

.btn1 {
  background: #262b80;
  background-image: -webkit-linear-gradient(top, #262b80, #cf40ae);
  background-image: -moz-linear-gradient(top, #262b80, #cf40ae);
  background-image: -ms-linear-gradient(top, #262b80, #cf40ae);
  background-image: -o-linear-gradient(top, #262b80, #cf40ae);
  background-image: linear-gradient(to bottom, #262b80, #cf40ae);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 15px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn1:hover {
  background: #3c5cfa;
  text-decoration: none;
}
    </style>

</head>

<body>

    <section>
        <div class="container ">
            <div class="row">
                <div class="col-md-7 offset-md-2 ">
                    <div class="card text-dark  mt-4 mb-4 p-5"
                        style="border-radius: 1%; border:  solid; background-color: #02475E;">



                        <section>
                            <div style="margin-bottom: 100px ; background-color: #02475E;" class="team-boxed">
                                <div class="container">
                                    <div class="intro">
                                        <h2 style="color: white; " class="col-md-6 col-lg-4 item">Student Details</h2>


                                    </div>

                                    <div style="background-color: #5F939A; border-radius: 30px;" class="row people">

                                        <div class="col-md-6 col-lg-4 item">

                                            <div style=" border-radius: 15%; background-color: #0A1931;" class="box">
                                                <form action="" method="post">
                                                    <div class="container text-center" >
                                                        <img class="rounded-circle"
                                                            src="assets/images/<?php echo $img; ?>" alt="" />
                                                    </div>
                                                    <!-- <h3 style="color: white;" class="name">Abu Shahed</h3> -->

                                                    <h1 style="color: white;" class="text-center">
                                                        <?php echo $name; ?>
                                                    </h1>
                                                    <div style="color: Green;">
                                                        <h1>
                                                        <?php
                                                        if(strlen($result) > 0){
                                                            echo '<div class="alert alert-danger" role="alert">'.$result.'</div>';
                                                            $result = "";
                                                        }
                                                        ?>
                                                        </h1>
                                                    </div>


                                                    <!-- id -->
                                                    <div class="mb-3 " style="color: white;">
                                                        <label for="firstName" class="form-label">ID</label>
                                                    </br>
                                                        <input name="std_id" type="text" class="form-control "
                                                            placeholder="Enter Here" id="firstName"
                                                            value="<?php echo $std_id; ?>" required>
                                                    </div>

                                                    <!--  Name -->
                                                    <div class="mb-3" style="color: white;">
                                                        <label for="lastName" class="form-label">Name</label></br>
                                                        <input name="name" type="text" class="form-control"
                                                            placeholder="Enter Here" id="lastName"
                                                            value="<?php echo $name; ?>" require>
                                                    </div>


                                                    <!--email -->
                                                    <div class="mb-3" style="color: white;">
                                                        <label for="email" class="form-label">Email</label></br>
                                                        <input name="email" type="email" class="form-control"
                                                            placeholder="Enter Here" id="email"
                                                            value="<?php echo $email; ?>" required>
                                                    </div>

                                                    <!--address -->
                                                    <div class="mb-3" style="color: white;">
                                                        <label for="address" class="form-label">Address</label></br>
                                                        <input name="address" type="text" class="form-control"
                                                            placeholder="Enter Here" id="address"
                                                            value="<?php echo $address; ?>">
                                                    </div>

                                                   
                                                    <!-- <div style="padding: 5px;">
                                                    <input type="submit" name="submit">
                                                </div> -->
                                                    <p style="color: white;" class="description">Department <br> of <br>
                                                        Computer Science and
                                                        Engineering <br> Daffodil International University </p>

                                                    <div class="container text-center mt-3">
                                                        <input type="submit" name="std_update" class="btn btn-primary"
                                                            value="submit" />
                                                    </div>

                                                </form>
                                                <form action="home.php">
                                                <div class="container text-center mt-3">
                                                        <input type="submit" name="Back to Home" class="btn1 btn-primary"
                                                            value="Back to Home" />
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                        

                                    </div>
                                </div>
                            </div>

                        </section>

                    </div>
                </div>
            </div>
    </section>


</body>

</html>