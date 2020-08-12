<?php
include'inc/aheader.php'; 
include'class/user.php';
session::init();
session::checkSession();
?>
<?php
$id=session::get('id');
$user=new user();
if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['updatepass']))
{
    $updatepass=$user->userPassword($id,$_POST);
}
?>
<section id="body">
    <div class="card">
        <div class="card-header">
            <a href="profile.php" class="btn btn-primary float-right">Back</a>
            <h2>Password Change</h2>
        </div>
        <div class="card-body wow shake">
            <form action="" method="post"style="max-width:600px min-width:450px;margin: 0 auto;">
                <div class="form-group">
                    <label for="old pass">Old password:</label>
                    <input type="password" name="old" class="form-control">
                    <label for="new pass">New Password:</label>
                    <input type="password" name="new" class="form-control">    

                            <?php
                            if(isset($updatepass))
                            {
                                echo"<br>";
                                echo $updatepass;
                            }
                               
                            ?>
                    <input type="submit" class="btn btn-success mt-2" value="Update" name="updatepass">
                </div>
            </form>
        </div>
    </div>
</section>
<?php include'inc/footer.php';?>
