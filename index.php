<?php 
include './components/top-menu.php'; 
include './db-connection.php';  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DHO</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/animated-services.css">
    <link rel="stylesheet" href="assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Navbar---Logo-Left---Phone-Logo-Left.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer-.css">
    <link rel="stylesheet" href="assets/css/Swipe-Slider-7-styles.min.css">
    <style type="text/css">
.marquee-container {
    white-space: nowrap;
    overflow: hidden;
    position: relative;
    background-color: #e20b0b; /* Background color */
    color: #ffffff; /* Text color */
    font-size: 20px;
    font-weight: bolder;
    padding: 2px;
    line-height: 150%;
    text-shadow: 4px 3px 3px #000000;
}

.marquee-item {
    display: inline-block;
    padding-right: 100%;
    animation: marquee 35s linear infinite;
    background-color: inherit; /* Inherit container's background color */
}

@keyframes marquee {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(-100%);
    }
}

    </style>
</head>

<body>
   <!-- <nav class="navbar navbar-light navbar-expand-md sticky-top" style="border-bottom: black solid 2px;">
        <div class="container-fluid"><a class="navbar-brand" href="#"><img id="logoimage" src="assets/img/dheart2.png"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">google-site-verification=leoPTJQAwk3O4C1GZmDVExm3wCR73ZfCJgA8H3rUif0
                    <li class="nav-item navitems"><a class="nav-link active" href="./index.php">Home</a></li>
                    <li class="nav-item navitems"><a class="nav-link active" href="gallery.php">Gallery</a></li>
                    <li class="nav-item navitems"><a class="nav-link active" href="#services">Program</a></li>
                    <li class="nav-item navitems"><a class="nav-link active" href="donation.php">Donation</a></li>
                    <li class="nav-item navitems"><a class="nav-link active" href="contact_us.php">contact us</a></li>
                    <li class="nav-item navitems"><a class="nav-link active" href="child-gallery-unsponsored.php">Child</a></li>
                </ul>
            </div>
        </div>
    </nav>-->
   <div class="marquee-container">
        <div class="marquee-item">
        <span>Your Generosity in Action Transform Lives Today!</span>
    </div>
    <div class="marquee-item">
        <span>Donate via bank transfer, you can send your contribution to the following bank account:</span>
        <span>Bank Name: <strong>NMB</strong></span>
        <span>Account Number: <strong>21010022585</strong></span>
    </div>
    <div class="marquee-item">
        <span>Donate today, and let's change lives together!</span>
    </div>
</div>
    <section id="carousel">
        <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <div class="bg-light border rounded border-light pulse animated hero-nature carousel-hero jumbotron py-5 px-4">
                        <h1 class="hero-title">Building Dreams Together</h1>
                        <p class="hero-subtitle">In the heart of our loving community, we come together to build dreams. Every step we take creates a future filled with laughter, opportunities, and the warmth of a caring family..</p>
                        <p><a class="btn btn-primary hero-button plat" role="button" href="donation-form.php">Donate Now</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="bg-light border rounded border-light pulse animated hero-photography carousel-hero jumbotron py-5 px-4">
                        <h1 class="hero-title">Pathways to Hope</h1>
                        <p class="hero-subtitle">Step onto the pathway where every footfall carries hope. In our embrace, orphaned children find not just shelter, but the promise of brighter days. Join us on this journey of transformation and discovery..</p>
                        <p><a class="btn btn-primary hero-button plat" role="button" href="donation-form.php">Donate Now</a></p>
                    </div>
                </div>
                <div class="carousel-item active">
                    <div class="bg-light border rounded border-light pulse animated hero-technology carousel-hero jumbotron py-5 px-4">
                        <h1 class="hero-title">Empowering Future Leaders</h1>
                        <p class="hero-subtitle">Here, we don't just walk; we stride toward a future filled with promise. Our mission is to empower these young souls, nurturing them into confident and compassionate leaders of tomorrow.</p>
                        <p><a class="btn btn-primary hero-button plat" role="button" href="donation-form.php">Donate Now</a></p>
                    </div>
                </div>
            </d div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-bs-target="#carousel-1" data-bs-slide-to="0"></li>
                <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
                <li data-bs-target="#carousel-1" data-bs-slide-to="2" class="active"></li>
            </ol>
        </div>
    </section>
<section id="services" class="services">
    <div class="container-md section-title">
        <div class="text-center">
            <h2 style="color: #75aadb;">Change Lives with Your Support</h2>
            <p class="d-inline-block program-description"><strong> When you donate to our programs, you're not just giving money; you're giving hope and a brighter future to orphaned and vulnerable children. Your generosity has the power to transform lives.</strong><br>&nbsp; &nbsp;&nbsp;</p>
        </div>
        <div class="row" style="margin-bottom: 20px;">
            <?php
            $sql = "SELECT * FROM programs";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
            ?>
                <div class="col-12 text-center col-md-6 col-lg-4 mb-5">
                    <div class="text-center icon-box">
                        <div class="icon"><i class="fab fa-renren" style="margin-bottom: 15px;"></i>
                            <h4 class="title"><?php echo $row['program_title'] ?><a href="#"></a></h4>
                            <p class="description"><?php echo $row['program_desc'] ?><br>&nbsp; &nbsp; &nbsp;&nbsp;</p>
                        </div>
                    </div>
                </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>


    <!--<footer>
        <div class="row">
            <div class="col-sm-6 col-md-4 footer-navigation">
                <h3><a href="#">Company<span>logo </span></a></h3>
                <p class="links"><a href="#">Home</a><strong> · </strong><a href="#">Blog</a><strong> · </strong><a href="#">Pricing</a><strong> · </strong><a href="#">About</a><strong> · </strong><a href="#">Faq</a><strong> · </strong><a href="#">Contact</a></p>
                <p class="company-name">Company Name © 2015 </p>
            </div>
            <div class="col-sm-6 col-md-4 footer-contacts">
                <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                    <p><span class="new-line-span">21 Revolution Street</span> Paris, France</p>
                </div>
                <div><i class="fa fa-phone footer-contacts-icon"></i>
                    <p class="footer-center-info email text-start"> +1 555 123456</p>
                </div>
                <div><i class="fa fa-envelope footer-contacts-icon"></i>
                    <p> <a href="#" target="_blank">support@company.com</a></p>
                </div>
            </div>
            <div class="col-md-4 footer-about">
                <h4>About the company</h4>
                <p> Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet. </p>
                <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-github"></i></a></div>
            </div>
        </div>
    </footer>-->
     
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Swipe-Slider-7.js"></script>
    <?php include './components/footer.php'; ?>
</body>
</html>