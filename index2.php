<?php
session_start();
if($_SESSION["userConnecte"]["role"]=="visiteur"){
header('Location:../index.php');
}
$userPrenom = $_SESSION["userConnecte"]["userPrenom"] ?? "Invité";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Patapouf Airport</title>

    <!--

    Breezed Template

    https://templatemo.com/tm-543-breezed

    -->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-breezed.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->


<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="assets/images/projetvol.png" height="70" width="100"/>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="submenu">
                            <a href="javascript:">Menu</a>
                            <ul>
                                <li><a href="">Vol</a></li>
                                <li><a href="">Avions</a></li>
                                <li><a href="">Reservation</a></li>
                            </ul>
                        </li>
                        <li class="item">
                            <a href="vue/gestionUtilisateur.php">Mon compte</a>
                        </li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner header-text" id="top">
    <div class="Modern-Slider">
        <!-- Item -->
        <div class="item">
            <div class="img-fill">
                <img src="assets/images/slide-01.jpg" alt="">
                <div class="text-content">
                    <h3>Bienvenue sur le site de Patapouf Airport</h3>
                    <h5>Vol imminent</h5>
                    <a href="#" class="main-stroked-button">Voir</a>
                </div>
            </div>
        </div>
        <!-- // Item -->
        <!-- Item -->
        <div class="item">
            <div class="img-fill">
                <img src="assets/images/slide-02.jpg" alt="">
                <div class="text-content">
                    <h3>Bienvenue sur le site de Patapouf Airport</h3>
                    <h5>Nos avions</h5>
                    <a href="#" class="main-stroked-button">Voir</a>
                </div>
            </div>
        </div>
        <!-- // Item -->
    </div>
</div>
<div class="scroll-down scroll-to-section"><a href="#about"><i class="fa fa-arrow-down"></i></a></div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Features Big Item Start ***** -->
<section class="section" id="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="section-heading">
                    <h6>Subscribe Newsletters</h6>
                    <h2>Don’t miss this chance!</h2>
                </div>
                <div class="subscribe-content">
                    <p>Vivamus suscipit blandit nibh, in cursus mi. Proin vel blandit metus, et auctor elit. Vivamus tincidunt tristique convallis. Ut nec odio vel arcu euismod semper nec ac sem.</p>
                    <div class="subscribe-form">
                        <form id="subscribe-now" action="" method="get">
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="text" id="email" placeholder="Enter your email..." required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Subscribe Now</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Features Big Item End ***** -->


<!-- ***** Projects Area Starts ***** -->
<section class="section" id="projects">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="section-heading">
                    <h6>Our Projects</h6>
                    <h2>Some of our latest projects</h2>
                </div>
                <div class="filters">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".des">Web Design</li>
                        <li data-filter=".dev">Web Development</li>
                        <li data-filter=".gra">Graphics</li>
                        <li data-filter=".tsh">Artworks</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="filters-content">
                    <div class="row grid">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all des">
                            <div class="item">
                                <a href="assets/images/project-big-item-01.jpg" data-lightbox="image-1" data-title="Our Projects"><img src="assets/images/project-item-01.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all dev">
                            <div class="item">
                                <a href="assets/images/project-big-item-02.jpg" data-lightbox="image-1" data-title="Our Projects"><img src="assets/images/project-item-02.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all gra">
                            <div class="item">
                                <a href="assets/images/project-big-item-03.jpg" data-lightbox="image-1" data-title="Our Projects"><img src="assets/images/project-item-03.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all tsh">
                            <div class="item">
                                <a href="assets/images/project-big-item-04.jpg" data-lightbox="image-1" data-title="Our Projects"><img src="assets/images/project-item-04.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all dev">
                            <div class="item">
                                <a href="assets/images/project-big-item-05.jpg" data-lightbox="image-1" data-title="Our Projects"><img src="assets/images/project-item-05.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all des">
                            <div class="item">
                                <a href="assets/images/project-big-item-06.jpg" data-lightbox="image-1" data-title="Our Projects"><img src="assets/images/project-item-06.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Projects Area Ends ***** -->

<!-- ***** Testimonials Starts ***** -->
<section class="section" id="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>les hommes à tous faire</h2>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mobile-bottom-fix-big" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                <div class="owl-carousel owl-theme">
                    <div class="item author-item">
                        <div class="member-thumb">
                            <img src="assets/images/photothomas.jpg" alt="">
                            <div class="hover-effect">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <h4>.01 The Great Tetard</h4>
                        <span>Developpeur (bien nul)</span>
                    </div>
                    <div class="item author-item">
                        <div class="member-thumb">
                            <img src="assets/images/1734355398932.jfif" alt="">
                            <div class="hover-effect">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <h4>.02 The Bad Tetard</h4>
                        <span>Inspecteur des travaux finie</span>
                    </div>
                    <div class="item author-item">
                        <div class="member-thumb">
                            <img src="assets/images/1584648681566.jfif" alt="">
                            <div class="hover-effect">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <h4>.03 Mr Lemoine</h4>
                        <span>Prof hors pair</span>
                    </div>
                    <div class="item author-item">
                        <div class="member-thumb">
                            <img src="assets/images/1516893151544.jfif" alt="">
                            <div class="hover-effect">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <h4>.04 Mr Mattei</h4>
                        <span>Gérant BTS et Prof a ces heures perdue</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Testimonials Ends ***** -->

<!-- ***** Footer Start ***** -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div class="left-text-content">
                    <p>Copyright &copy; 2025

                        - Designed <a rel="nofollow noopener">By Thomas</a></p>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="right-text-content">
                    <ul class="social-icons">
                        <li><p>Follow Us</p></li>
                        <li><a rel="nofollow" href="https://fb.com/templatemo"><i class="fa fa-facebook"></i></a></li>
                        <li><a rel="nofollow" href="https://fb.com/templatemo"><i class="fa fa-twitter"></i></a></li>
                        <li><a rel="nofollow" href="https://fb.com/templatemo"><i class="fa fa-linkedin"></i></a></li>
                        <li><a rel="nofollow" href="https://fb.com/templatemo"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/isotope.js"></script>

<!-- Global Init -->
<script src="assets/js/custom.js"></script>

<script>

    $(function() {
        var selectedClass = "";
        $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
                $("."+selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);

        });
    });

</script>

</body>
</html><?php
