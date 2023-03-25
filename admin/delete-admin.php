<?php
   
   //include constants.php file here
   include('../config/constants.php');

   //1.get the ID of admin to be deletd
   $id = $_GET['id'];

   //2. Create SQL Query to deletd admin
   $sql = "DELETE FROM tbl_admin WHERE id=$id";

   //execute the query
   $res = mysqli_query($conn, $sql);

   // ckeck whether the query executed successfully or not 
   if($res==true)
   {
        //query executed successfully anc admin deleted
        echo "Admin Deleted";
   }
   else
   {
        //failed to delete admin 
        echo "Failed to Delete Admin";
   }

   //3.redirect to manage admin page with maessage (success/error) 
   
?>