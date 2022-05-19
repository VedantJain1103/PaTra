<?php
session_start(); 
session_unset(); 
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SignUp page</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Redressed&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Animated-CSS-Waves-Background-SVG.css">
    <link rel="stylesheet" href="assets/css/Animated-rainbow-shadow.css">
    <link rel="stylesheet" href="assets/css/Animated-Typing-With-Blinking.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Footer-Big-Logo.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled-1.css">
    <link rel="stylesheet" href="assets/css/untitled-2.css">
    <link rel="stylesheet" href="assets/css/untitled-3.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body>
    <header class="header-dark" style="height: 100%;width: 100%;border-style: none;border-color: rgba(0,0,0,0);">
        <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search" style="width: 100%;">
            <div class="container"><a class="navbar-brand" style="font-family: Redressed, serif;font-size: 50px;margin-left: 0px;margin-right: 0px;" href="#">PaTra</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav" style="margin-left: 85%;">
                        <li class="nav-item"></li>
                    </ul><button class="btn btn-primary" type="button"  style="background: rgb(235,59,96);border-color: rgba(255,255,255,0);"><a href="index.html" style="color:white;">Log In</a></button>
                </div>
            </div>
        </nav>
        <div class="container hero">
            <div class="row" style="width: 100%;">
                <div class="col-md-8 offset-md-2" style="margin-left: 120px;width: 80%;height: auto;">
                    <h1 class="text-center">&nbsp; &nbsp;To Trading Or Not To Trading</h1>
                    <section class="register-photo" style="background: rgba(241,247,252,0);width: 98%;height: auto;">
                        <div class="form-container">
                            <form method="post" action="signUp.php" style="background: rgba(255,255,255,0);width: 100%;">
                                <h2 class="text-center" style="color: rgb(218,221,224);"><strong>Create</strong> an account.</h2>
                                <div class="mb-3" style="width: 281px;"><input class="form-control" type="text" name="name" placeholder="Name" style="width: 780px;">
                                    <input class="form-control" type="text" name="gender" placeholder="Gender" min="1" max="1" style="width: 384px;margin-left: 0px;margin-top: 10px;"></div>
                                    <input class="form-control" type="date" name="dob" placeholder="DOB" style="width: 384px;margin-left: 396px;margin-top: -56px;">
                                    <input class="form-control" type="tel" pattern="[0-9]{10}" name="pnumber" placeholder="Phone Number" style="width: 780px;margin-left: 0px;margin-top: 10px;">
                                    <input class="form-control" type="email" name="email" placeholder="E-Mail" style="width: 780px;margin-left: 0px;margin-top: 10px;">
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" style="margin-top: 10px;width: 780px;"></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)" style="width: 780px;margin-top: -6px;"></div>
                                <div class="mb-3">
                                    <div class="form-check"><label class="form-check-label" style="color: rgb(255,255,255);"><input class="form-check-input" name="check" type="checkbox" value="1">I agree to the license terms.</label></div>
                                </div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" value="submit">Sign Up</button></div><a class="already" href="#" style="color: rgb(3,129,255);font-size: 16px;">You already have an account? Login here.</a>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <footer class="footer-dark" style="margin-bottom: -px;padding-bottom: 12px;background: #282d32;width: 100%;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3 style="font-family: Redressed, serif;">PaTra</h3>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Company Name © 2021</p>
            </div>
        </footer>
    </header>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Animated-Typing-With-Blinking.js"></script>
</body>

</html>