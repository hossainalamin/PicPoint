<?php 
include'inc/lheader.php';
include'class/user.php';
session::checkLogin();
$user = new user();
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['login']))
{
    $result = $user->userLogin($_POST);   
}
?>
<!--Login-->
<section id="body">
    <div class="card"id="register">
            <div class="card-header bg-dark">
                <h2 class="text-light text-center">User login</h2>
            </div>
            <div class="card-body wow bounceInLeft">
                <form action="" method="post" style="margin: 0 auto;"class="form mt-5 pt-5">
                    <div class="form-group">
                        <label for="email" class="h4 text-danger">Email:</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Email">
                        <label for="password" class="h4 text-danger">Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        <input type="submit" class="btn btn-primary mt-2" value="Login" name="login">
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
include'inc/footer.php';
?>
