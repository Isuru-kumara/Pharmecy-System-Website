<?php include('part/menu.php')   ?>

<div class="main-content">
    <div class="wrapper">
        <h1> change password </h1>
        <br><br>



        <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id']; //get id veriable in previous page;
            }

        ?>

        <form action="" method="post">
            <table class="table-c">
                <tr>
                    <td> current password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="old-password">
                    </td>
                </tr>

                <tr>
                    <td> new password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="new-password">
                    </td>
                </tr>

                <tr>
                    <td> confirm password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="confirm-password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">

                    <input type="submit" value="change password" name="submit" class="btn-submit">
                    <input type="hidden" name="id" value=" <?php echo $id; ?>">
                    
                    </td>
                </tr>


            </table>
        </form>



    </div>
 </div>

 <?php

                //check submit button work or not
                if (isset($_POST['submit'])) 
                {
                   // echo "clicked";

                   // 1. get thr data frm form;
                   $id = $_POST['id'];
                   $current_password = md5($_POST['current_password']);
                   $new_password =md5($_POST['new_password']);
                   $confirm_password = md5($_POST['confirm_password']);


                   // 2. check admin with current id and password are match or not;

                   $sql = "SELECT * FROM tbl_admin WHERE id ='$id' AND PASSWORD ='$current_password'"; //

                   // excute quary;
                   $res= mysqli_query($conn,$sql);

                   if ($res == true) 
                   {
                        // check whether data avalabail or not;
                        $count = mysqli_num_rows($res);

                        if ($count == 1) 
                        {
                            // the admin password can be change
                            //$_SESSION['user-found'] = "<div class='success'> User is Found. </div> ";
                            //header("location:".SITEURL.'admin/change-password.php'); 

                            //check wheether new p.w and currene p.w are match;
                                if ($new_password == $confirm_password) 
                                {
                                    //update the password
                                    $sql2= "UPDATE tbl_admin SET 
                                    password = '$new_password'
                                    WHERE id ='$id' 
                                    ";

                                    //excute the quary;
                                    $res2 = mysqli_query($conn,$sql2);

                                    //check quary work or not;

                                    if ($res2 == true) {
                                        $_SESSION['user-found'] = "<div class='success'> Password Successfully Change. </div> ";
                                        header("location:".SITEURL.'admin/admin-manage.php'); 
                                    } else {
                                        $_SESSION['user-found'] = "<div class='erro'> Faild to change password. </div> ";
                                        header("location:".SITEURL.'admin/admin-manage.php'); 
                                    }
                                    



                                }
                                else
                                {
                                    $_SESSION['not-match'] = "<div class='erro'> New P.W Did Not Match With confirom P.W </div> ";
                                    //user password can't be change and go back to admin page;
                                    header("location:".SITEURL.'admin/admin-manage.php'); // redirecting 
                                }


                        }
                        else
                        {
                            $_SESSION['user-not-found'] = "<div class='erro'> User not Found. </div> ";
                            //user password can't be change and go back to admin page;
                            header("location:".SITEURL.'admin/admin-manage.php'); // redirecting  
                        }
                   }
                }

 ?>















<?php include('part/footer.php')   ?>