<?php ob_start();?>
<?php include "includes/admin_header.php"; ?>
<?php include "function.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
<?php include "includes/admin_navigation.php";?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Admin Page
                        <small>Author</small>
                    </h1>
                </div>
                <div class="col-lg-6">
                    <form action="categories.php" method="post">
                        <div class="form-group">
                            <label for="cat_title">Add catergoies</label>
                            <input type="text" class="form-control" name="cat_title">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="submit" value="add category">
                        </div>

                        <?php //*******insert new categories Query*******
                            insert_categories();
                        ?>

                    </form>
                </div> <!--this category form-->
                
                <div class="col-lg-6"> <!-- this is catergoies table -->
                    <table class="table table-borderless table-hover">

                        <thead>
                            <th>Id</th>
                            <th>Title</th>
                        </thead>
                        <tbody>

                            <?php //************categories show Query**************
                                findAllCategories();
                            ?>

                            <?php //**************Delete Query*************
                            
                               deleteCategories();
                            
                            ?>

                        </tbody>
                    </table>
                </div>
                
                <div class="col-lg-6">      <!-- edit categoie form -->
                    <?php
                        if(isset($_GET['edit'])){
                            $cat_id=$_GET['edit'];
                            include "includes/update_cat.php";
                        }
                    ?>
                <div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<?php include "includes/admin_footer.php"; ?>