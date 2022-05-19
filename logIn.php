
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
    <title>Log IN page</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Redressed&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Salsa&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="height: 820px;">
    <header class="header-blue" style="height: 800px;padding: 0px;">
        <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
            <div class="container-fluid"><a class="navbar-brand" href="#" style="font-family: Redressed, serif;margin: 0px 0px 0px 20px;font-size: 50px;">PaTra</a><button class="navbar-toggler" data-bs-toggle="collapse"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
        </nav>
        <div class="container hero">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                    <h1>The revolution is here.</h1>
                    <p>Without using your hard earned money, get exposed to the beautiful world of trading.</p>
                </div>
                <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder" style="margin: 0px 0px 0px 90px;">
                    <fieldset></fieldset>
                    <form method="post" action="Log_in.php">
                    <div style="height: 450px;color: var(--bs-dark);background: repeating-linear-gradient(21deg, rgb(91,213,252), white), var(--bs-light);box-shadow: 1px 1px 9px 3px var(--bs-dark);border-radius: 10px;margin: 40px 0px 0px 80px;width: 360px;"><label class="form-label" style="margin: 20px 5px 0px ;color: rgb(0,0,0);text-align: center;width: 350px;font-size: 24px;font-family: Salsa, serif;">Log In</label><label class="form-label" style="color: rgb(0,0,0);width: 330px;margin: 20px 20px 0px;text-align: left;font-size: 20px;">E-Mail</label><input type="email" name="email" placeholder="E-mail" style="font-size: 16px;width: 330px;margin: 14px 0px 10px 20px;margin-right: 42px;margin-top: 14px;"><label class="form-label" style="color: rgb(0,0,0);width: 330px;margin: 26px 20px 0px;text-align: left;font-size: 20px;">Password</label><input type="password" name="password" placeholder="Password" style="font-size: 16px;width: 330px;margin: 14px 0px 10px 20px;margin-right: 42px;margin-top: 14px;padding: 0px;"><button class="btn btn-primary" type="submit" name="submit" value="submit" style="background: linear-gradient(-104deg, #a5b6fb 0%, rgb(10,78,242) 0%, #222222 100%);margin: 20px 146px 0px;width: 70px;">Log In</button><label class="form-label" style="margin: 10px 8px 0px 0px;">Don't have an account?</label><a href="#" style="margin: 0px 68px 0px 0px;">Sign Up</a></div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer-clean">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                        <p class="copyright">PaTra© 2021</p>
                    </div>
                </div>
            </div>
        </footer>
    </header>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>