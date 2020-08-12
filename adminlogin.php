<?php
include'inc/aheader.php';
include'class/user.php';
session::init();
session::checkSession();
$user = new user();
?>
<?php
    if(isset($_GET['action']) && $_GET['action'] == 'logout')
    {
        session::destroy();
    }
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
                <?php
                   $login=session::get('login');
                    if($login==true)
                {

                ?>
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
      <?php
    session::init();
    $loginmsg=session::get('loginmsg');
    echo $loginmsg;
    $loginmsg=session::set('loginmsg',null);
?>
       
        <table class=" table table-bordered table-dark table-hover  table-sm wow shake">
        <th>Sl No</th>
        <th>Usernmae</th>
        <th>Email</th>
        <th>Action</th>
<?php
$result = $user->select();
if($result)
{
$i = 0;
foreach($result as $value)
{
    $i++;
    
?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $value['username'];?></td>
            <td><?php echo $value['email'];?></td>
            <td>
             <a  href='adminlogin.php? action=delete&id=<?php echo $value['id']?>'>delete</a>
            </td>
        </tr>  
    <?php }} ?>
    </table>
<?php
if(isset($_GET['action']) && $_GET['action'] == 'delete')
{
$id=$_GET['id'];
$result=$user->delete($id);
if($result)
{
$msg="<div class='alert alert-danger text-center'><strong>Data Deleted success fully!</strong></div>";
echo $msg;
}
}
?>
</div>
</section>
<?php
include'inc/footer.php';
?>