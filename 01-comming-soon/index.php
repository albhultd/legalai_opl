<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>LegalAI by OPL</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Stylesheets -->
    <link href="common-css/bootstrap.css" rel="stylesheet">
    <link href="common-css/ionicons.css" rel="stylesheet">
    <link rel="stylesheet" href="common-css/jquery.classycountdown.css" />
    <link href="style/css/styles.css" rel="stylesheet">
    <link href="style/css/responsive.css" rel="stylesheet">
</head>
<body>
<div class="main-area">
    <div class="container full-height position-static">
        <section class="left-section full-height">
            <a class="logo" href="#"><img src="images/logo.png" alt="Logo"></a>
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="main-content">
                        <h1 class="title"><b>Join our waitlist</b></h1>
                        <p>Welcome to NeLa, the Neuron Lawyer! If you sign up, we will notify you on the launch date and other developments related to NeLa</p>
                        <div class="email-input-area">
                            <form action="submit.php" method="POST" class="subscribe-form">
                                <input type="text" name="name" placeholder="Your Name" required>
                                <input type="email" name="email" placeholder="Your Email Address" required>
                                <input type="text" name="company" placeholder="Company Name" required>
                                <label for="agree">
                                    <input type="checkbox" id="agree" name="agree" required>
                                    <span>I have read  <a href="#">the privacy policy</a></span>
                                </label>
                                <!-- Add reCAPTCHA -->
                                <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
                                <button type="submit">Subscribe</button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="footer-icons">
                <li>Stay in touch : </li>
                <li><a href="https://www.facebook.com/OPLgunnercooke" target="_blank"><i class="ion-social-facebook"></i></a></li>
                <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
            </ul>
        </section>
        <section class="right-section" style="background-image: url(images/bg.webp)">
            <div class="display-table center-text" style="
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgb(135 208 238 / 50%); /* Blue color with 50% opacity */
            ">
                <div class="display-table-cell">
                </div>
            </div>
            <div class="display-table-cell">
            </div>
        </section><!-- right-section -->
    </div><!-- container -->
</div><!-- main-area -->
<script src="common-js/jquery-3.1.1.min.js"></script>
<script src="common-js/tether.min.js"></script>
<script src="common-js/bootstrap.js"></script>
<script src="common-js/jquery.classycountdown.js"></script>
<script src="common-js/jquery.knob.js"></script>
<script src="common-js/jquery.throttle.js"></script>
<script src="common-js/scripts.js"></script>
</body>
</html>
