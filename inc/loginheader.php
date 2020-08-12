<?php include'../class/user.php';
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
