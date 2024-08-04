<?php 

include 'connect.php';

if(isset($_POST['sign up'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

     $checkEmail="SELECT * From users1 where email='$email'";
     $result=$conn->query($checkemail);
     if($result->num_rows>0){
        echo "Email Address Already Exists !";
     }
     else{
        $insertQuery="INSERT INTO users1(name,email,password)
                       VALUES ('$name','$email','$password')";
            if($conn->query($insertQuery)==TRUE){
                header("location: login1.php");
            }
            else{
                echo "Error:".$conn->error;
            }
     }
   

}

if(isset($_POST['log in'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=md5($password) ;
   
   $sql="SELECT * FROM users1 WHERE email='$email' and password='$password'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    header("Location: index.html");
    exit();
   }
   else{
    echo "Not Found, Incorrect Email or Password";
   }

}
?>