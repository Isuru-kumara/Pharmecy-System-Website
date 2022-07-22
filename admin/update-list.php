<?php
 ob_start();

use function PHPSTORM_META\elementType;

 include('part/menu.php');     ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Update Medicine list </h1>
        <br><br>
        <?php
            if (isset( $_GET['id'])) 
            {
                //get id and other details
                //echo "getting data";

                //GET THE ID SELECTED ONE
                $id =$_GET['id'];
                // create SQL quary to get details
                $sql= "SELECT * FROM tbl_medicine WHERE id =$id";

                 // the quary
                $res=mysqli_query($conn,$sql);

                 // cheack details are availbel or not
                $count = mysqli_num_rows($res);

                   if($count==1)// this work correclly
                    {
                        // get the ddetails
                        //echo 'admin availble';
                        $row= mysqli_fetch_assoc($res);

                        $title =$row['titile'];
                        $description =$row['descrption'];
                        $price =$row['price'];
                        $current_image =$row['image_name'];
                        $featured =$row['featured'];
                        $active =$row['active'];
                        $current_category=$row['category_id'];
                        $current_quntity=$row['number_of_product'];
                        $current_discount=$row['Discount_rate'];

                        //


                        


                    }
                    else{
                        //go back to category page with massge;
                        $_SESSION['no-medicine-found'] ="<div class='erro'> no medicine list found</div>";
                        //go back
                        header('location:'.SITEURL.'admin/manage-medicine.php');
                    }
                    
                   
            }        

             else 
            {
                // go back to medicine manage page;
                header('location:'.SITEURL.'admin/manage-medicine.php');
            }
            

        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="table-b">

                <tr>
                    <td> Title: </td>
                    <td>
                        <input type="text" name="new_title" value="<?php echo $title ?> ">
                    </td>
                </tr>
                <tr>
                    <td> descrption</td>
                    <td>
                        <textarea name="new_descrption" cols="80" rows="5" ><?php echo $description ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td> price </td>
                    <td>
                        <input type="number" name="new_price" value="<?php echo $price;?>">
                    </td>
                </tr>

                <tr>
                    <td> product Quantity </td>
                    <td>
                        <input type="number" name="new_quntity" value="<?php echo $current_quntity;?>">
                    </td>
                </tr>

                
                <tr>
                    <td> Discount Rate </td>
                    <td>
                        <input type="number" name="new_discount_rate" value="<?php echo $current_discount;?>">
                    </td>
                </tr>
                


                <tr>
                    <td> current image: </td>
                    <td>
                        <?php
                            if($current_image !="")
                            {
                                //display imaeg
                                ?>
                                <img src="<?php echo SITEURL; ?>images/medicine/<?php echo $current_image; ?>" width="170px">


                                <?php
                            }
                            else{
                                //display massage
                                echo "<div class='erro'> image is not uploaded </div>";
                            }
                        ?>
                    </td>
                </tr>




                <tr>
                    <td> Select New image</td>
                    <td>
                        <input type="file" name="new_image">
                    </td>
                </tr>




                <tr>
                    <td> Select category </td>
                    <td>
                        <select name="new_category">
                            <?php  
                             ob_start();
                                            
                             //php for displya category from database;

                             //ceate SQL for get all active categories inthe database
                                $sql2= "SELECT * FROM tbl_category WHERE active ='yes'";

                                $res2 =mysqli_query($conn,$sql2);

                                            //number of rows;
                                    $count2 = mysqli_num_rows($res2);
                                                
                                            //if count is 0 we dont have category,else we have;

                                            if ($count2 >0) {
                                                # we have
                                                // read the  datbase data line by line  
                                                while ($rows2 =mysqli_fetch_assoc($res2)) 
                                                {
                                                    # get the deatilsa o fcategories;
                                                    $categoey_id=$rows2['id'];
                                                    $category_title = $rows2['title'];


                                                    //displlay active categoryies in the site
                                                    ?>
                                                        <option <?php if ($current_category ==$categoey_id) { echo "selected";}  ?> value="<?php echo $categoey_id;?>"> <?php echo $category_title?> 
                                                        </option>
                                                    <?php

                                                }


                                            }
                               
                             ob_end_flush();
                            ?> 
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>featured</td>
                    <td>
                        <input <?php if($featured=="yes"){echo "checked" ;}?> type="radio" name="new_featured" value="yes">yes
                        <input <?php if($featured=="no"){echo "checked" ;}?> type="radio" name="new_featured" value="no">no
                    </td>
                </tr>
                <tr>
                    <td>active</td>
                    <td>
                        <input <?php if($active=="yes"){echo "checked" ;}?> type="radio" name="new_active" value="yes">yes
                        <input <?php if($active=="no"){echo "checked" ;}?> type="radio" name="new_active" value="no">no
                    </td>
                </tr>
                <tr>
                    <td colspan="1" >
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                    
                        <input type="submit" name="submit" value="update list" class="btn-submit-b">
                    </td>
                
                </tr>

            </table>


        </form>

        <?php
            if (isset($_POST['submit'])) {
                //get the value from form;


                
                $title3 =$_POST['new_title'];
                $Description3= $_POST['new_descrption'];
                $price3 =$_POST['new_price'];
                $category3 =$_POST['new_category'];
                $new_quntity=$_POST['new_quntity'];
                $new_discount=$_POST['new_discount_rate'];

                if(isset($_POST['new_featured']))
                    {
                        $featured3 = $_POST['new_featured'];
                    }
                    else
                    {
                        $featured3 = "no";  //setting the default value;  $destination = "../images/medicine/".$image_name;
                    }

                if(isset($_POST['new_active']))
                    {
                        $active3 = $_POST['new_active'];
                    }
                    else
                    {
                        $active3="no";  //setting Default value;
                    }


                //2 update new image if we want
                if(isset($_FILES['new_image']['name']))
                    {
                         $image_name=$_FILES['new_image']['name'];
                         
                         //check current image avalbel or not;
                         if ($image_name !="") 
                         {
                            //image avalble

                            //1.upload new image;
                            
                            //get new extention to our image
                            $ext =end(explode('.',$image_name));

                            //renmae the image
                            $image_name= "new_medic_img" .rand(0000,9999).'.'.$ext;


                            $source_path =$_FILES['new_image']['tmp_name'];

                            $destination_path ="../images/medicine/".$image_name ; //wherew we want to sve phot & path added here

                            //image uploading php funtion
                            $upload= move_uploaded_file($source_path ,$destination_path);

                            //check image upload or not;

                            if ($upload==false) 

                            {                                        
                                //display session massage in add-category.php site;
                                $_SESSION['upload-new-medic-pic'] ="<div class='erro'> Failed to upload image / please give path of image </div>  ";

                                //go back to medicine page;
                                header('location:'.SITEURL.'admin/manage-medicine.php');

                                //stop the process
                                die();
                                        
                            }



                            //2.remove current image;
                            if($current_image !="")
                            {
                                $remove_path ="../images/medicine/".$current_image ;
                                $remove=unlink($remove_path);

                                //check image remove or not; 
                                if($remove == false)
                                {
                                    //set massge to displaya erro;
                                    $_SESSION['remove-current-medic-img'] = " <div class='erro'> Faile to remove current image  </div>";
            
                                    //back to catagory page;
                                    header('location:'.SITEURL.'admin/manage-medicine.php');
                                    //stop the all process
                                    die();
                                }
                            }
                            

                         }else{

                            //image nor-avable
                            $image_name =$current_image;

                         }
                    }
                    else
                    {
                        $image_name =$current_image;
                    }

                //3.update the data base;
                $sql3 = " UPDATE tbl_medicine SET  

                        titile ='$title3',
                        descrption = '$Description3',
                        price=$price3,
                        image_name ='$image_name',
                        category_id=$category3, 
                        featured='$featured3',
                        active='$active3',
                        number_of_product=$new_quntity,
                        Discount_rate=$new_discount
                        WHERE id =$id ";


                //4.run the SQL ;
                $res3= mysqli_query($conn,$sql3);

                //-cehck code run or not

                if($res3 == true ){
                    //catagory updated,
                    $_SESSION['updated-medic-list'] = "<div class='success'> medicine list updated succesfully </div>" ;
                    header('location:'.SITEURL.'admin/manage-medicine.php');
                }
                else{
                    //not working well and redectly to manage category page;  

                    $_SESSION['updated-medic-list'] = "<div class='erro'> Failed to update Category </div>" ;
                        //redierct
                        header('location:'.SITEURL.'admin/manage-medicine.php');
                }





            }
        ?>






    </div>
</div>


<?php include('part/footer.php');   ob_end_flush();   ?>

