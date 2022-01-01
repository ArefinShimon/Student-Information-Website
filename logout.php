<?php
require ("controller/user.php");
$user = new User();

            if($user->deleteCookie()){
                header('Location: login.php');
            }else{
                header('Location: home.php');
            }
?>