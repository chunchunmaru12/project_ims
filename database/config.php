<?php
//database connection 
function doConnection(){
    $conn = mysqli_connect("localhost","root","","project_ims");
    return $conn;
};
//building sql execution function
function getUserByUsername($connection,$param_username){
    $connection=doConnection();
    $sql="SELECT * FROM ims_user where username = '$param_username' AND is_removed=0";
    //executing query and it will return array object
    $data =mysqli_query($connection,$sql);
    $response=array();
    //checking if data exists
    if(mysqli_num_rows($data)>0){
        //extracting array object return by query execution
        while($row=mysqli_fetch_array($data)){
            $response=[
              "username"=>$row["username"],
              "email"=>$row["email"],
              "password"=>$row["password"],
            ];
        }
    }
    return $response;
};
function registerUser($connection,$sql){
    $status=false;
    $res=mysqli_query($connection,$sql);
    if($res){
        $status=true;
    }
    return $status;
}
?>