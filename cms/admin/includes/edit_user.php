<?php
    if(isset($_GET['user_id'])){
        $user_id=$_GET['user_id'];
    }
     $select_query="SELECT * FROM users WHERE user_id=$user_id";
     $edit_query=mysqli_query($connection,$select_query);
     while($row=mysqli_fetch_assoc($edit_query)){
     $user_id=$row['user_id'];
     $user_name=$row['user_name'];
     $user_password=$row['user_password'];
     $user_firstname=$row['user_firstname'];
     $user_lastname=$row['user_lastname'];
     $user_email=$row['user_email'];
     $user_image=$row['user_image'];
     $user_role=$row['user_role'];
     }
?>


<form action="" method="post" enctype="multipart/form-data">    


<div class="form-group">
<label for="title">Firstname</label>
<input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname;?>">
</div>

<div class="form-group">
<label for="lastname">Lastname</label>
<input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname;?>">
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
<input type="text" class="form-control" name="user_name" value="<?php echo $user_name;?>">
</div>

<div class="form-group">
<img src="./images/user_img/<?php echo $user_image;?>" alt="" width="100px"><br>
<input  type="file" name="image">
</div>

<div class="form-group">
<label for="user_email">Email</label>
<input type="email" class="form-control" name="user_email" value="<?php echo $user_email;?>" >
</div>

<div class="form-group">
<label for="user_password">Password</label>
<input type="password" class="form-control" name="user_password" value="<?php echo $user_password;?>">
</div>



<div class="form-group">
<input class="btn btn-primary" type="submit" name="update" value="Upadate">
</div>


</form>


<?php
    if(isset($_POST['update'])){
     $user_id=$_GET['user_id'];
     $user_firstname=$_POST['user_firstname'];
     $user_lastname=$_POST['user_lastname'];
     $user_role=$_POST['user_role'];
     $user_name=$_POST['user_name'];
     $user_image=$_FILES['image']['name'];
     $user_image_temp=$_FILES['image']['tmp_name'];
     $user_email=$_POST['user_email'];
     $user_password=$_POST['user_password'];

     move_uploaded_file($user_image_temp, "./images/user_img/$user_image");
     if(empty($user_image)){
         $query="SELECT user_image FROM users WHERE user_id=$user_id";
         $image_query=mysqli_query($connection,$query);
         confirmQuery($image_query);
         while($row=mysqli_fetch_assoc($image_query)){
             $user_image=$row['user_image'];
         }
     }
    
     $query = "UPDATE users SET ";
     $query .="user_name  = '{$user_name}', ";
     $query .="user_password = '{$user_password}', ";
     //$query .="post_user = '{$post_user}', ";
     $query .="user_firstname = '{$user_firstname}', ";
     $query .="user_lastname   = '{$user_lastname}', ";
     $query .="user_email= '{$user_email}', ";
     $query .="user_image  = '{$user_image}',";
     $query .="user_role  = '{$user_role}'";
     $query .= "WHERE user_id = {$user_id} ";
    $update_user = mysqli_query($connection,$query);
        
    confirmQuery($update_user);
    
    echo "<p class='bg-success'>user Updated</p>";
    }
?>