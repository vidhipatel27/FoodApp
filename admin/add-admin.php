<?php include('partials/menu.php'); ?>

aaa
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php
            if(isset($_SESSION['add']))//checking whether the session is set of not
            {
                echo $_SESSION['add'];//display the session message if set
                unset($_SESSION['add']);//remove session message
            }
        ?>

        <form action=""method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name"placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username"placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password"placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>



        </form>

    </div>

</div>


<?php include('partials/footer.php'); ?>


<?php
   //Process the value from form and save it in Databade

   //Check whether the submit button is clicked or not 

   if(isset($_POST['submit']))
   {
    //Button Clicked
    //echo "Button Clicked";

    //1.Get the Data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);//password encryption with MD5

    //2.SQL Query to save the data into database
    $sql = "INSERT INTO tbl_admin SET
       full_name='$full_name',
       username='$username',
       password='$password'
    ";

    //3.Executing Query and Saveing Data into Database

    $res = mysqli_query($conn,$sql) or die(mysqli_error());

    //4.check whether the (query is executed)data is inserted or not and display appropriate message
    if($res==TRUE)
    {
        //data inserted
        //echo "Data Inserted";
        //create a session variable to display message
        $_SESSION['add'] = "Admin Added Successfully";
        //Redirect page to manage admin
        header("location:".SITEURL.'admin/manage-admin.php');

    }
    else
    {
        //filed to Insert data
        //echo"Filed to Insert Data";
        //create a session variable to display message
        $_SESSION['add'] = "Filed to Add Admin";
        //Redirect page to add admin
        header("location:".SITEURL.'admin/add-admin.php');

    }
    
   }
   

?>


