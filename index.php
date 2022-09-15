<?php
 include "database.php";
  

   if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['password']);
    

     $select="SELECT * FROM users WHERE email='$email' && password='$pass' ";

     $result= mysqli_query($conn,$select);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_array($result);

            if($row['user_type'] =='admin'){
                $_SESSION['admin_name'] =$row['name'];
                header('location:admin.php');

            }elseif($row['user_type'] == 'user'){
                $_SESSION['user_name'] =$row['name'];
                header('location:user.php');
            }
        }else{
            $error[] = 'incorrect email or password';
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
                        <h3>Login Here!</h3>
                    </div> 
                    <?php
                          if(isset($error)){
                              foreach($error as $error){
                                echo'<span class="text-danger bg-red">'.$error.'</span>';
                              };
                          };
                        ?>

                    <div class="card-body ">

                    <form action="" method="post">
                        <input type="email" class="form-control mb-3" placeholder="User email" name="email">
                        <input type="password" class="form-control mb-3" placeholder="User password" name="password">
                        <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-primary " name="submit" >LOGIN</button>
                        </div>

                        <p>don't have an account?<a href="register.php">Register Now!</a></p>
                    </form>
                </div> 
            </div>
        </div> 
    </div> 
    </form>

    
</body>
</html>