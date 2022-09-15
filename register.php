<?php
 include "database.php";

   if(isset($_POST['submit'])){
     $name = mysqli_real_escape_string($conn,$_POST['name']);
     $email = mysqli_real_escape_string($conn,$_POST['email']);
     $pass = md5($_POST['password']);
     $cpass = md5($_POST['cpassword']);
     $user_type =$_POST['user_type'];

     $select="SELECT * FROM users WHERE email='$email' && password='$pass' ";

     $result= mysqli_query($conn,$select);

     if(mysqli_num_rows($result) > 0){
        $error[] ='user already exist';
     }else{

        if($pass !=$cpass){
            $error[] ='password not matched!';
        }else{
            $insert="INSERT INTO users (name,email,password,user_type) VALUES ('$name','$email','$pass','$user_type')";
            mysqli_query($conn,$insert);
            header('location:index.php');
        }
     }
   };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
    
        
        <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-4">
                <div class="card">
                    <div class="card-title px-4">
                        <h3>Register here</h3>
                        <?php
                          if(isset($error)){
                              foreach($error as $error){
                                echo'<span class="text-danger bg-red">'.$error.'</span>';
                              };
                          };
                        ?>
                    </div> 

                    <div class="card-body ">

                    <form action="" method="post">
                        <input type="text" class="form-control mb-3" placeholder="User name" name="name">
                        <input type="email" class="form-control mb-3" placeholder="User email" name="email">
                        <input type="password" class="form-control mb-3" placeholder="User password" name="password">
                        <input type="password" class="form-control mb-3" placeholder="Confirm your password" name="cpassword">
                        <select name="user_type">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                        <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-primary " name="submit" value="register now">REGISTER</button>
                        </div>

                        <p>already have an account?<a href="index.php">Login Now!</a></p>
                    </form>
                </div> 
            </div>
        </div> 
    </div> 
    </form>
    
</body>
</html>