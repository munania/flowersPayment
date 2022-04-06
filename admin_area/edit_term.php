  <?php

    if (!isset($_SESSION['admin_email'])) {
        
        echo "<script>window.open('login.php','_self')</script>";

    } else {
    
 ?>

     <?php 

        if (isset($_GET['edit_term'])) {
            
            $edit_term_id = $_GET['edit_term'];

            $edit_term_query = "select * from terms where terms_id='$edit_term_id' ";

            $run_edit_term = mysqli_query($con, $edit_term_query);

            $row_edit_term = mysqli_fetch_array($run_edit_term);

            $terms_id = $row_edit_term['terms_id'];

            $terms_title = $row_edit_term['terms_title'];

            $terms_link = $row_edit_term['terms_link'];

            $terms_desc = $row_edit_term['terms_desc'];

        }

    ?>

    <div class="row"> <!-- row Begin -->
        
        <div class="col-lg-12"> <!-- col-lg-12 Begin -->
            
            <div class="breadcrumb"> <!-- breadcrumb Begin -->
                
                <li class="active"> <!-- active Begin -->
                    
                    <i class="fa fa-tachometer-alt"></i> Dashboard / Edit Term

                </li> <!-- active End -->

            </div> <!-- Breadcrumb end -->

        </div> <!-- col-lg-12 End -->

    </div> <!-- row end -->

    <div class="row"> <!-- row Begin -->
        
        <div class="col-lg-12"> <!-- col-lg-12 Begin -->
            
            <div class="panel panel-default"> <!-- panel panel-default Begin -->
                
                <div class="panel-heading"> <!-- panel-heading Begin -->
                    
                    <h4 class="panel-title"> <!-- panel-title Begin -->
                        
                        <i class="fas fa-money-bill fa-fw"></i> Edit Term

                    </h4> <!-- panel-title End -->

                </div> <!-- panel-heading end -->

                            <div class="panel-body"> <!-- panel-body Begin -->
                
                <form method="post" class="form-horizontal" enctype="multipart/form-data"> <!-- form-horizontal Begin -->

                    <div class="form-group"> <!-- form-group Begin -->
                    
                        <label class="col-md-3 control-label"> Terms Title</label>

                        <div class="col-md-6"> <!-- col-md-6 Begin -->
                            
                            <input value="<?php echo $terms_title; ?>" name="terms_title" type="text" class="form-control" required></input>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->
                    
                        <label class="col-md-3 control-label"> Terms Link</label>

                        <div class="col-md-6"> <!-- col-md-6 Begin -->
                            
                            <input value="<?php echo $terms_link ?>" name="terms_link" type="text" class="form-control" required></input>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->
                    
                        <label class="col-md-3 control-label"> Terms Description</label>

                        <div class="col-md-6"> <!-- col-md-6 Begin -->
                            
                            <textarea name="terms_desc" cols="19" rows="20" class="form-control"><?php echo $terms_desc;?></textarea>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

                    <div class="form-group"> <!-- form-group Begin -->
                    
                        <label class="col-md-3 control-label"></label>

                        <div class="col-md-6"> <!-- col-md-6 Begin -->
                            
                            <input name="update" value="Edit Term" type="submit" class="btn btn-primary form-control"></input>

                        </div> <!-- col-md-6 End -->

                    </div> <!-- form-group End -->

                </form> <!-- form-horizontal End -->

            </div> <!-- panel-body End -->

            </div> <!-- panel panel-default end -->

        </div> <!-- col-lg-12 End -->

    </div> <!-- row end -->


    <?php 

        if (isset($_POST['update'])) {
            
            $terms_title = $_POST['terms_title'];
            
            $terms_link = $_POST['terms_link'];
            
            $terms_desc = $_POST['terms_desc'];

            $update_term = "update terms set terms_title='$terms_title', terms_link='$terms_link', terms_desc='$terms_desc' where terms_id='$terms_id' ";

            $run_term = mysqli_query($con, $update_term);

            if ($run_term) {
                
                echo "<script> alert('Terms Updated Sucessfully')</script>";

                echo "<script>window.open('index.php?view_terms', '_self')</script>";

            }

        }



     ?>

    <script src="https://cdn.tiny.cloud/1/8j5cggbk9xum5l5hrwytwcf6twr1p3du35gfmlabpw534e3t/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>


 <?php 

    }

  ?>