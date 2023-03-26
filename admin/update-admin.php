<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>
        
        <?php
            //1.get the ID of selected admin
            $id=$_GET['id'];

            //2.create SQL query to get the details
            $sql="SELECT * FROM tbl_admin WHERE id=$id";

            //execute the query
            $res=mysqli_query($conn, $sql);

            //check whether the query is executed or not
            if($res==true)
            {
                //check whether the data is available or not 
                $count = mysqli_num_rows($res);
                //check whether we have admin data or not
                if($count==1)
                {
                    //get the details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);
                    
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else
                {
                    //redirect to manage admin page
                    hearder('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        
        ?>

        <from action="" method="POST">

             <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
             </table>

        </from>
    </div>
</div>

<?php

    //check whether the submit button is clicked or not 
    if(isset($_POST['submit']))
    {
        echo "Button Clicked";
    }

?>


<?php include('partials/footer.php'); ?>