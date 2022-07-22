<?php include('part/menu.php');     ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Update Admin</h1>
        <br><br>

        <?php
            //GET THE ID SELECTED ONE
            $id =$_GET['id'];
            // create SQL quary to get details
            $sql= "SELECT * FROM tbl_admin WHERE id =$id";

            // the quary
            $res=mysqli_query($conn,$sql);

            // the check quary work or not  

            if ($res == true) 
            {
                    // cheack details are availbel or not
                    $count = mysqli_num_rows($res);

                    //
                    if($count==1)// this work correclly
                    {
                        // get the ddetails
                        //echo 'admin availble';
                        $row= mysqli_fetch_assoc($res);

                        $full_name= $row['full_name'];
                        $username = $row['username'];
                    }
                    else
                    {
                        // go back to admin page
                        header("location:".SITEURL.'admin/admin-manage.php');
                    }
                
            }
        ?>

        <form action="" method="POST">

        <table class="table-c">

            <tr>
                <td> Full name: </td>
                <td>
                    <input type="text" name="full_name" value=" <?php echo  $full_name; ?>">
                </td>
            </tr>
            
            <tr>
                <td> Username: </td>
                <td>
                    <input type="text" name="username" value=" <?php echo  $username; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">

                    <input type="hidden" name="id" value=" <?php echo $id ; ?>">
                    <input type="submit" name="submit" value="add admin" class="btn-submit">
                </td>
             
            </tr>

        </table>


        </form>






    </div>
</div>

<?php //check botton is work or not
    if (isset($_POST['submit'] )) 
    {
       // echo "buton is clicked";
       // get the value from form for update;
        $id =$_POST['id'];
        $full_name =$_POST['full_name'];
        $username = $_POST['username'];

        // create sql quary to update database;

        $sql = "UPDATE tbl_admin SET 
        full_name = '$full_name', username= '$username'
        WHERE id ='$id' ";
        
        // excute the quary;
        $res = mysqli_query($conn,$sql);

        // check quary work or not well;
        if ($res ==true) {

            $_SESSION['update'] = "<div class='success'> Admin Update Successfully </div>";


            header("location:".SITEURL.'admin/admin-manage.php');
        }
        else
        
        {
            $_SESSION['update'] = "<div class='erro'> Admin Update Failed  </div>";


            header("location:".SITEURL.'admin/admin-manage.php');

        }


    }

?>
<?php include('part/footer.php');     ?>