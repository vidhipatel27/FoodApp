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
       // echo "Admin Deleted";
       //create session variable to display message
       $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
       //redirect to manage admin page
       header('location:' .SITEURL.'admin/manage-admin.php');
   }
   else
   {
        //failed to delete admin 
        //echo "Failed to Delete Admin";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
   }

   //3.redirect to manage admin page with maessage (success/error) 
   
?>