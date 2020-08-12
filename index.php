<?php
include 'inc/header.php';
include 'class/user.php';
?>
        <!--Slider-->
    <section id="showcase">
        <div id="slider1" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#slider1" data-slide-to="0"></li>
                <li data-target="#slider1" data-slide-to="1"></li>
                <li data-target="#slider1" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item carousel-img-1 active">
                    <div class="container">
                        <div class="carousel-caption  mb-md-5pb-md-5">
                            <h2 class="display-4">Hello</h2>
                            <p class="lead text-danger">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, odit.</p>
                            <a href="" class="btn btn-outline-danger">Learn more</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-img-2">
                    <div class="container">
                        <div class="carousel-caption  mb-md-5 pb-md-5 text-left">
                            <h2 class="display-4">Hello</h2>
                            <p class="lead text-danger">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, odit.</p>
                            <a href="" class="btn btn-outline-danger">Learn more</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-img-3">
                    <div class="container">
                        <div class="carousel-caption mb-md-5 pb-mb-5 text-right">
                            <h2 class="display-4">Hello</h2>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, odit.</p>
                            <a href="" class="btn btn-outline-danger">Learn more</a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#slider1" class="carousel-control-prev" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a href="#slider1" class="carousel-control-next" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

    </section>
<!--Main-->
<section id="main">
    <h2 class="display-4 text-center p-4 bg-danger text-light">Admin Panel</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card wow bounceInLeft">
                    <div class="card-img-top">
                       <img src="img/maisha.jpg" alt="">
                        <div class="card-header text-center"><h2>Maisha Muntaha</h2></div>
                    </div>
                    <div class="card-body">
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas quibusdam obcaecati impedit illo placeat, ad, quam perspiciatis! Blanditiis incidunt officia ea amet laudantium. Ab nesciunt voluptates, repellendus optio vero dolor.lorem ipsum dolor sit amet.</p>
                        <a href="https://www.facebook.com/profile.php?id=100005562049014"Class="btn btn-outline-danger">Learn more</a>
                    </div>
                </div>
            </div>
               <div class="col-md-6">
                <div class="card wow bounceInRight">
                    <div class="card-img-top">
                       <img src="img/alamin.jpg" alt="">
                        <div class="card-header text-center"><h2>Md Alamin hossain</h2></div>
                    </div>
                    <div class="card-body">
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas quibusdam obcaecati impedit illo placeat, ad, quam perspiciatis! Blanditiis incidunt officia ea amet laudantium. Ab nesciunt voluptates, repellendus optio vero dolor.</p>
                        <a href="https://www.facebook.com/profile.php?id=100008269657137"Class="btn btn-outline-danger">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
</section>
<!--Entertainment-->
    <section id=video class="text-center text-light">
      <h2 class="display-4 text-center p-4 bg-danger">Entertainment</h2>
            <div class="container">
                <div class="row">
                    <div class="col-sm pt-4 mt-5">
                        <div uk-lightbox>
                            <a href="https://www.youtube.com/watch?v=KGfiRBm4xEs" class="text-danger">
                                <i class="fa fa-youtube-play" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h1>Purnota by warfaze...</h1>
                    </div>
                </div>
            </div>
    </section>
<?php
include"inc/footer.php";
?>
