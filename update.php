<?php

include "database.php";

if(isset($_POST['update']))
{
     $UserId = $_GET['$ID'];
     $UserName = $_POST['name'];
     $UserEmail = $_POST['email'];

    $query = "UPDATE users SET name = '".$UserName."',email ='".$UserEmail."' WHERE id ='".$UserId."' ";
    $result =mysqli_query($conn,$query);

   if($result)
   {
      header("location: admin.php");
   }
   else{
       echo 'Please Check Your Query';
   }

}else{
    header("location: admin.php");
}
?>