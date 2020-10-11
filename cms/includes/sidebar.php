<div class="col-md-4">


                <!-- Blog Search Well -->
                <div class="well sadow2">
                    <h4>Content Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->



                </div>
                <!-- Blog Categories Well -->
                <div class="well sadow2">
                    <h4>Content Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">


                                <?php
                                $query="SELECT * FROM categories";
                                $select_all_cat=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($select_all_cat)){
                                $cat_id=$row['cat_id'];
                                $post_cat=$row['cat_title'];
                                echo "<li><a href='./category_sort.php?category=$cat_id'>{$post_cat}</a>";
                                }
                                ?>


                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                 <!-- Side Widget Well -->
                 <?php include "widget.php";?>

                 <!--Login -->
                <div class="well sadow2">

                <?php if(isset($_SESSION['user_role'])): ?>

                <h4>Logged in as <?php echo $_SESSION['user_name'] ?></h4>

                <a href="includes/logout.php" class="btn btn-primary">Logout</a>

                <?php else: ?>

                <h4>Login</h4>

                <form method="post" action="includes/login.php">
                <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Enter Username">
                </div>

                <div class="input-group">
                <input name="password" type="password" class="form-control" placeholder="Enter Password">
                <span class="input-group-btn">
                <button class="btn btn-primary" name="login" type="submit">Submit
                </button>
                </span>
                </div>

                <div class="form-group">

                <a href="forgot.php?forgot=<?php echo uniqid(true); ?>">Forgot Password</a>


                </div>

                </form><!--search form-->
                <!-- /.input-group -->



                <?php endif; ?>



                </div>

</div>