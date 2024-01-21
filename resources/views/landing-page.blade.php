<!doctype html>
<html lang="en">
<style type="text/css">

@media (max-width: 767.98px) {
    #mobile-img{
   
        width:100%;

}
}


</style>
<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>E-stage Landing Page</title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png')}}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css')}}">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css')}}">
    
    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.min.css')}}">
    
    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/magnific-popup.css')}}">
    
    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/slick.css')}}">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/custom-animation.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/default.css')}}">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css')}}">
  
  
</head>

<body>   

    <!--====== PRELOADER PART START ======-->

    <div class="loader-wrap">
        <div class="preloader"><div class="preloader-close">Preloader Close</div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>        
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== OFFCANVAS MENU PART START ======-->

    <div class="off_canvars_overlay">
                
    </div>
    <div class="offcanvas_menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="fa fa-times"></i></a>  
                        </div>
                        <div class="offcanvas-brand text-center mb-40">
                            <img src="{{ URL::asset('assets/images/logo.png')}}" alt="">
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="#">Accueil</a>
                                </li>
                                <li class="menu-item-has-children active">
                                    <a href="#service">Caractéristiques </a>
                                </li>
                                <li class="menu-item-has-children active">
                                    <a href="#features">Fonctionnalités</a>
                                </li>
                                <li class="menu-item-has-children active">
                                    <a href="#testimonial">Testimonials</a>
                                </li>
                                <li class="menu-item-has-children active">
                                    <a href="/login">Commencer</a>
                                </li>
                            </ul>
                        </div>
                        <div class="offcanvas-social">
                            <ul class="text-center">
                                <li><a href="$"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="$"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="$"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="$"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                        <div class="footer-widget-info">
                            <ul>
                                <li><a href="#"><i class="fal fa-envelope"></i> support@E-stage.com</a></li>
                                <li><a href="#"><i class="fal fa-phone"></i> +(212) 620 777 045</a></li>
                                <li><a href="#"><i class="fal fa-map-marker-alt"></i> 442 University Avenue 7, San Francisco, AV 4206</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== OFFCANVAS MENU PART ENDS ======-->
   
    <!--====== APPIE HEADER PART START ======-->
    
    <header class="appie-header-area appie-header-2-area appie-sticky">
        <div class="container">
            <div class="header-nav-box">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-4 col-sm-5 col-6 order-1 order-sm-1">
                        <div class="appie-logo-box">
                            <a href="#">
                                <img src="{{ URL::asset('assets/images/logo.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-1 col-sm-1 order-3 order-sm-2">
                        <div class="appie-header-main-menu">
                            <ul>
                                <li>
                                    <a href="#">Accueil </a>
                                </li>
                                <li >
                                    <a href="#service">Caractéristiques</a>
                                </li>
                                <li >
                                    <a href="#features">Fonctionnalités</a>
                                </li>
                                <li >
                                    <a href="#testimonial">Testimonials</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4  col-md-7 col-sm-6 col-6 order-2 order-sm-3">
                        <div class="appie-btn-box text-right">
                            <a class="main-btn ml-30" href="/login">Commencer</a>
                            <div class="toggle-btn ml-30 canvas_open d-lg-none d-block">
                                <i class="fa fa-bars"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!--====== APPIE HEADER PART ENDS ======-->

    <!--====== APPIE HERO PART START ======-->
    
    <section class="appie-hero-area-2 mb-90">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="appie-hero-content-2">
                        <span>Sécurité, Rapidité, Fiabilité</span>
                        <h1 class="appie-title">Prêt à tout digitaliser sur une seule <span>Plateforme</span> ?</h1>
                        <p>E-stage la meilleur plateforme de gestion<br> des stages.</p>
                        <form action="">
                            <div class="input-box">
                                <input type="text" placeholder="info@E-stage.com">
                                <i class="fal fa-envelope"></i>
                                <button><i class="fal fa-arrow-right"></i></button>
                            </div>
                        </form>
                        <div class="hero-users" style="    margin-left: 22%;">
                            <span>30k <span> Feedback</span></span>
                            <img style="margin-bottom: 25px;  margin-left: -20px;" src="{{ URL::asset('assets/images/stars.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="appie-hero-thumb-3 wow animated fadeInRight" data-wow-duration="2000ms" data-wow-delay="400ms">
            <img src="{{ URL::asset('assets/images/hero-thumb-3.jpg')}}" alt="">
        </div>
        <div class="hero-shape-1">
            <img src="{{ URL::asset('assets/images/shape/shape-9.png')}}" alt="">
        </div>
        <div class="hero-shape-2">
            <img src="{{ URL::asset('assets/images/shape/shape-10.png')}}" alt="">
        </div>
        <div class="hero-shape-3">
            <img src="{{ URL::asset('assets/images/shape/shape-11.png')}}" alt="">
        </div>
        <div class="hero-shape-4">
            <img src="{{ URL::asset('assets/images/shape/shape-12.png')}}" alt="">
        </div>
    </section>
    
    <!--====== APPIE HERO PART ENDS ======-->

    <!--====== APPIE SERRVICE 2 PART START ======-->
    
    <section class="appie-services-2-area " id="service">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-6 col-md-8">
                    <div class="appie-section-title">
                        <h3 class="appie-title">Qu’est-ce qui nous rend unique ?</h3>
                        <p>avec les technologies les plus récentes sur le marché, nous sommes en mesure de rendre votre travail beaucoup plus facile. </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="appie-section-title text-right">
                        <a class="main-btn" href="#">Voir toutes les fonctionnalités <i class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="appie-single-service-2 mt-30 wow animated fadeInUp" data-wow-duration="2000ms" data-wow-delay="200ms">
                        <div class="icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h4 class="title">Stable et Rapide</h4>
                        <p>Avec notre code source performant, vos pages se chargeront beaucoup plus rapidement.</p>
                         </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="appie-single-service-2 item-2 mt-30 wow animated fadeInUp" data-wow-duration="2000ms" data-wow-delay="400ms">
                        <div class="icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h4 class="title">Design convivial</h4>
                        <p>Nous nous sommes assurés de tout mettre au bon endroit, afin que vous ne soyez pas confus simplement en regardant l’écran.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="appie-single-service-2 item-3 mt-30 wow animated fadeInUp" data-wow-duration="2000ms" data-wow-delay="600ms">
                        <div class="icon">
                            <i class="fas fa-link"></i>
                        </div>
                        <h4 class="title">Solide et Extensible</h4>
                        <p>Nous nous sommes assurés de pouvoir l’étendre à vos besoins avec facilité tout en le gardant stable, rapide et sûr.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="appie-single-service-2 item-4 mt-30 wow animated fadeInUp" data-wow-duration="2000ms" data-wow-delay="200ms">
                        <div class="icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <h4 class="title">Support 24/7</h4>
                        <p>Notre équipe de support est toujours prête à écouter vos plaintes, propositions et commentaires.</p>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="appie-single-service-2 item-5 mt-30 wow animated fadeInUp" data-wow-duration="2000ms" data-wow-delay="400ms">
                        <div class="icon">
                            <i class="fas fa-cog"></i>
                        </div>
                        <h4 class="title">Paramétrable</h4>
                        <p>Nous vous offrons de nombreuses options parmi lesquelles vous pouvez choisir pour le rendre encore plus personnalisé.</p>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="appie-single-service-2 item-6 mt-30 wow animated fadeInUp" data-wow-duration="2000ms" data-wow-delay="600ms">
                        <div class="icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h4 class="title">Sécurisé</h4>
                        <p>Les Frameworks utilisés pour le développement de cette plateforme ont permis de couvrir tous les aspects de sécurité. de la gestion des autorisations à la protection contre les attaques.</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== APPIE SERRVICE 2 PART ENDS ======-->

    <!--====== APPIE ABOUT PART START ======-->
    
    <section class="appie-about-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="appie-about-box wow animated fadeInUp" data-wow-duration="2000ms" data-wow-delay="200ms">
                        <div class="row" style="">
                            <div class="col-lg-12">
                                <div class="about-thumb">
                                    <img src="{{ URL::asset('assets/images/chat.PNG')}}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="appie-about-content">
                                    <!--====== <span>Marketing</span> ======-->
                                    
                                    <h3 class="title">Profitez-vous de notre solution de communication en temps réel 
                                    <p>Simple et effectif , avec notre solution de messagerie vous assurez que vous êtes toujour tous conectès.</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="appie-about-service mt-30">
                                            <div class="icon">
                                                <i class="fal fa-check"></i>
                                            </div>
                                            <h4 class="title">Messages en temps réel</h4>
                                            <p>Mucker plastered bugger all mate morish are.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="appie-about-service mt-30">
                                            <div class="icon">
                                                <i class="fal fa-check"></i>
                                            </div>
                                            <h4 class="title">Encrypté end-to-end</h4>
                                            <p>Mucker plastered bugger all mate morish are.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== APPIE ABOUT PART ENDS ======-->

    <!--====== APPIE FEATURES 2 PART START ======-->
    
    <section class="appie-features-area-2 pt-90 pb-100" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="appie-section-title appie-section-title-2 text-center">
                        <h3 class="appie-title">Où que vous ayez <br> besoin
                            nous le plus</h3>
                        <p>Notre plateforme est entièrement adaptée aux appareils mobiles, avec un design responsive et des interfaces utilisateur simplifiées. </p>
                    </div>
                </div>
            </div>
            <div class="row mt-30 align-items-center">
                <div class="col-lg-6">
                    <div class="appie-features-boxes">
                        <div class="appie-features-box-item">
                            <h4 class="title">Bien intégré</h4>
                            <p>The bee's knees chancer car boot absolutely.</p>
                        </div>
                        <div class="appie-features-box-item item-2">
                            <h4 class="title">Design propre et moderne</h4>
                            <p>The bee's knees chancer car boot absolutely.</p>
                        </div>
                        <div class="appie-features-box-item item-3">
                            <h4 class="title">Mode droite-gauche</h4>
                            <p>Pour les utilisateurs qui préfèrent utiliser l’arabe, nous sommes là pour vous!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="appie-features-thumb wow animated fadeInRight" data-wow-duration="2000ms" data-wow-delay="200ms">
                        <img id="mobile-img" style="max-width:500px;" src="{{ URL::asset('assets/images/mobile.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="features-shape-1">
            <img src="{{ URL::asset('assets/images/shape/shape-15.png')}}" alt="">
        </div>
        <div class="features-shape-2">
            <img src="{{ URL::asset('assets/images/shape/shape-14.png')}}" alt="">
        </div>
        <div class="features-shape-3">
            <img src="{{ URL::asset('assets/images/shape/shape-13.png')}}" alt="">
        </div>
    </section>
    
    <!--====== APPIE FEATURES 2 PART ENDS ======-->

    <!--====== APPIE COUNTER PART START ======-->
    
    <section class="appie-counter-area pt-90 pb-190">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="appie-section-title">
                        <h3 class="appie-title">Quelques chiffres :</h3>
                        <p>Notre plateforme grandit chaque jour.... </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="appie-single-counter mt-30 wow animated fadeInUp" data-wow-duration="2000ms" data-wow-delay="200ms">
                        <div class="counter-content">
                            <div class="icon">
                                <img src="{{ URL::asset('assets/images/icon/counter-icon-1.svg')}}" alt="">
                            </div>
                            <h3 class="title"><span class="counter-item">400</span>+</h3>
                            <p>Utilisateurs</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="appie-single-counter mt-30 item-2 wow animated fadeInUp" data-wow-duration="2000ms" data-wow-delay="400ms">
                        <div class="counter-content">
                            <div class="icon">
                                <img src="{{ URL::asset('assets/images/icon/counter-icon-2.svg')}}" alt="">
                            </div>
                            <h3 class="title"><span class="counter-item">23</span>+</h3>
                            <p>Enseignants</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="appie-single-counter mt-30 item-3 wow animated fadeInUp" data-wow-duration="2000ms" data-wow-delay="600ms">
                        <div class="counter-content">
                            <div class="icon">
                                <img src="{{ URL::asset('assets/images/icon/counter-icon-3.svg')}}" alt="">
                            </div>
                            <h3 class="title"><span class="counter-item">369</span>+</h3>
                            <p>Etudiants</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="appie-single-counter mt-30 item-4 wow animated fadeInUp" data-wow-duration="2000ms" data-wow-delay="800ms">
                        <div class="counter-content">
                            <div class="icon">
                                <img src="{{ URL::asset('assets/images/icon/counter-icon-4.svg')}}" alt="">
                            </div>
                            <h3 class="title"><span class="counter-item">3</span>+</h3>
                            <p>Administrateurs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== APPIE COUNTER PART ENDS ======-->

    <!--====== APPIE VIDEO PLAYER PART START ======-->
    
    <section class="appie-video-player-area pb-100" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="appie-video-player-item">
                        <div class="thumb">
                            <img src="{{ URL::asset('assets/images/video-thumb-1.png')}}" alt="">
                            <div class="video-popup">
                                <a class="appie-video-popup" href="https://www.youtube.com/watch?v=ARYn55LvM48"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                        <div class="content">
                            <h3 class="title">Regardez ce court tutoriel vidéo, pour apprendre à utiliser notre plateforme</h3>
                            <!--<p>The wireless cheesed on your bike mate zonked a load of old tosh hunky dory it's all gone to pot haggle william car boot pear shaped geeza.</p>-->
                            <a class="main-btn" href="/login">Commencer</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="appie-video-player-slider">
                        <div class="item">
                            <img height="100%" src="{{ URL::asset('assets/images/ensa-slide-1.jpg')}}" alt="">
                        </div>
                        <div class="item">
                            <img height="100%"  src="{{ URL::asset('assets/images/ensa-slide-2.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== APPIE VIDEO PLAYER PART ENDS ======-->

    <!--====== APPIE DOWNLOAD PART START ======-->
    
    <section class="appie-download-area pt-150 pb-160 mb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-thumb night-mode-mobile" >
                        <img src="{{ URL::asset('assets/images/download-thumb.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="appie-download-content">
                         <!--====== <span>Download Our App</span> ======-->
                        
                        <h3 class="title">Notre plateforme est également  <br>disponible en mode nuit</h3>
                        <p>Jolly good quaint james bond victoria sponge happy days cras arse over blatant.</p>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fab fa-apple"></i>
                                    <span>Responsive <span>iOS</span></span>
                                </a>
                            </li>
                            <li>
                                <a class="item-2" href="#">
                                    <i class="fab fa-google-play"></i>
                                    <span>Responsive <span>Android</span></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="download-shape-1">
            <img src="{{ URL::asset('assets/images/shape/shape-15.png')}}" alt="">
        </div>
        <div class="download-shape-2">
            <img src="{{ URL::asset('assets/images/shape/shape-14.png')}}" alt="">
        </div>
        <div class="download-shape-3">
            <img src="{{ URL::asset('assets/images/shape/shape-13.png')}}" alt="">
        </div>
    </section>
    
    <!--====== APPIE DOWNLOAD PART ENDS ======-->

    <!--====== APPIE PRICING 2 PART START ======-->
    
    <section class="appie-pricing-2-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="appie-section-title text-center">
                        <h3 class="appie-title">Voici les personnes qui ont rendu cela possible</h3>
                        <div class="appie-pricing-tab-btn">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Equipe</a>
                                </li>
                                <!--
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Yearly</a>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-4 col-md-6">
                                    <div class="pricing-one__single pricing-one__single_2 item-2 wow animated fadeInLeft">
                                        <div class="pricig-heading">
                                            <h6>ES-SAYID Anouar</h6>
                                            <div class="avatar" style="text-align: center;"><img style="max-width:50%;" class="rounded-circle header-profile-user me-1" src="https://media-exp1.licdn.com/dms/image/C4D03AQErjg-UB_IvuA/profile-displayphoto-shrink_800_800/0/1648304645994?e=1660176000&v=beta&t=NbXLTq8GUnE2xELNY9TFtHbwSzy0LURngZQlTSj-SYI"> </div>
                            
                                        </div>
                                        <div class="pricig-body">
                                            <ul>
                                                <li><i class="fal fa-check"></i> Etudiant en Master IITN - ENSAK</li>
                                                <li><i class="fal fa-check"></i> Développeur Web</li>
                                                <li><i class="fal fa-check"></i> 24/7 Support</li>
                                            </ul>
                                            <div class="pricing-btn mt-35">
                                                <a class="main-btn" href="https://www.linkedin.com/in/anouar-es-sayid/">Contacter</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="pricing-one__single pricing-one__single_2 item-2 active wow animated fadeInUp">
                                        <div class="pricig-heading">
                                            <h6>OUMAIRA Ilham</h6>
                                            <div class="avatar" style="text-align: center;"><img style="max-width:50%;" class="rounded-circle header-profile-user me-1" src="https://yt3.ggpht.com/ytc/AKedOLRkkWSc16YpEHbB4PG3fRAXN3ZD9pTCMjwQnEltQg=s900-c-k-c0x00ffffff-no-rj"> </div>
                                           
                                        </div>
                                        <div class="pricig-body">
                                            <ul>
                                                <li><i class="fal fa-check"></i> Enseignant universitaire</li>
                                                <li><i class="fal fa-check"></i> Développeuse web</li>
                                                <li><i class="fal fa-check"></i> 24/7 Support</li>
                                            </ul>
                                            <div class="pricing-btn mt-35">
                                                <a class="main-btn" href="mailto:ilham.oumaira@uit.ac.ma">Contacter</a>
                                            </div>
                                            <div class="pricing-rebon">
                                                <span>Encadrant</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="pricing-one__single pricing-one__single_2 item-2 wow animated fadeInRight">
                                        <div class="pricig-heading">
                                            <h6>EL YOUSFI Fatima ezzahraa</h6>
                                            <div class="avatar" style="text-align: center;"><img style="max-width:50%;" class="rounded-circle header-profile-user me-1" src="https://media-exp1.licdn.com/dms/image/C4E03AQE4wmKGVJTTjg/profile-displayphoto-shrink_800_800/0/1654625259982?e=1660176000&v=beta&t=MMgVLCPsnsXLaa7citz9Fy7p3jCyLysMOaTc-G1BIRw"> </div>
                                          
                                        </div>
                                        <div class="pricig-body">
                                            <ul>
                                                <li><i class="fal fa-check"></i> Etudiante en Master IITN - ENSAK</li>
                                                <li><i class="fal fa-check"></i> Data security</li>
                                                <li><i class="fal fa-check"></i> 24/7 Support</li>
                                            </ul>
                                            <div class="pricing-btn mt-35">
                                                <a class="main-btn" href="https://www.linkedin.com/in/fatima-ezzahraa-elyousfi-b7227221b">Contacter</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-4 col-md-6">
                                    <div class="pricing-one__single pricing-one__single_2 animated fadeInLeft">
                                        <div class="pricig-heading">
                                            <h6>Fresh</h6>
                                            <div class="price-range"><sup>$</sup> <span>32</span><p>/Yearly</p></div>
                                            <p>Get your 14 day free trial</p>
                                        </div>
                                        <div class="pricig-body">
                                            <ul>
                                                <li><i class="fal fa-check"></i> 60-day chat history</li>
                                                <li><i class="fal fa-check"></i> 15 GB cloud storage</li>
                                                <li><i class="fal fa-check"></i> 24/7 Support</li>
                                            </ul>
                                            <div class="pricing-btn mt-35">
                                                <a class="main-btn" href="#">Choose plan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="pricing-one__single pricing-one__single_2 active animated fadeInUp">
                                        <div class="pricig-heading">
                                            <h6>Sweet</h6>
                                            <div class="price-range"><sup>$</sup> <span>116</span><p>/Yearly</p></div>
                                            <p>Billed $276 per website annually.</p>
                                        </div>
                                        <div class="pricig-body">
                                            <ul>
                                                <li><i class="fal fa-check"></i> 60-day chat history</li>
                                                <li><i class="fal fa-check"></i> 50 GB cloud storage</li>
                                                <li><i class="fal fa-check"></i> 24/7 Support</li>
                                            </ul>
                                            <div class="pricing-btn mt-35">
                                                <a class="main-btn" href="#">Choose plan</a>
                                            </div>
                                            <div class="pricing-rebon">
                                                <span>Most Popular</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="pricing-one__single pricing-one__single_2 item-2 animated fadeInRight">
                                        <div class="pricig-heading">
                                            <h6>Juicy</h6>
                                            <div class="price-range"><sup>$</sup> <span>227</span><p>/Yearly</p></div>
                                            <p>Billed $276 per website annually.</p>
                                        </div>
                                        <div class="pricig-body">
                                            <ul>
                                                <li><i class="fal fa-check"></i> 60-day chat history</li>
                                                <li><i class="fal fa-check"></i> Data security</li>
                                                <li><i class="fal fa-check"></i> 100 GB cloud storage</li>
                                                <li><i class="fal fa-check"></i> 24/7 Support</li>
                                            </ul>
                                            <div class="pricing-btn mt-35">
                                                <a class="main-btn" href="#">Choose plan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== APPIE PRICING 2 PART ENDS ======-->

    <!--====== APPIE TESTIMONIAL 2 PART START ======-->
    
    <section class="appie-testimonial-2-area mb-90" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="appie-testimonial-2-box">
                        <div class="appie-testimonial-slider-2">
                            <div class="appie-testimonial-slider-2-item">
                                <div class="item">
                                    <div class="thumb">
                                        <img  height="140px" width="140px" src="{{ URL::asset('assets/images/testimonial-user-1.jpg')}}" alt="">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <span>(5.0) review</span>
                                    </div>
                                    <div class="content">
                                        <p>cette plateforme me semble très intéressant, convivial et il permet une rétroaction rapide. Félicitations, cela semble une très belle réalisation.</p>
                                        <div class="author-info">
                                            <h5 class="title">Hassna Tamri</h5>
                                            <span>Etudiante à l'ENSAK</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="appie-testimonial-slider-2-item">
                                <div class="item">
                                    <div class="thumb">
                                        <img  height="140px" width="140px" src="{{ URL::asset('assets/images/testimonial-user-2.jpg')}}" alt="">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <span>(4.7) review</span>
                                    </div>
                                    <div class="content">
                                        <p>très intéressant comme site web, j'ai deja utilisé cette plateforme que je trouve aussi très Pro et fructifiant.</p>
                                        <div class="author-info">
                                            <h5 class="title">Amal bennali</h5>
                                            <span>Etudiant à l'ENSAK</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="appie-testimonial-slider-2-item">
                                <div class="item">
                                    <div class="thumb">
                                        <img height="140px" width="140px" src="{{ URL::asset('assets/images/testimonial-user-3.jpg')}}" alt="">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <span>(4.5) review</span>
                                    </div>
                                    <div class="content">
                                        <p>je ne comprenais pas bien le fonctionnement de la plate-forme mais apres la petite video, c’est maintenant plus clair pour moi. J’ai 5 ans d’expérience en rédaction web, et j’avoue que c'est un bon travail
                                            bonne chance</p>
                                        <div class="author-info">
                                            <h5 class="title">Akram zahi</h5>
                                            <span>Developeur web</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== APPIE TESTIMONIAL 2 PART ENDS ======-->

    <!--====== APPIE SPONSER PART START ======-->
    
    <section class="appie-sponser-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="appie-section-title text-center">
                        <h3 class="appie-title">E-stage est développé avec<br> les meilleures technologies</h3>
                      
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="appie-sponser-box d-flex justify-content-center">
                        <div class="sponser-item">
                            <img src="{{ URL::asset('assets/images/tech-1.png')}}" alt="">
                        </div>
                        <div class="sponser-item">
                            <img width="90%" src="{{ URL::asset('assets/images/tech-2.png')}}" alt="">
                        </div>
                        <div class="sponser-item">
                            <img width="70%" src="{{ URL::asset('assets/images/tech-3.png')}}" alt="">
                        </div>
                        <div class="sponser-item">
                            <img  width="70%" src="{{ URL::asset('assets/images/tech-4.png')}}" alt="">
                        </div>
                        <div class="sponser-item">
                            <img width="60%" src="{{ URL::asset('assets/images/tech-5.webp')}}" alt="">
                        </div>
                        <div class="sponser-item">
                            <img width="100%" src="{{ URL::asset('assets/images/tech-6.png')}}" alt="">
                        </div>
                    </div>
                    <div class="appie-sponser-box item-2 d-flex justify-content-center">
                        <div class="sponser-item">
                            <img width="60%" src="{{ URL::asset('assets/images/tech-7.png')}}" alt="">
                        </div>
                        <div class="sponser-item">
                            <img  width="70%" src="{{ URL::asset('assets/images/tech-8.png')}}" alt="">
                        </div>
                        <div class="sponser-item">
                            <img width="60%" src="{{ URL::asset('assets/images/tech-9.png')}}" alt="">
                        </div>
                        <div class="sponser-item">
                            <img src="{{ URL::asset('assets/images/tech-10.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sponser-shape">
            <img src="{{ URL::asset('assets/images/sponser-shape.png')}}" alt="">
        </div>
    </section>
    
    <!--====== APPIE SPONSER PART ENDS ======-->

    <!--====== APPIE FOOTER PART START ======-->
    
    <section class="appie-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-about-widget footer-about-widget-2">
                        <div class="logo">
                            <a href="#"><img src="{{ URL::asset('assets/images/logo.png')}}" alt=""></a>
                        </div>
                        <p>E-stage, est la meilleure façon de gérer vos stages.</p>
                        <a href="/login">Commencer maintenant<i class="fal fa-arrow-right"></i></a>
                        <div class="social mt-30">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-navigation footer-navigation-2">
                        <h4 class="title">Entreprise</h4>
                        <ul>
                            <li><a href="#">Apropos</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Etudes de cas</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-navigation footer-navigation-2">
                        <h4 class="title">Support</h4>
                        <ul>
                            <li><a href="#">Communauté</a></li>
                            <li><a href="#">Ressources</a></li>
                            <li><a href="#">Faqs</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>                    
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget-info">
                        <h4 class="title">Contactez-nous</h4>
                        <ul>
                            <li><a href="#"><i class="fal fa-envelope"></i> support@E-stage.com</a></li>
                            <li><a href="#"><i class="fal fa-phone"></i> +(212) 620 777 045</a></li>
                            <li><a href="#"><i class="fal fa-map-marker-alt"></i> 442 University Avenue 7, Kenitra, AV 4206</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copyright d-flex align-items-center justify-content-between pt-35">
                        <div class="apps-download-btn">
                        <ul>
                            <li><a href="#"><i class="fab fa-apple"></i>iOS Friendly</a></li>
                            <li><a class="item-2" href="#"><i class="fab fa-google-play"></i>Android Friendly</a></li>
                        </ul>
                        </div>
                        <div class="copyright-text">
                            <p>Copyright © <script>document.write(new Date().getFullYear())

                            </script>  E-stage. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== APPIE FOOTER PART ENDS ======-->


    <!--====== APPIE BACK TO TOP PART ENDS ======-->
    <div class="back-to-top back-to-top-2">
        <a href="#"><i class="fal fa-arrow-up"></i></a>
    </div>
    <!--====== APPIE BACK TO TOP PART ENDS ======-->


    
    
    
    
    
    <!--====== jquery js ======-->
    <script src="{{ URL::asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/popper.min.js')}}"></script>
    
    <!--====== wow js ======-->
    <script src="{{ URL::asset('assets/js/wow.js')}}"></script>
    
    <!--====== Slick js ======-->
    <script src="{{ URL::asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/waypoints.min.js')}}"></script>

    <!--====== TweenMax js ======-->
    <script src="{{ URL::asset('assets/js/TweenMax.min.js')}}"></script>
    
    <!--====== Slick js ======-->
    <script src="{{ URL::asset('assets/js/slick.min.js')}}"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="{{ URL::asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    
    <!--====== Main js ======-->
    <script src="{{ URL::asset('assets/js/main.js')}}"></script>

</body>

</html>
