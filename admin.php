<?php
include'inc/aheader.php';
include'class/user.php';
$user = new user();
session::checkLogin();
?>

<body>
    <!--navigation-->
    <nav class="navbar navbar-light navbar-expand-md"uk-sticky="top: 50; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up">
       <div class="container">
           <a href="index.php" class="navbar-brand">PicPoint</a>
           <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav ml-auto">
                   <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                   <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
                   <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                   <li class="nav-item active"><a href="admin.php" class="nav-link">Admin</a></li>
               </ul>
           </div>
       </div>
    </nav>
<!--From-->
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['admin']))
{
    $result = $user->adminLogin($_POST);   
}
?>
<section>
    <div class="card" id="register">
            <div class="card-header bg-dark">
                <h2 class="text-light text-center">Admin Login</h2>
            </div>
            <div class="card-body wow bounceInRight">
                <form action="" method="post" style="margin:0 auto;"class="form mt-5 pt-5">
                    <div class="form-group">
                        <label for="username" class="text-danger h4">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter username">
                        <label for="password" class="text-danger h4">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        <button class="btn btn-primary mt-3" name="admin" value="Submit">Login</button>
                    </div>
                    <?php
                    if(isset($result))
                    {
                        echo $result;
                    }
                    
                    ?>
                </form>
            </div>
        </div>
    
</section>
<?php
include 'inc/footer.php';
?>
