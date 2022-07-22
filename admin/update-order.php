<?php  include('part/menu.php');  ?>
<?php
    if(isset($_GET['order_id']))
    {
        //echo "done";
        $order_id=$_GET['order_id'];
        
        // sql quary for gaet all date acoding to the order id;
        $sql="SELECT * FROM tbl_order WHERE id=$order_id";

        //run the quary;
        $res=mysqli_query($conn,$sql);

        //conunt the number of rows to get data;
        $count=mysqli_num_rows($res);

        //check whether data avabalabe or not;
            if ($count >0) {
                # code...
                //echo "done.2";
                //get the data row bt row 
                while ($rows=mysqli_fetch_assoc($res)) 
                {
                   
                    $product_name  =  $rows['products_name'];
                    $pro_price  =   $rows['product_price'];
                    $qty    =   $rows['qty'];
                    $total  =   $rows['total'];
                    $order_date =   $rows['order_date'];
                    $order_status   =   $rows['status'];
                    $customer_name  =   $rows['customer_name'];
                    $customer_contact   =   $rows['customer_contact'];
                    $customer_email= $rows['customer_email'];
                    $customer_address   =$rows['customer_address'];
                    $customer_city      =$rows['customer_city'];
                    $customer_postalCode    =$rows['customer_postalCode'];
                    $Discount_rate  =$rows['Discount_rate'];
                    $net_total  =$rows['net_total'];
                }
            } else {
                # code...
                echo "you dont have the data in table";
            }
            
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>

        <form action="" method="post">
            <table class="table-c" style="width:40% ;">

            <tr>
                <td> product name</td>
                <td style="padding: 2%;"> <?php echo $product_name;?></td>
            </tr>

            <tr>
                <td> Quantity </td>
                <td>  <?php echo $qty;?></td>
            </tr>

            <tr>
                <td> Sub total </td>
                <td>   Rs:  <?php echo $total;?></td>
            </tr>
            <tr>
                <td> Discount </td>
                <td>  Rs:  - <?php  
                $Discount = ($Discount_rate/100)* $total;

                echo $Discount
               
                ?></td>
            </tr>
            <tr>
                <td> Net total </td>
                <td>  RS: <?php echo $net_total;?>.00 <hr width="110px"><hr width="110px"></td>
            </tr>

            <tr>
                <td> customer Name </td>
                <td style="padding: 2%;"><?php echo $customer_name;?>  </td>
            </tr>

            <tr>
                <td > customer address: </td>
                <td > <?php echo $customer_address;?>, </td>
            </tr>
            <tr>
                <td> </td>
                <td colspan="2"> <?php echo $customer_city;?>, </td>
            </tr>
            <tr>
                <td> </td>
                <td colspan="2"> <?php echo $customer_postalCode;?>, </td>
            </tr>
            <tr>
                <td> </td>
                <td colspan="2">Tel-No:- <?php echo $customer_contact;?> </td>
            </tr>
            <tr>
                <td style="padding-top:5%;"> customer email: </td>
                <td> <?php echo $customer_email;?> </td>
            </tr>

            <tr>
                <td> Status </td>
                <td>
                    <select name="status" style="width: 150px; " >
                        <option <?php if ($order_status == "ordered") {echo "selected";} ?> value="ordered"> Ordered</option>
                        <option <?php if ($order_status == "on-delivery") {echo "selected";} ?>  value="on-delivery"> On Delivery </option>
                        <option <?php if ($order_status == "delivered") {echo "selected";} ?> value="delivered"> Delivered </option>
                        <option <?php if ($order_status == "cancelled") {echo "selected";} ?> value="cancelled"> Cancelled </option>
                    </select> 
                    
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" value="update-order" name="submit" class="btn-submit-b">

                </td>
            </tr>


            </table>

        </form>
        <?php
            //check whetre form button is click or not;
            if(isset($_POST['submit']))
           
            {
                //echo "clicked";
                //get the status value from table;

                $new_status=$_POST['status'];

                //update the value of the database;
                $sql2=" UPDATE tbl_order SET
                        status='$new_status'
                    WHERE id=$order_id
                ";

                //run the quary;
                $res2=mysqli_query($conn,$sql2);

                //check whether databse update or not;

                    if ($res2 ==true) 
                        {
                            //echo"update";
                            $_SESSION['order-update'] ="<div class='success'> Order update successfully.</div>";
                            header('location:'.SITEURL.'admin/manage-order.php');

                        } 
                        
                        else 
                        {
                            //echo "not-update";
                            $_SESSION['order-update'] ="<div class='erro'> Order update un-successfully.</div> ";
                            header('location:'.SITEURL.'admin/manage-order.php');
                        }
                


            }

        ?>

    </div>
     
</div>


<?php  include('part/footer.php');  ?>