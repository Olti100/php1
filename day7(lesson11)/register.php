<?php
include_once("config.php");

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    
    $username=$_POST['username'];
    $email=$_POST['email'];
    $temPass=$_POST['password'];
    $password=password_hash($temPass,PASSWORD_DEFAULT);

    if(empty($name) || empty($username) || empty($username) || empty($email) || empty($password)){
        echo "You need to fill all the fields";

    }else{        
        $sql="SELECT username FROm users WHERE username=:username";
        $temSql=$conn->prepare($sql);
        $temSql->bindParam('username',$username);
        $temSql->execute();

        if($temSql->rowCount()>0){
         echo"Username exists!";
            header("refresh:2;url=signup.php");
         }else{
              $sql="INSERT INTO users(name,username,email,password) values (:name,:username,:email,:password)";
              $insertSql=$conn->prepare($sql);

              $insertSql->bindParam(':name',$name);
              $insertSql->bindParam(':username',$username);
             
              $insertSql->bindParam(':email',$email);
              $insertSql->bindParam(':password',$password);

              $insertSql->execute();

              echo "Data saved succesfully!";
              header ("refresh:2;url=login.php");


        
        
         }
            
     }

}