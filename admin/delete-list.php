<?php
include('../config/constants.php');

//echo"this is delet list";
if (isset($_GET['id']) AND isset($_GET['image_name'])) {
    #process of delete
    //echo 'deleting process';
    // 1.get IDand inmage_name;
        $id = $_GET['id'];
        $image_name =$_GET['image_name'];

    // 2.remove image from file
        if($image_name !="")
        {
            //get image path;
            $path='../images/medicine/'.$image_name;

            //remove image from file;
            $remove= unlink($path);

            //check image is remove or not;
            if ($remove ==false) 
            {
                # failed to remove image;
                $_SESSION['failed-to-remove-pic'] ="<div class='erro'> Failed to remove image </div>  ";
                //redirect to manage  medicine page
                header('location:'.SITEURL.'admin/manage-medicine.php');
                die();
            }
            

        }

    //3.delete medicine from batabase;
    $sql= "DELETE FROM tbl_medicine WHERE id=$id";
     //excuting;
     $res=mysqli_query($conn,$sql);

     //check SQL Quary working or not;
     if ($res == true) {
        $_SESSION['delete-medicine'] ="<div class='success'> medicine delete succesfully </div>";
        header('location:'.SITEURL.'admin/manage-medicine.php');
    } else {
        $_SESSION['delete-medicine'] ="<div class='success'> medicine delete unsuccesfully </div>";
        header('location:'.SITEURL.'admin/manage-medicine.php');
    }



    //4.redirect to manage-medicine.php with session massage;

} 
else 
{
    #redirect to manage-medineine page
    //echo'redirect to medicine page';
    $_SESSION['delete-list']="<div class='erro'> Failed to Delete </div>  ";
    header('location:'.SITEURL.'admin/manage-medicine.php');
}


?>