<?php
include'inc/aheader.php';
include'class/user.php';
include'class/sense.php';
session::init();
session::checkSession();
$user = new user();
?>
<?php
    if(isset($_GET['action']) && $_GET['action'] == 'logout')
    {
        session::destroyagain();
    }
?>

<body>
    <!--navigation-->
    <nav class="navbar navbar-light navbar-expand-md" uk-sticky="top: 50; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up">
        <div class="container">
            <a href="index.php" class="navbar-brand">PicPoint</a>
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
                    <li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
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

    <!--user info-->
    <section id="userinfo">
        <div class="container-fluid pt-3">
            <div class="row">
                <form action='' method='post' enctype='multipart/form-data'>
                    <?php
if(isset($_POST['submit'])){
     $permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_temp = $_FILES['image']['tmp_name'];
                    $div       = explode('.', $file_name);
                    $file_ext  = strtolower(end($div));
                    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "uploads/".$unique_image;
                    
                    if (empty($file_name))
                    {
                    echo "<span class='error'>Please Select any Image !</span>";
                    }
                    elseif($file_size >104856)
                    {
                     echo "<span class='error'>Image Size should be less then 1MB!
                     </span>";
                    }
                    
                    elseif(in_array($file_ext, $permited) == false)
                    {
                     echo "<span class='error'>You can upload only:-"
                     .implode(', ', $permited)."</span>";
                    }
                    else
                    {
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "INSERT INTO user(image) 
                    VALUES('$uploaded_image')";
                    $inserted_rows = $user->insert($query,$uploaded_image);
                    if ($inserted_rows) {
                     echo "<span style='color:green;font-size=18px;'>Image Inserted Successfully.
                     </span>";
                    }else {
                     echo "<span style='color:red;font-size=18px;'>Image Not Inserted !</span>";
                    }
                    }
}

?>
                    <p><label class="ml-4">Select Image </label><br />
                        <input type="file" class="form-control ml-3" name="image" />
                        <input class="btn btn-primary ml-3" type='submit' name='submit' value='Submit'>
                    </p>
                </form>
            </div>
                <div class="row m-2">
                <?php
                    $sql = "select * from user";
                    $image = $user->images($sql);
                    if($image)
                    {
                        foreach($image as $data)
                        {
                ?>
                    <img src="<?php echo $data['image'];?>" alt="nothing" height="250px" width="420px">

                    <?php } }?>
                                                                                            
                </div>
        </div>
    </section>
    <?php
include'inc/footer.php';
?>
