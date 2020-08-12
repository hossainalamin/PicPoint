<?php
include'inc/rheader.php';
include'class/user.php';
?>
<?php
    $user= new user();
    if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['register']))
    {
        $result=$user->registration($_POST);
    }
    
?>

<!--From-->
<section>
    <div class="card" id="register">
        <div class="card-header bg-dark">
            <h2 class="text-light text-center">User Registration</h2>
        </div>
        <div class="card-body wow bounceInUp">
            <form action="" method="post"style="margin: 0 auto;"class="form mt-5 pt-5">
                <div class="form-group">
                    <label for="Email" class="text-danger h4">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Email">
                    <label for="username" class="text-danger h4">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter name">
                    <label for="password" class="text-danger h4">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                    <input type="submit" class="btn btn-primary mt-2" value="Register" name="register">
                    <input type="reset"class="btn btn-danger mt-2" value="reset" name="Clear">
                </div>
                <?php
                    if(isset($result))
                    {
                        echo $result;
                        echo"<br>";
                    }
    
                    ?>
            </form>
        </div>
    </div>
</section>
<?php
include 'inc/footer.php';
?>
