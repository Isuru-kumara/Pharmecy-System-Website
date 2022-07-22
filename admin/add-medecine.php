
<?php include('part/menu.php');
 ob_start(); ?>




<div class="main-content">
    <div class="wrapper">
        <h1> Add medicine </h1>
        <br><br>
        <?php
            if (isset( $_SESSION['upload-erro'])) {
                echo  $_SESSION['upload-erro'];
                unset( $_SESSION['upload-erro']);
            }

        ?>

            
        <br><br>

        <!--  add category form strat -->
            <form action="" method="POST" enctype="multipart/form-data">


                <table align="center" style="width: 100%; " >
                <!-- style="width: 100%;" -->
                    <tr>
                        <td> Title: </td>
                        <td>
                            <input style="height: 35px;" type="text" name="title" placeholder=" Medicine name:">
                        </td>
                    </tr>


                    <tr>
                        <td> Description:</td>
                        <td>
                            <textarea name="Description"  cols="60" rows="5" placeholder="Enter description text here... "> </textarea>
                        </td>
                    </tr>


                    <tr>
                        <td> Price: </td>
                        <td>
                            <input type="number" name="price" style="height: 35px;">
                            
                        </td>
                    </tr>


                    <tr>
                        <td> Select Image </td>
                        <td> 
                            <input type="file" name="image" style="height: 35px; width:50%;">
                        </td>

                    </tr>
                    <tr> 
                        <td> Category: </td>
                        <td>
                            <select name="category" style="height: 35px; width: 30%;" >
                           
                                <?php  
                                    ob_start();
                                       
                                    //php for displya category from database;

                                    //ceate SQL for get all active categories inthe database
                                    $sql= "SELECT * FROM tbl_category WHERE active ='yes'";

                                    $res =mysqli_query($conn,$sql);

                                    //number of rows;
                                    $count = mysqli_num_rows($res);
                                        
                                    //if count is 0 we dont have category,else we have;

                                    if ($count >0) {
                                        # we have
                                        // read the  datbase data line by line  
                                        while ($rows =mysqli_fetch_assoc($res)) 
                                        {
                                            # get the deatilsa o fcategories;
                                            $id=$rows['id'];
                                            $title = $rows['title'];


                                            //displlay active categoryies in the site
                                                ?>
                                                    <option value="<?php  echo $id; ?>" > <?php echo $title; ?></option>
                                                    
                                                <?php

                                        }


                                    }
                                    else 
                                    {
                                        # we dont have;
                                            ?>
                                                 <option value="0"> No Category Found.</option>
                                            <?php
 

                                    }
                                 ob_end_flush();
                                ?> 
                             </select>
                        </td>
                    </tr>
                    

                    <tr>
                        <td> Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="yes" style="height: 15px; width:3%;"> yes<br><br>
                            <input type="radio" name="featured" value="no" style="height: 15px; width:3%;"> no
                        </td>
                    </tr>

                    <tr>
                        <td> Active: </td>
                        <td >
                         <input type="radio" name="active" value="yes" style="height: 15px; width:3%;">yes <br><br>
                         <input type="radio" name="active" value="no" style="height: 15px; width:3%;">no
                        </td>
                    </tr>
                    <tr>
                        <td> number of Products: </td>
                        <td >
                         <input type="number" name="avalable_qty" style="height: 35px;" >
                        </td>
                    </tr>

                    <tr>
                        <td> Discount rate: </td>
                        <td >
                         <input type="number" name="Discount_rate" style="height: 35px;" >
                        </td>
                    </tr>

                    
                    <tr>
                    
                        <td colspan="2" align="left" >
                            <input type="submit" value="add medicine" name="submit" class="btn-submit-b" style="padding:1%;">

                        </td>
                    </tr>



                </table>
            </form>
            
            <?php
                
                if (isset($_POST['submit'])) 
                {
                   //echo "Clicked";
                   //**1. get data from form;
                        $title =$_POST['title'];
                        $Description= $_POST['Description'];
                        $price =$_POST['price'];
                        $category =$_POST['category'];
                        $quntity=$_POST['avalable_qty'];
                        $Discount_rate=$_POST['Discount_rate'];

                        //check whether radion button for featured and active

                        if(isset($_POST['featured']))
                            {
                                $featured = $_POST['featured'];
                            }
                            else
                            {
                                $featured = "no";  //setting the default value;  $destination = "../images/medicine/".$image_name;
                            }

                        if(isset($_POST['active']))
                            {
                                $active = $_POST['active'];
                            }
                            else
                            {
                                $active="no";  //setting Default value;
                            }


                   // 2. upload image if selected;

                        //check whether the select image is clicked or not and upload the image is selected
                        //print_r($_FILES['image']);
                        if (isset($_FILES['image']['name'])) 
                        {
                            //upload image 
                            // we need image name,source path, destination path;
                            $image_name =$_FILES['image']['name'];
                                    
                                    //renamaing image name;
                                    //get new extention to our image
                                    $ext2=end(explode('.',$image_name));

                                    //renmae the image
                                    $image_name= "add_medicine".rand(0000,9999).'.'.$ext2;


                            $source_path =$_FILES['image']['tmp_name'];

                            $destination_path ="../images/medicine/".$image_name ; //wherew we want to sve phot & path added here

                            //upload the image
                            $upload= move_uploaded_file($source_path ,$destination_path);

                            //check image upload or not;

                            if ($upload==false) 

                                {                                        
                                    //display session massage in add-category.php site;
                                    $_SESSION['upload-erro'] ="<div class='erro'> Failed to upload image / please give path of image </div>  ";

                                    //go back to category page;
                                     header('location:'.SITEURL.'admin/add-medecine.php');
                                        
                                  
                                    

                                    //stop the process
                                    die();
                                    
                                }



                        } else {
                            //dont's upload image and image_name value as blank (image_name="")
                            $image_name ="";
                        }
                        

                    // 3. insert in to the databse;


                        // display quary work and data added to database

                        //SQl quary for add new medicine
                        $sql2 ="INSERT INTO tbl_medicine SET
                        titile ='$title',
                        descrption = '$Description',
                        price=$price,
                        image_name ='$image_name',
                        category_id=$category, 
                        featured='$featured',
                        active='$active',
                        number_of_product=$quntity,
                        Discount_rate=$Discount_rate";

                        //execute quary;
                        $res2 =mysqli_query($conn,$sql2);

                        if ($res2 == true) {
                            $_SESSION['add-medicine'] ="<div class='success'> medicine added succesfully </div>";
                            header('location:'.SITEURL.'admin/manage-medicine.php');
                        } else {
                            $_SESSION['add-medicine'] ="<div class='success'> medicine added unsuccesfully </div>";
                            header('location:'.SITEURL.'admin/manage-medicine.php');
                        }
                 
                } 
           
            ?>
     </div>
</div>
<?php include('part/footer.php');
ob_end_flush(); ?>
