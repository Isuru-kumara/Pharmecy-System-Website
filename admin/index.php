<?php include("/xampp/htdocs/pharmacy-system/admin/part/menu.php") ?>



<!-- main content selection start     -->

<div class = "main-content" >
     <div class="wrapper">

          <h1> DASHBOARD </h1>
          <br><br>
          <?php
            if (isset($_SESSION['login'])) 
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

          ?>
          <br><br>

          <div class="col-4 text-center">
               <?php
                    //sql quary;
                    $sql="SELECT * FROM tbl_category";
                    //run quary
                    $res=mysqli_query($conn,$sql);
                    //count the rows

                    $count=mysqli_num_rows($res);
               ?>
               <h1><?php echo $count; ?></h1>
               Categories

          </div>


          <div class="col-4 text-center">
               <?php
                    //sql quary;
                    $sql2="SELECT * FROM tbl_medicine";
                    //run quary
                    $res2=mysqli_query($conn,$sql2);
                    //count the rows

                    $count2=mysqli_num_rows($res2);
               ?>
               <h1> <?php echo $count2;?></h1>
               products

          </div>



          <div class="col-4 text-center">
               <?php
                    //sql quary;
                    $sql3="SELECT * FROM tbl_order";
                    //run quary
                    $res3=mysqli_query($conn,$sql3);
                    //count the rows

                    $count3=mysqli_num_rows($res3);
               ?>
               <h1> <?php echo $count3;?></h1>
               Total Ordrs

          </div>

      

          <div class="col-4 text-center">

               <?php
                    //sql quary to get all income;
                    $sql4="SELECT sum(net_total) AS Total FROM tbl_order WHERE status='delivered'";

                    //run the quary;
                    $res4 =mysqli_query($conn,$sql4);

                    

                    //get the value;
                    $rows=mysqli_fetch_assoc($res4);

                    //get the count
                    $count4=mysqli_num_rows($res4);

                    //get the tottal income;
                    $total_income=$rows['Total'];
               
               ?>

               <h1><?php echo $total_income; ?>.00</h1>
               Record of Earned Income
               
               

          </div>

          



     </div>
     <div class="col-4 text-center" style="margin-left: 523px;" >

               <?php
                    //sql quary;
                    $sql5="SELECT * FROM tbl_order WHERE status='delivered'";
                    //run quary
                    $res5=mysqli_query($conn,$sql5);
                    //count the rows

                    $count5=mysqli_num_rows($res5);
               ?>
            
               <h1> <?php echo $count5; ?></h1>
               
               Delivereded orders 

     </div>
</div>


<!-- main contain selection ends     -->

 

<?php include("/xampp/htdocs/pharmacy-system/admin/part/footer.php")   ?>