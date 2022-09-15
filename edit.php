<?php
 include "database.php";

 $UserId = $_GET['GetID'];
 $query = "SELECT * FROM users where id ='".$UserId."'";
 $result = mysqli_query($conn,$query);

 while($row=mysqli_fetch_assoc($result)){
    $UserId = $row['id'];
    $UserName = $row['name'];
    $UserEmail = $row['email'];

 }
   

   
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
                        <h3>EDIT USER</h3>
                    </div> 

                    <div class="card-body ">

                    <form action="update.php?$ID=<?php echo $UserId ?>"  method="post">
                        <input type="text" class="form-control mb-3" placeholder="User name" name="name" value="<?php echo $UserName ?>">
                        <input type="email" class="form-control mb-3" placeholder="User email" name="email" value="<?php echo $UserEmail ?>">

                        <div class="col-md-12 mt-4">
                        <button  class="btn btn-primary" name="update">Update</button>
                        </div>

                     
                    </form>
                </div> 
            </div>
        </div> 
    </div> 
    </form>
    
</body>
</html>