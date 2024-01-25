<?php
if(isset($_POST['login'])){
    //importing config file
    include './database/config.php';
    $inputUsername = "";
    $inputPassword="";
    $errorMsg=array();
    //first step user input validation
    if(isset($_POST['username'])){
        $inputUsername=$_POST['username'];
    }else{
        $errorMsg =["username"=>"Field required"];
    }
    if(isset($_POST['password'])){
        $inputPassword=$_POST['password'];
    }else{
        $errorMsg =["password"=>"Field required"];
    }

    //fetching data from database according to username
    $connection = doConnection();
    //response data
    $dbData =getUserByUsername($connection,$inputUsername);
}
?>