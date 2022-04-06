<?php

       if (!isset($_SESSION['admin_email'])) {
              
              echo "<script>window.open('login.php','_self')</script>";

       } else {
       
 ?>

  <?php 

       if (isset($_GET['edit_manufacturer'])) {
              
              $edit_manufacturer = $_GET['edit_manufacturer'];

              $get_manufacturer = "select * from manufacturers where manufacturer_id='$edit_manufacturer'";

              $run_edit_manufacturer = mysqli_query($con, $get_manufacturer);

              $row_edit_manufacturer = mysqli_fetch_array($run_edit_manufacturer);

              $m_id = $row_edit_manufacturer['manufacturer_id'];

              $m_title = $row_edit_manufacturer['manufacturer_title'];

              $m_top = $row_edit_manufacturer['manufacturer_top']; 

              $m_image = $row_edit_manufacturer['manufacturer_image'];

       }

?>

<div class="row"> <!-- row Begin -->

       <div class="col-lg-12"> <!-- col-lg-12 Begin -->

              <ol class="breadcrumb"> <!-- breadcrumb Begin -->

                     <li> <!-- l1 Begin -->
                            
                            <i class="fa fa-tachometer-alt"></i> Dashboard / Update Manufacturer

                     </li> <!-- li Begin -->

              </ol> <!-- Breadcrumb End-->

       </div> <!-- col-lg-12 End -->

 </div> <!-- row End -->


<div class="row"> <!-- row Begin -->

       <div class="col-lg-12"> <!-- col-lg-12 Begin -->

              <div class="panel panel-default"> <!-- panel panel-default Begin -->

                     <div class="panel-heading"> <!-- col-lg-12 Begin -->

                            <h3 class="panel-title"> <!-- panel-title Begin -->

                                   <i class="fa fa-ribbon fa-fw"></i> Update Manufacturer
                            </h3> <!-- panel-title End -->

                     </div> <!-- col-lg-12 End -->

                     <div class="panel-body"> <!-- panel-body Begin-->

                            <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"> <!-- form-horizontal Begin -->

                                   <div class="form-group"> <!-- form-group Begin -->

                                          <label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

                                                 Manufacturer Name
                                                 
                                          </label> <!-- control-label col-md-3 End -->

                                          <div class="col-md-6"> <!-- col-md-6Begin -->

                                                 <input value="<?php echo $m_title ?>" name="manufacturer_name" type="text" class="form-control">

                                          </div> <!-- col-md-6 End -->

                                   </div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->

                        <label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

                            Choose As Top Manufacturer
                            
                        </label> <!-- control-label col-md-3 End -->

                        <div class="col-md-6"> <!-- col-md-6Begin -->

                            <input name="manufacturer_top" type="radio" value="yes" 

                                   <?php 

                                          if ($m_top=='no') {}else{echo "checked='checked'";}

                                    ?>

                            >

                                   

                            <label> Yes </label>

                            <input name="manufacturer_top" type="radio" value="no"

                                   <?php 

                                          if ($m_top=='no'){echo "checked='checked'";}

                                    ?>

                            >

                            <label> No </label>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

                                   <div class="form-group"> <!-- form-group Begin -->

                                          <label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->

                                                 Manufacturer Image                                      
                                                 
                                          </label> <!-- control-label col-md-3 End -->

                                          <div class="col-md-6"> <!-- col-md-6Begin -->

                                                 <input type="file" name="manufacturer_image" class="form-control">

                                                 <br>

                                                 <img src="other_images/<?php echo $m_image; ?>" alt="<?php echo $m_title; ?>" width="70" height="70"> 

                                          </div> <!-- col-md-6 End -->

                                   </div> <!-- form-group End -->

                                   <div class="form-group"> <!-- form-group Begin -->

                                          <label for="" class="control-label col-md-3"> <!-- control-label col-md-3 Begin -->
                                                 
                                          </label> <!-- control-label col-md-3 End -->

                                          <div class="col-md-6"> <!-- col-md-6Begin -->

                                                 <input type="submit" name="update" value="Update Manufacturer" class="btn btn-primary form-control">

                                          </div> <!-- col-md-6 End -->

                                   </div> <!-- form-group End -->

                            </form> <!-- form-horizontal End -->

                     </div> <!-- col-lg-12 End --> 

              </div> <!-- panel panel-default -->

       </div> <!-- col-lg-12 End -->

 </div> <!-- row End -->


 <?php 

       if (isset($_POST['update'])) {
              
        $manufacturer_name = $_POST['manufacturer_name'];
        
        $manufacturer_top = $_POST['manufacturer_top'];

        if (is_uploaded_file($_FILES['manufacturer_image']['tmp_name'])) {

               $manufacturer_image = $_FILES['manufacturer_image']['name'];

               $temp_name = $_FILES['manufacturer_image']['tmp_name'];

                   
               move_uploaded_file($temp_name, "other_images/$manufacturer_image");

               $update_manufacturer = "update manufacturers set manufacturer_title='manufacturer_name', manufacturer_top='$manufacturer_top', manufacturer_image='$manufacturer_image' where manufacturer_id='$m_id'";

               $run_manufacturer = mysqli_query($con, $update_manufacturer);

               if ($run_manufacturer) {

                     echo "<script> alert('Manufacturer Updated Sucessfully')</script>";

                     echo "<script>window.open('index.php?view_manufacturer', '_self')</script>";
               }

               
               
        } else {

               $update_manufacturer = "update manufacturers set manufacturer_title='$manufacturer_name', manufacturer_top='$manufacturer_top' where manufacturer_id='$m_id'";

               $run_manufacturer = mysqli_query($con, $update_manufacturer);

               if ($run_manufacturer) {

                     echo "<script> alert('Manufacturer Updated Sucessfully')</script>";

                     echo "<script>window.open('index.php?view_manufacturer', '_self')</script>";
               }

        }

        
              
       }

  ?>

 <?php 

       }

  ?>