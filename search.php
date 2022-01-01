<?php
require ("controller/user.php");
require ("controller/Search.php");

$user = new User();
$search = new Search();

                if(!$user->checkLogin()){
                    header('Location: login.php');
                }

$page = "Search";


                if(isset($_REQUEST['submit'])){
                    $search_key = $_REQUEST['search_key'];

                    if(strlen($search_key) > 0){
                        $list_data = $search->getSeacredStudentList($search_key);

                    }else{

                        $result = "Please insert the right information";
                    }

                    unset($_REQUEST['submit']);

                }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Search</title>
    <style>
        body {
            background-color: #02475E;
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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #11324D;">
        <div class="container-fluid">
            <a style="color: white;" class="navbar-brand" href="#">Student Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="register.php">Register</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a style="color: white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Update Information
                        </a>
                        <ul style="background-color: cornflowerblue;" class="dropdown-menu"
                            aria-labelledby="navbarDropdown">
                            <li><a style="color: #fff;" class="dropdown-item" href="#">Basic Information</a></li>
                            <li><a style="color: #fff;" class="dropdown-item" href="#">Class Routine Update</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"></a></li>
                        </ul>
                    </li>

                    <li class="nav-item">

                        <a style="color: white;" class="nav-link" href="search.php">Search</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="logout.php">Log Out</a>
                    </li> -->
                </ul>
                <form class="d-flex">
                    <ul>
                        <li class="nav-item">
                            <a style="color: white;" class="nav-link" href="logout.php">Log Out</a>
                        </li>
                    </ul>

                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                    <!-- <button onclick="document.location='search.php'" class="btn btn-outline-success" type="submit">Search</button> -->
                </form>
            </div>
        </div>
    </nav>


    <!--Search Box-->
    <div class="container mt-5 mb-3">
        <form method="post" action="">
            <div class="row justify-content-center align-items-center mb-3">
                <div class="col-4">
                    <input type="text" class="form-control p-2" name="search_key" placeholder="Search anything..." />
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-4 text-center">
                    <input class="btn btn-primary" type="submit" name="submit" value="Search" />
                </div>
            </div>
        </form>

    </div>

    <!------ Main part ---------->


    <section>
        <div style="margin-bottom: 100px ; background-color: #02475E;" class="team-boxed">
            <div class="container">
                <div class="intro">
                    <h2 style="color: white;" class="text-center">Student Information</h2>

                </div>
                <div style="background-color: #5F939A; border-radius: 30px;" class="row people">

                    <?php
            if(isset($list_data)){
                 if(sizeof($list_data) > 0){
                    for ($i=0; $i<sizeof($list_data); $i++) {
                     ?>

                    <div class="col-md-6 col-lg-12 item">
                        <a href="user_details.php?id=<?php echo $list_data[$i]['id']; ?>"
                            style="text-decoration: none; color: black;">
                            <section>
                                <div style="border-radius: 15%; background-color: #0A1931;" class="box"><img
                                        class="rounded-circle"
                                        src="assets/images/<?php echo $list_data[$i]['image']; ?>">
                                    <h6 style="color: white;" class="mb-0">
                                        <?php echo $list_data[$i]['name']; ?>
                                    </h6> <span style="color: white;">
                                        <?php echo $list_data[$i]['std_id']; ?>
                                    </span>
                                    </br>
                                    </h6> <span style="color: white;">
                                        <?php echo $list_data[$i]['email']; ?>
                                    </span>
                                    <p style="color: white;" class="description">Department <br> of <br> Computer
                                        Science and Engineering <br>
                                        Daffodil International University </p>
                                </div>
                            </section>
                    </div>
                    <?php }
        
                    }
                }
    
                    ?>
                </div>
            </div>
        </div>

    </section>

    <footer class="text-center text-white" style="background-color: #45637d;">

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright By:
            <a class="text-white" href="https://sites.google.com/diu.edu.bd/arefinshimon/home"> <span> Abu
                    Shahed(183-15-12000)</span></a>
        </div>
        <!-- Copyright -->
    </footer>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>