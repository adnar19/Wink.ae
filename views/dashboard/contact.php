

<!doctype html>

<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Wink Ae est un moyen rapide et amusant de rencontrer des personnes célibataires">
        <meta name="author" content="Wink AE">
       
        <title>Wink Ae - App de rencontre</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo url.'public/dashboard' ?>/img/favicon.png">

    <link rel="stylesheet" href="<?php echo url.'public/dashboard' ?>/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo url.'public/dashboard' ?>/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo url.'public/dashboard' ?>/css/elegant-line-icons.css">
    <link rel="stylesheet" href="<?php echo url.'public/dashboard' ?>/css/truno-icons.css">
    <link rel="stylesheet" href="<?php echo url.'public/dashboard' ?>/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo url.'public/dashboard' ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo url.'public/dashboard' ?>/css/slicknav.min.css">
    <link rel="stylesheet" href="<?php echo url.'public/dashboard' ?>/css/pricing-table.css">
    <link rel="stylesheet" href="<?php echo url.'public/dashboard' ?>/css/odometer.min.css">
    <link rel="stylesheet" href="<?php echo url.'public/dashboard' ?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo url.'public/dashboard' ?>/css/venobox.min.css">
    <link rel="stylesheet" href="<?php echo url.'public/dashboard' ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo url.'public/dashboard' ?>/css/responsive.css">

    <script src="<?php echo url.'public/dashboard' ?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body data-spy="scroll" data-target="#mainmenu" data-offset="80">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="site-preloader-wrap">
        <div class="spinner"></div>
    </div><!-- Preloader -->

    <header id="header" class="header-section">
        <div class="container">
            <nav class="navbar ">
                <a href="/" class="navbar-brand"><img src="<?php echo url.'public/dashboard' ?>/img/logo-dark.png" alt="Saasbiz"></a>
                <div class="d-flex menu-wrap">
                    <div id="mainmenu" class="mainmenu">
                        <ul class="nav">
                            <li><a data-scroll class="nav-link" href="<?php echo url.'home' ?>">Home</a></li>

                            <li><a data-scroll class="nav-link" href="<?php echo url.'home' ?>">Features</a></li>
                            <li><a data-scroll class="nav-link" href="<?php echo url.'home' ?>">Screenshots</a></li>
                            <li><a data-scroll class="nav-link" href="<?php echo url.'home' ?>">Avis</a></l <li><a href="<?php echo url.'home' ?>/contact">Contact</a></li>
                        </ul>
                    </div>
                    <div class="header-right">
                        <a class="menu-btn anim-btn" href="https://play.google.com/store/apps/details?id=ae.wink.app">télécharger<span></span></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--/. header-section -->

    <div class="header-height"></div>


    <div class="mapouter">

    <div style="width: 100%"><iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=en&amp;q=Dubai%20Silicon%20Oasis%20+(Wink%20Ae)&amp;t=&amp;z=11&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>      

            
            
            <section class="contact-section padding">
            <div class="map"></div>
            <div class="container">
                <div class="contact-wrap d-flex align-items-center row">
                    <div class="col-lg-6 sm-padding">
                        <div class="contact-info">
                            <h2>Contactez-nous <br> </h2>
                            <h4>Envoyez-nous un message dès aujourd'hui !</h4 <p>Notre équipe est à votre disposition pour répondre à toutes vos questions. Vous pouvez nous contacter via notre formulaire de contact en ligne ou par courrier ou directement par email à l'adresse suivante : contact(@)wink.ae</p>
                            <h3>Dubai Silicon Oasis
                                <br>PO 6009 - Dubai Silicon Oasis - Dubai - Émirats arabes unis
                            </h3>
                            <h4><span>Email:</span>Support(@).wink.ae <br><span>Email:</span>Contact(@).wink.ae <br> <span>Phone:</span> +971 (0)4 312 6700</h4>
                        </div>
                    </div>
		            <div class="col-lg-6 sm-padding">
		                <div class="contact-form">
                            <form action="<?php echo url.'home/contact/add' ?>" method="post" id="ajax_form" class="form-horizontal">
                                <div class="form-group colum-row row">
                                    <div class="col-sm-6">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="subject" id="subject" name="subject" class="form-control" placeholder="Sujet" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea id="message" name="message" cols="30" rows="5" class="form-control message" placeholder="Message" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button id="submit" class="default-btn btn-blue" type="submit">Send Message</button>
                                    </div>
                                </div>
                                <div id="form-messages" class="alert" role="alert"></div>
                            </form>
                        </div>
		            </div>




                </div>
            </div>
        </section>
        <!--/. contact-section -->

        <footer class="widget-section">
            <div class="container">
                <div class="row padding">
                    <div class="col-lg-3 col-sm-6 sm-padding">
                        <div class="widget-content">
                            <a href="https://play.google.com/store/apps/details?id=ae.wink.app"><img src="<?php echo url.'public/dashboard' ?>/img/logo-dark.png" alt="brand"></a>
                            <p>Bienvenue sur Wink AE. Nous aidons des milliers de célibataires du monde entier à trouver l'amour et quelqu'un avec qui partager leur vie. </p>
                            <div class="btn-group-left">
                                <a href="https://play.google.com/store/apps/details?id=ae.wink.app"><img src="<?php echo url.'public/dashboard' ?>/img/google.png" weight="200px" alt="playstore"></a>
                            </div>

                            
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 sm-padding">
                        <div class="widget-content">
                            <h4>Compagnie</h4>
                            <ul class="widget-links">
                                <li><a href="<?php echo url.'home' ?>/terms">Conditions générales d'utilisation</a></li>
                                <li><a href="<?php echo url.'home' ?>/legalnotice">Mentions légales</a></li>
                                <li><a href="<?php echo url.'home' ?>/cookies">Charte d'utilisation des cookies </a></li>
                                <li><a href="<?php echo url.'home' ?>/privacy">Politique de confidentialité</a></li>
                                <li><a href="<?php echo url.'home' ?>/seucrity">Sécurité</a></li>
                                <li><a href="<?php echo url.'home' ?>/contact.php">Contactez-nous</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 sm-padding">
                        <div class="widget-content">
                            <h4>Siège social
                            </h4>
                            <p>Dubai Silicon Oasis
                                <br>PO 6009 - Dubai Silicon Oasis - Dubai - Émirats arabes unis</p>
                                <span>+971 (0)4 312 6700</span>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 sm-padding">
                        <div class="widget-content">
                            <h4>Abonnement à la newsletter
                            </h4>
                            <p>Abonnez-vous et obtenez des réductions auprès de notre entreprise.</p>
                            <div class="subscribe-box clearfix">
                                <div class="subscribe-form-wrap">
                                <form class="subscribe-form" id="subscribe_form_newsletter" method="POST" enctype="application/x-www-form-urlencoded">
                                        <input type="text" id="newsletter_email" name="newsletter_email" class="form-input" placeholder="Entrez votre adresse mail...">
                                        <div class="info_newsletter_email"><span id="info_newsletter_email" class="info"></span></div>
                                        <button type="submit" id="sub_btn" class="submit-btn anim-btn">Souscrire <span></span></button>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <ul class="widget-social">
                                <li><a href="https://www.facebook.com/Wink-AE-108744205146926"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/wink_ae"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UC803-uJGkIECPrppsidDDtQ"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-section text-center">
                    <p>&copy; <span id="currentYear"></span> Wink AE</p>
                </div><!-- /.footer-section -->
            </div>
        </footer><!--/.widget-section-->

        <!--/.widget-section-->

        <a data-scroll href="#header" id="scroll-to-top"><i class="ti-arrow-up"></i></a>

        <!-- jQuery Lib -->
        <script src="<?php echo url.'public/dashboard' ?>/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="<?php echo url.'public/dashboard' ?>/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo url.'public/dashboard' ?>/js/vendor/tether.min.js"></script>
        <script src="<?php echo url.'public/dashboard' ?>/js/vendor/jquery.slicknav.min.js"></script>
        <script src="<?php echo url.'public/dashboard' ?>/js/vendor/owl.carousel.min.js"></script>
        <script src="<?php echo url.'public/dashboard' ?>/js/vendor/smooth-scroll.min.js"></script>
        <script src="<?php echo url.'public/dashboard' ?>/js/vendor/jquery.ajaxchimp.min.js"></script>
        <script src="<?php echo url.'public/dashboard' ?>/js/vendor/pricing-switcher.js"></script>
        <script src="<?php echo url.'public/dashboard' ?>/js/vendor/jquery.waypoints.v2.0.3.min.js"></script>
        <script src="<?php echo url.'public/dashboard' ?>/js/vendor/odometer.min.js"></script>
        <script src="<?php echo url.'public/dashboard' ?>/js/vendor/wow.min.js"></script>
        <script src="<?php echo url.'public/dashboard' ?>/js/vendor/venobox.min.js"></script>
        <script src="<?php echo url.'public/dashboard' ?>/js/contact.js"></script>
        <script src="<?php echo url.'public/dashboard' ?>/js/main.js"></script>

</body>

</html>