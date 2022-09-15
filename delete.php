<?php
     include "database.php";

    if(isset($_GET['Del']))
    {
        $UserId = $_GET['Del'];
        $query ="DELETE FROM users WHERE ID ='".$UserId."'";
        $result = mysqli_query($conn,$query);
    

    if($result)
   {
      header("location: admin.php");
   }
   else{
       echo 'Please Check Your Query';
   }
}else
{
    header("location: admin.php");
}
?>