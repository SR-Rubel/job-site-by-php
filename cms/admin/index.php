<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
    <?php include "includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid sadow2">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin Page
                            
                            <small><?php echo $_SESSION['user_name'];?></small>
                        </h1>
                    </div>
                </div>








<!-- ++++++++++++admin widgets++++++++++++++++++++ -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary sadow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
        <?php
                $query="SELECT * FROM post";
                $select_all_cat_query=mysqli_query($connection,$query);
                $post_count=mysqli_num_rows($select_all_cat_query);
                echo "<div class='huge'>$post_count</div>";
        ?>
                  
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green sadow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

        <?php
        
            $query="SELECT * FROM comments";
            $select_all_cat_query=mysqli_query($connection,$query);
            $comment_count=mysqli_num_rows($select_all_cat_query);
            echo "<div class='huge'>$comment_count</div>";
        
        ?>
        <?php
        
            $query="SELECT * FROM comments WHERE comment_status='unapproved' ";
            $select_all_cat_query=mysqli_query($connection,$query);
            $unapproved_comment_count=mysqli_num_rows($select_all_cat_query);
        
        ?>
        <?php
        
            $query="SELECT * FROM comments WHERE comment_status='unapproved' ";
            $select_all_cat_query=mysqli_query($connection,$query);
            $unapproved_comment_count=mysqli_num_rows($select_all_cat_query);
        
        ?>
        <?php
        
            $query="SELECT * FROM post WHERE post_status='draft' ";
            $select_all_cat_query=mysqli_query($connection,$query);
            $draft_post_count=mysqli_num_rows($select_all_cat_query);
        
        ?>
        <?php
        
            $query="SELECT * FROM users WHERE user_role='subscriber' ";
            $select_all_cat_query=mysqli_query($connection,$query);
            $subscriber_count=mysqli_num_rows($select_all_cat_query);
        
        ?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow sadow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

        <?php

        $query="SELECT * FROM users";
        $select_all_cat_query=mysqli_query($connection,$query);
        $user_count=mysqli_num_rows($select_all_cat_query);
        echo "<div class='huge'>$user_count</div>";

        ?>

                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red sadow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">


            <?php

            $query="SELECT * FROM categories";
            $select_all_cat_query=mysqli_query($connection,$query);
            $categories_count=mysqli_num_rows($select_all_cat_query);
            echo "<div class='huge'>$categories_count</div>";

            ?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- ++++++++++++admin widgets++++++++++++++++++++ -->

    <div class="row container">
            <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
    </div>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
  

    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['data','count'],

<?php
$element_text=['Active posts','categories','Users','comments','subscriber','draft post','unapproved comment'];
$element_count=[$post_count,$categories_count,$user_count,$comment_count,$subscriber_count,$draft_post_count,$unapproved_comment_count];
for($i=0;$i<7;$i++){
    echo "['$element_text[$i]',$element_count[$i]],";
}
?>
          
        ]);

        var options = {
          chart: {
            title: 'Website data',
            subtitle: 'all the post',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<?php include "includes/admin_footer.php"; ?>