    <?php
        if(isset($_POST['create_user'])){
            $user_firstname=$_POST['user_firstname'];
            $user_lastname=$_POST['user_lastname'];
            $user_role=$_POST['user_role'];
            $user_name=$_POST['user_name'];
            $user_image=$_FILES['image']['name'];
            $user_image_temp=$_FILES['image']['tmp_name'];
            
            $user_email=$_POST['user_email'];
            $user_password=$_POST['user_password'];
            // $post_date=date('d-m-y');
            // $post_comment_count=0;
        
            move_uploaded_file($user_image_temp,"./images/user_img/$user_image");
            $query="INSERT INTO users(user_name,user_password,user_firstname,user_lastname,user_email,user_image,user_role) VALUES('$user_name','$user_password','$user_firstname','$user_lastname','$user_email','$user_image','$user_role')";
            $create_user_query=mysqli_query($connection,$query);
            confirmQuery($create_user_query);
            echo "<p>user has been created: <a href='users.php'>view user</a></p>";
        }
    ?>



    <form action="" method="post" enctype="multipart/form-data">    


    <div class="form-group">
    <label for="title">Firstname</label>
    <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
    <label for="lastname">Lastname</label>
    <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <select name="user_role" id="">
            <option value="admin">Select Option</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div> 
<!-- 
    <div class="form-group">
    <label for="category">Category</label>
    <select name="post_category" id="">




    </select>

    </div> -->


    <!-- <div class="form-group">
    <label for="users">Users</label>
    <select name="post_user" id="">




    </select>

    </div> -->

    <div class="form-group">
    <label for="user_name">Username</label>
    <input type="text" class="form-control" name="user_name">
    </div>

<!-- 
    <div class="form-group">
    <select name="post_status" id="">
    <option value="draft">Post Status</option>
    <option value="published">Published</option>
    <option value="draft">Draft</option>
    </select>
    </div> -->



    <div class="form-group">
    <label for="user_image">user Image</label>
    <input type="file"  name="image">
    </div>

    <div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" class="form-control" name="user_password">
    </div>



    <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>


    </form>
