<?php
include'inc/pheader.php';
include'class/user.php';
session::init();
session::checkSession();
$user=new user();
?>
<?php
if(isset($_GET['action']) and isset($_GET['action'])=='logout')
{
    session::destroyagain();
}
?>

<body>
    <!--navigation-->
    <nav class="navbar navbar-light navbar-expand-md"uk-sticky="top: 100; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up">
       <div class="container">
           <a href="profile.php" class="navbar-brand">PicPoint</a>
           <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav ml-auto">
                    <?php
                   $login=session::get('login');
                    if($login==true)
                {

                ?>
                   <li class="nav-item"><a href="userlogin.php" class="nav-link">Gallary</a></li>
                   <li class="nav-item"><a href="?action=logout" class="nav-link">Logout</a></li>
                   <?php }else { ?>
                   <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                   <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
                   <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                   <li class="nav-item "><a href="admin.php" class="nav-link">Admin</a></li>
                   <?php } ?>
               </ul>
           </div>
       </div>
    </nav>
<?php
if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['update']))
{
    $id=session::get('id');
    $update=$user->userUpdate($id,$_POST);
}
?>
<section id="profile">
   <div class="container-fluid">
      <?php
    session::init();
    $loginmsg=session::get('loginmsg');
    echo $loginmsg;
    $loginmsg=session::set('loginmsg',null);
?>
   <div class="row">

   <div class="col-md-6 p-2">
    <p class="lead text-justify">
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et tempora hic optio laborum qui eius quam officia voluptatibus, ex sapiente dolorum, repudiandae amet atque explicabo maxime a laudantium! Error nemo suscipit iure voluptatum nobis laboriosam minima in odio, delectus, beatae quis illum explicabo illo eaque qui voluptas cum rerum, ipsa dolorem! Aliquam vel laboriosam ullam quibusdam, laborum ipsa quis fuga reiciendis dolores autem optio est sit quia atque, doloribus excepturi earum modi debitis id? Quasi eligendi atque veniam facere eaque odio vero molestiae commodi. Fuga rem quaerat facere magnam perferendis vitae repellat harum, quo laboriosam error velit architecto, ex vero.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt earum, id quaerat voluptas explicabo natus inventore perspiciatis culpa iste. Cumque qui provident voluptatem fugit sequi ad placeat eos similique, incidunt adipisci minus tempora animi nostrum quo, recusandae alias accusantium quia laudantium. Natus ab repudiandae beatae voluptates unde vel, laboriosam porro.
           </p>
 
       
          
       </div>
   <div class="col-md-6">
    <div class="card wow bounceInRight mt-3">
        <div class="card-header">
            <h2>User Profile</h2>
        </div>
        <div class="card-body">
            <?php
            if(isset($_GET['id']))
            $id=$_GET['id'];
            $userdata=$user->getDataById(session::get('id'));  
                if($userdata)
                {
            ?>
            <form action="" method="post" style="max-width:600px;margin: 0 auto;">
                <div class="form-group">
                    <label for="usernmae">Username:</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $userdata->username;?>">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $userdata->email;?>">
                    <?php }?>


                    <?php
                    if(isset($update))
                    {
                    echo"<br>";
                    echo $update;
                    }
                               
                    ?>
                    <input type="submit" class="btn btn-success mt-2" value="Update" name="update">
                    <a href="changepass.php"class="btn btn-primary mt-2">Change Password</a>
                </div>
            
            </form>
        </div>
       </div>
    </div>
       </div>
    </div>
</section>
<?php include'inc/footer.php';?>
