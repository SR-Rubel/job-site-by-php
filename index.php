<?php ob_start();?>
<?php session_start(); ?>
<?php include "cms/includes/db.php"?>
<?php include "function.php"?>
<?php include "cms/admin/function.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image" href="img/favicon.png">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="/css/navbar-fixed.css">
    <link rel="stylesheet" href="css/style.css">
    <title>learn web</title>
</head>
<body>
<!-- head secction -->
    <section id="home-top-section">
      <div class="dark-overlay">
        <div class="home-inner">
          <div class="container">
            <div class="row">
              <div class="col-md-8 my-5">
                

                <nav class="navbar navbar-dark navbar-expand-md mb-5">
                  <div class="container">
                    <a class="navbar-brand"href="#">WEB HELP</a>
                    <button class="navbar-toggler" type="button" name="button" data-toggle="collapse" data-target="#small_nav">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="small_nav">
                      <ul class="navbar-nav ml-auto light">
                        <li class="nav-item" ><a class="nav-link" href="cms/index.php">Post</a></li>
                        <li class="nav-item" ><a class="nav-link" href="#create-main-section">Experts profile</a></li>
                        <li class="nav-item" ><a class="nav-link" href="#create-main-section">Create</a></li>
                        <li class="nav-item" ><a class="nav-link" href="#share-head-section">Share</a></li>
                      </ul>
                    </div>
                  </div>
                </nav>

                <h1 class="display-4">WEB HELP <strong>A paltfrom of learning web</strong> and expert people <strong></strong> </h1>
                <div class="d-flex flex-row">
                  <div class="p-4 align-self-start mt-1">
                    <i class="fa fa-check"></i>
                  </div>
                  <div class="p-4 align-self-end">
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime sit vitae consectetur animi harum inventore ex dignissimos fugiat veritatis amet.</p>
                  </div>
                </div>
                <div class="d-flex flex-row">
                  <div class="p-4 align-self-start mt-1">
                    <i class="fa fa-check"></i>
                  </div>
                  <div class="p-4 align-self-end">
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime sit vitae consectetur animi harum inventore ex dignissimos fugiat veritatis amet.</p>
                  </div>
                </div>
                <div class="d-flex flex-row">
                  <div class="p-4 align-self-start mt-1">
                    <i class="fa fa-check"></i>
                  </div>
                  <div class="p-4 align-self-end">
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime sit vitae consectetur animi harum inventore ex dignissimos fugiat veritatis amet.</p>
                  </div>
                </div>

              </div>
              <div class="col-md-4 my-5 py-5">
                





            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Sign Up</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Log In</a>
            </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            



                  <div class="card bg-dark text-center my-5 py-5">
                  <div class="signup card-body">
                    <h3>Sign Up Today</h3>
                    <p>Please fill up this form to register</p>

                    <form role="form" action="index.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="sr-only">firstname</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter your first name">
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="sr-only">lastname</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Your lastname">
                        </div>
                          <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                          <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>

                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block text-light" value="Register">
                    </form>




                    <?php
                  if(isset($_POST['submit'])){
                  $username=$_POST['username'];
                  $email=$_POST['email'];
                  $password=$_POST['password'];
                  $firstname=$_POST['firstname'];
                  $lastname=$_POST['lastname'];
                  if(!empty($username)&&!empty($email)&&!empty($password)){
                  $username=mysqli_real_escape_string($connection,$username);
                  $email=mysqli_real_escape_string($connection,$email);
                  $email=strtolower($email);
                  $password=mysqli_real_escape_string($connection,$password);

                  $query="SELECT randsalt FROM users";
                  $select_randsalt_query=mysqli_query($connection,$query);
                  confirmQuery($select_randsalt_query);
                  $row=mysqli_fetch_array($select_randsalt_query);
                  $salt=$row['randsalt'];
                  // $password=crypt($password,$salt);
                  // $_SESSION['salt']=$password;
                  $query="INSERT INTO users(user_name,user_email,user_password,user_firstname,user_lastname,user_role) VALUES('$username','$email','$password','$firstname','$lastname','subscriber')";
                  $registration_query=mysqli_query($connection,$query);
                  confirmQuery($registration_query);
                  echo "<p class='bg-success'>Registration has been completed</p>";

                  }
                  else{
                  echo "feild should not be empty";
                  }

                  }
                  ?>

                  </div>
                  </div>





            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  


            <div class="card bg-dark text-center my-5 py-5">
                  <div class="signup card-body">
                    <h3>Log In</h3>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                          <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                          <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>

                        <input type="submit" name="login" id="btn-login" class="btn btn-primary btn-lg btn-block text-light" value="login">
                    </form>



<?php
if(isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['password'];
if(!empty($email)&&!empty($password)){
$email=mysqli_real_escape_string($connection,$email);
$password=mysqli_real_escape_string($connection,$password);
$email=strtolower($email);
$query="SELECT * FROM users WHERE user_email='$email' ";
$select_user_query=mysqli_query($connection,$query);

confirmQuery($select_user_query);
while($row=mysqli_fetch_assoc($select_user_query)){
    $user_id=$row['user_id'];
    $user_name=$row['user_name'];
    $user_password=$row['user_password'];
    // $user_password=crypt($user_password,$_SESSION['salt']);
    $user_email=$row['user_email'];
    $user_role=$row['user_role'];

if($email !==$user_email && $password !==$user_password){
    //  header("Location: index.php");
    echo "<script type='text/javascript'>alert('incorrect password!')</script>";

}
else if($email==$user_email&&$password==$user_password){
    $_SESSION['user_id']=$user_id;
    $_SESSION['user_name']=$user_name;
    $_SESSION['user_firstname']=$user_firstname;
    $_SESSION['user_lastname']=$user_lastname;
    $_SESSION['user_role']=$user_role;
    header("Location: cms/index.php");
}
else{
    echo "hello";
    header("Location: index.php");
}

}

}
else{
  echo "<script type='text/javascript'>alert('incorrect password!')</script>";
}

}
?>






                  </div>
                  </div>



            </div>
            </div>








              









              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Explore section -->
    <section id="Explore-head-section" class="text-center py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            
            <div class="col-sm-4 float-left">
              <h1 class="display-4">Category</h1>
              <?php countCategory();?>
            </div>
            <div class="col-sm-4 float-left">
            <h1 class="display-4">Post</h1>
              <?php countPost();?>
            </div>
            <div class="col-sm-4 float-left">
            <h1 class="display-4">Comments</h1>
            <?php countComment();?>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- Explore main section -->
    <section id="explore-main-section" class="bg-light py-5 text-dark">
      <div class="container">
          <div class="row">
            <div class="col-md-12">

              <h1 class="display-4 text-center">User Post Categoies Listed</h1>
              <ul class="list-group text-center">
                <?php listCategories(); ?>
              </ul>

            </div>
          </div>
      </div>
    </section>
    <!--creat-head-section  -->
    <section id="create-head-section" class="text-center py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

              <div class="mb-5 text-center">
                <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate est, consequuntur perferendis.</p>
              </div>
              
 


          </div>
        </div>
      </div>
    </section>
    <!-- creat main section -->
    <section id="create-main-section" class="">

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="2000">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="row">

                    <div class="col-6">
                      <blockquote class="blockquote bg-scondary ">
                      <p>“Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.”</p>
                      <p><cite> — Corey Woods, @Dribbble</cite></p>
                      </blockquote>
                    </div>

                    <div class="col-6">
                      <img class="w-100 img-fluid ml-auto pt-5" src="img/person_transparent.png"
                      alt="First slide">
                    </div>
                  </div>
                </div>
                <div class="carousel-item">

                    <div class="row">

                    <div class="col-6">
                    <blockquote class="blockquote display-6 font-italic ">
                    <p>“Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.”</p>
                    <p><cite> — Corey Woods, @Dribbble</cite></p>
                    </blockquote>
                    </div>

                    <div class="col-6">
                    <img class="w-100 img-fluid ml-auto pt-5" src="img/person_transparent_2.png"
                    alt="First slide">
                    </div>
                    </div>
                </div>
                
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>

    </section>
    <!--Share head section -->
    <section id="share-head-section" class="text-center py-5" style="background:rgba(137, 186, 22, 0.7);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="display-4">share</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea nulla ducimus veniam repellat nostrum, placeat aperiam maiores! Dicta, voluptatum molestiae.</p>
            <button type="button" name="button" class="btn btn-outline-light">Find Out More</button>
          </div>
        </div>
      </div>
    </section>
    <!-- share main section -->
    <section id="share-main-section" class="bg-light py-5 text-dark">
      <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-6 my-2">
              <img class="img-fluid rounded" src="img/share.jpg" alt="kid-photo">

            </div>
            <div class="col-md-12 col-lg-6">
              <h3>Share what you create</h3>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis aliquam sed cum, sunt, quia dicta? Animi, commodi, neque incidunt non atque aliquid voluptates nostrum, inventore tenetur asperiores a necessitatibus ut.</p>
                <div class="d-flex flex-row">
                  <div class="p-4 align-self-start mt-2">
                    <i class="fa fa-check"></i>
                  </div>
                  <div class="align-self-end">
                    <p class="lead p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                  </div>
                </div>
                <div class="d-flex flex-row">
                  <div class="p-4 align-self-start mt-2">
                    <i class="fa fa-check"></i>
                  </div>
                  <div class=" align-self-end">
                    <p class="lead p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                  </div>
                </div>
            </div>
          </div>
      </div>
    </section>
    <!-- footer secction -->

    <footer class="text-center py-5 text-dark">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>WEB HELP</h2>
            <p class="pb-1">Copyright © 2018</p>
            <p class="py-1">Designed By:<a class="text-warning"href="https://www.facebook.com/profile.php?id=100005003268391">Rubel Hossain</a> </p>
            <button type="button" name="button" class="btn btn-primary" data-toggle="modal" data-target="#Contact-window">Contact Us</button>
          </div>
        </div>
      </div>
    </footer>


    <div class="modal text-light" id="Contact-window">
      <div class="modal-dialog">
        <div class="modal-content bg-dark">
          <div class="modal-header">
            <h4 class="modal-title">Contact Us</h4>
            <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="" placeholder="Name">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" name=""  placeholder="Email">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" name="name" placeholder="Type your message here"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="send">
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/navbar-fixed.js">
    </script>
    <script>
        $('.count').each(function () {
        $(this).prop('Counter',0).animate({
          Counter: $(this).text()
        }, {
          duration: 4000,
          easing: 'swing',
          step: function (now) {
              $(this).text(Math.ceil(now));
          }
        });
        });
    </script>
</body>
</html>