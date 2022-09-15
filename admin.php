<?php
include 'database.php';

$select="SELECT * FROM users WHERE user_type='user'";

 $result= mysqli_query($conn,$select);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>

<h1>Hi, <?php echo $_SESSION['admin_name'] ?></h1>
        <div class="container">
                <div class="row">
                    <div class="col m-auto">
                        <table class="table table-bordered">
                            <tr>
                                <td>UserId</td>
                                <td>UserName</td>
                                <td>UserEmail</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>

                        <?php
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $UserId = $row['id'];
                                $UserName = $row['name'];
                                $UserEmail = $row['email'];
                        ?>   
                        
                        <tr>
                            <td><?php echo $UserId ?></td>
                            <td><?php echo $UserName ?></td>
                            <td><?php echo $UserEmail ?></td>
                            <td><a href="edit.php?GetID=<?php echo $UserId?>">Edit</a></td>
                            <td><a href="delete.php?Del=<?php echo $UserId?>">Delete</a></td>
                        </tr>
                     <?php      
                            }
                    ?>
                        

                        </table>    
                    </div>
                    


                </div>
        </div>   

</body>
</html>