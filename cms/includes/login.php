<?php include "db.php";?>
<?php include "../admin/function.php"?>
<?php session_start();?>
<?php
if(isset($_POST['login'])){
$username=$_POST['username'];
$password=$_POST['password'];

$username=mysqli_real_escape_string($connection,$username);
$password=mysqli_real_escape_string($connection,$password);

$query="SELECT * FROM users WHERE user_name='$username' ";
$select_user_query=mysqli_query($connection,$query);

confirmQuery($select_user_query);
while($row=mysqli_fetch_assoc($select_user_query)){
    $user_id=$row['user_id'];
    $user_name=$row['user_name'];
    $user_password=$row['user_password'];
    $user_firstname=$row['user_firstname'];
    $user_lastname=$row['user_lastname'];
    $user_role=$row['user_role'];
}

if($username !==$user_name && $password !==$user_password){
    header("Location: ../index.php");
    echo "<script type='text/javascript'>alert('incorrect password!')</script>";

}
else if($username==$user_name&&$password==$user_password){
    $_SESSION['user_id']=$user_id;
    $_SESSION['user_name']=$user_name;
    $_SESSION['user_firstname']=$user_firstname;
    $_SESSION['user_lastname']=$user_lastname;
    $_SESSION['user_role']=$user_role;
    header("Location: ../admin");
}
else{
    header("Location: ../index.php");
}

}
?>