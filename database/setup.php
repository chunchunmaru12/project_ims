<?php
//defining database configuration
$localhost="localhost";
$user="root";
$password="";
//redirect function
function redirect(){
    header("Location: ../authentication/login.php");
};

//establishing database connection
$connection = mysqli_connect($localhost,$user,$password);
//here $connection is the connection object
if(!$connection){
die("Could not connect to database");
}else{
    function createConnection($param_host,$param_user,$param_password,$param_db){
        $connection = mysqli_connect($param_host,$param_user,$param_password,$param_db);
        return $connection;
    };
    function executeQuery($connection,$sql){
        $status=false;
        if(mysqli_query($connection,$sql)){
            $status=true;
        }else{
            $status=false;
        }
        return $status;
    };
    $sql= "CREATE DATABASE project_ims_php";
    try{
        $dbCreate = executeQuery($connection,$sql);
    }catch(Exception $e){
        echo "Db already exists";
    };
    //executing sql query wuth connection object
    $db="project_ims_php";
        
        $imsConnection=createConnection($localhost,$user,$password,$dbName);
        //this function takes parameters and create db table
        
        $utSql="
            CREATE TABLE ims_usertype(
            ut_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            userytype VARCHAR(200) NOT NULL,
            is_removed TINYINT NOT NULL DEFAULT 0,
            is_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            is_updated_at DATETIME NULL,
            is_removed_at DATETIME NULL
        )";

        //handling exception while creating tables
        try{
            $utCreate =executeQuery($imsConnection,$utSql);
            echo "Table created successfully";
        }catch(Exception $e){
            echo "table already exists";
            echo "Error: " . $e->getMessage();
        }finally{
            redirect();
        };
    
    echo "Database created successfully";
}
?>