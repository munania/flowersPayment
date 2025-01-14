<?php

    if (!isset($_SESSION['admin_email'])) {
        
        echo "<script>window.open('login.php','_self')</script>";

    } else {
    
 ?>

 <?php 

    if (isset($_GET['user_profile'])) {
        
        $edit_user = $_GET['user_profile'];

        $get_user = "select * from admins where admin_id='$edit_user'";

        $run_user = mysqli_query($con, $get_user);

        $row_user = mysqli_fetch_array($run_user);

        $user_id = $row_user['admin_id'];

        $user_name = $row_user['admin_name'];

        $user_pass = $row_user['admin_pass'];

        $user_email = $row_user['admin_email'];

        $user_image = $row_user['admin_image'];
  
        $user_country = $row_user['admin_country'];

        $user_about = $row_user['admin_about'];

        $user_contact = $row_user['admin_contact'];

        $user_job = $row_user['admin_job'];
    }



  ?>

    <div class="row"> <!-- row Begin -->
        
        <div class="col-lg-12"> <!-- col-lg-12 Begin -->
            
            <div class="breadcrumb"> <!-- breadcrumb Begin -->
                
                <li class="active"> <!-- active Begin -->
                    
                    <i class="fa fa-tachometer-alt"></i> Dashboard / Edit User

                </li> <!-- active End -->

            </div> <!-- Breadcrumb end -->

        </div> <!-- col-lg-12 End -->

    </div> <!-- row end -->

    <div class="row"> <!-- row Begin -->
        
        <div class="col-lg-12"> <!-- col-lg-12 Begin -->
            
            <div class="panel panel-default"> <!-- panel panel-default Begin -->
                
                <div class="panel-heading"> <!-- panel-heading Begin -->
                    
                    <h4 class="panel-title"> <!-- panel-title Begin -->
                        
                        <i class="fas fa-user fa-fw"></i> Edit User 

                    </h4> <!-- panel-title End -->

                </div> <!-- panel-heading end -->

                            <div class="panel-body"> <!-- panel-body Begin -->
                
                <form method="post" class="form-horizontal" enctype="multipart/form-data"> <!-- form-horizontal Begin -->

                    <div class="form-group"> <!-- form-group Begin -->
                    
                        <label class="col-md-3 control-label"> Username</label>

                        <div class="col-md-6"> <!-- col-md-6 Begin -->
                            
                            <input value="<?php echo $user_name; ?>" name="admin_name" type="text" class="form-control" required></input>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->
                    
                        <label class="col-md-3 control-label"> E-mail</label>

                        <div class="col-md-6"> <!-- col-md-6 Begin -->
                            
                            <input value="<?php echo $user_email; ?>" name="admin_email" type="text" class="form-control" required></input>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->
                    
                        <label class="col-md-3 control-label"> Password</label>

                        <div class="col-md-6"> <!-- col-md-6 Begin -->
                            
                            <input value="<?php echo $user_pass; ?>" name="admin_pass" type="text" class="form-control" required></input>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->
                    
                        <label class="col-md-3 control-label"> Country</label>

                        <div class="col-md-6"> <!-- col-md-6 Begin -->
                            
                            <input value="<?php echo $user_country; ?>" name="admin_country" type="text" class="form-control" required></input>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->
                    
                        <label class="col-md-3 control-label"> Contact </label>

                        <div class="col-md-6"> <!-- col-md-6 Begin -->
                            
                            <input value="<?php echo $user_contact; ?>" name="admin_contact" type="text" class="form-control" required></input>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->
                    
                        <label class="col-md-3 control-label"> Job </label>

                        <div class="col-md-6"> <!-- col-md-6 Begin -->
                            
                            <input value="<?php echo $user_job; ?>" name="admin_job" type="text" class="form-control" required></input>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->
                    
                        <label class="col-md-3 control-label"> Image </label>

                        <div class="col-md-6"> <!-- col-md-6 Begin -->
                            
                            <input name="admin_image" type="file" class="form-control" required></input>

                            <img src="admin_images/<?php echo $user_image; ?>" alt="<?php echo $admin_name; ?>" width="70" height="70">

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->
                    
                        <label class="col-md-3 control-label"> About </label>

                        <div class="col-md-6"> <!-- col-md-6 Begin -->
                            
                            <textarea name="admin_about" class="form-control" id="" cols="30" rows="10"><?php echo $user_about; ?></textarea>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->
                    
                        <label class="col-md-3 control-label"></label>

                        <div class="col-md-6"> <!-- col-md-6 Begin -->
                            
                            <input name="update" value="Insert Product" type="submit" class="btn btn-primary form-control"></input>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

                </form> <!-- form-horizontal End -->

            </div> <!-- panel-body End -->

            </div> <!-- panel panel-default end -->

        </div> <!-- col-lg-12 End -->

    </div> <!-- row end -->


<?php 
    
    if (isset($_POST['update'])) {
        
        $user_name = $_POST['admin_name'];
        $user_email = $_POST['admin_email'];
        $user_pass = $_POST['admin_pass'];
        $user_country = $_POST['admin_country'];
        $user_contact = $_POST['admin_contact'];
        $user_job = $_POST['admin_job'];
        $user_about = $_POST['admin_about'];

        $user_image = $_FILES['admin_image']['name'];
        $temp_admin_image = $_FILES['admin_image']['tmp_name'];

        move_uploaded_file($temp_admin_image, "admin_images/$user_image");

        $update_user = "update admins set admin_name='$user_name', admin_email='$user_email', admin_pass='$user_pass', admin_country='$user_country', admin_contact='$user_contact', admin_job='$user_job', admin_about='$user_about', admin_image='$user_image' where admin_id='$user_id' ";

        $run_user = mysqli_query($con, $update_user);

        if ($run_user) {
            
            echo "<script> alert('User Has been Updated Sucessfully')</script>";

            echo "<script>window.open('login.php', '_self')</script>";

            session_destroy();


        }

    }


 ?>

 <?php 

    }

  ?>