<?php
    //include constant.php file;
    
    include("/xampp/htdocs/pharmacy-system/config/constants.php");


    //get id of the admin we want to delete;

    $id =$_GET['id'];

    //echo $id; 



    // create SQL quary to delete;

    $sql ="DELETE FROM tbl_admin WHERE id=$id " ;

    // excute the quary

    $res= mysqli_query($conn,$sql);

    if ($res==true) {

        //quary massage sussfully deleted admin
        //echo "Admin deleted ";
        // create session to display massage
        $_SESSION['delete'] = "<div class='success'> Admin Delete Successfully  </div>";

        //re-direct massage into manage admin page;

        header("location:".SITEURL.'admin/admin-manage.php');



    }else
    {
        //query is not working 
        //echo " failed to delete admin ";
        $_SESSION['delete'] ="Failed To Delete Admin";

        //re-direct massage into manage admin page;

        header("location:".SITEURL.'admin/admin-manage.php');
    }


//get massage to manage admin page (sussfully delete or not);



?>