<?php 

session_start();

include("connection.php");
include("functions.php");


  if($_SERVER['REQUEST_METHOD'] == "POST"){


    //SOMETHING WAS POSTED 
    $user= $_POST['user'];
    $Password=$_POST['Password'];

    if(!empty($user) && !empty($Password)&& !is_numeric($user)){


      // read from db


      
      $query = "select * from users where user_name = '$user' limit 1";
      $result = mysqli_query($con,$query);

      if($result){
      	if($result && mysqli_num_rows($result)>0)
			{
				$user_data=mysqli_fetch_assoc($result);
				if($user_data['Password']===$Password){

					$_SESSION['user_id']=$user_data['user_id'];
					header("Location: index.php");
      				die;
				}
			}
      }
      echo "incorrect username or password";

      

    }else{
      echo "Please enter valid information.";
    }
  }




 ?>

<!DOCTYPE html>
<html>
<head>
<title>User Login</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class= "user-login">
<h1>User Login</h1>
<form action="#" method="post">
<p>User Name</p>
<input type="text" name="user" placeholder="User Name">
<p>Password</p>
<input type="Password" name="Password" placeholder="Password">
<button type="submit">Login</button>
<a href="#">Forgot your password</a><br>
<a href="#">Don't have an account?</a>
</form>
</div>
</html>