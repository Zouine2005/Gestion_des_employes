
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>GS</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('assetss/img/.png')}}" rel="icon">
  <link href="{{asset('assetss/img/.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assetss/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assetss/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assetss/vendor/aos/aos.css" rel="stylesheet')}}">
  <link href="{{asset('assetss/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assetss/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('assetss/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header fixed-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:zouine@gmail.com">zouine@gmail.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+(212) 6 05 46 77 58</span></i>
        </div>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="https://twitter.com/MohamadeZouine" class="twitter" target="_blank"><i class="bi bi-twitter"></i></a>
        <a href="https://github.com/Zouine2005" class="instagram" target="_blank"><i class="bi bi-github"></i></a>
        <a href="https://www.linkedin.com/in/mohamed-zouine-5716a2252" class="linkedin" target="_blank"><i class="bi bi-linkedin"></i></a>
      </div>

    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assetss/img/logo.png" alt=""> -->
          <h1 class="sitename">GES</h1>
          <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#hero" class="active">Acceuil<br></a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="{{route('login')}}">Se connecter</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section accent-background">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5 justify-content-between">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2><span>Gestion </span><span class="accent">des employes</span></h2>
            <p>Application de gestion des employés est conçue pour simplifier et optimiser la gestion des ressources humaines au sein de votre organisation. Grâce à une interface intuitive et conviviale, vous pouvez facilement suivre les informations essentielles de vos employés, gérer les absences, les congés, et évaluer les performances</p>
          </div>
          <div class="col-lg-5 order-1 order-lg-2">
            <img src="{{asset('assetss/img/hero-img.svg')}}" class="img-fluid" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>À propos de nous<br></h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <img src="{{asset('assetss/img/gestion-efficace-employe.jpg')}}" class="img-fluid rounded-4 mb-4" alt="">
            <h5>Notre application de gestion des employés est conçue pour simplifier et optimiser la gestion des ressources humaines au sein de votre organisation. Grâce à une interface intuitive et conviviale, vous pouvez facilement suivre les informations essentielles de vos employés, gérer les absences, les congés, et évaluer les performances.</h5>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">

              <div class="position-relative mt-4">
                <img src="{{asset('assetss/img/gestion-personnel.png')}}" class="img-fluid rounded-4" alt="">
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

      <div class="container">
        <img src="{{asset('assetss/img/cta-bg.jpg')}}" alt="">
        <div class="content row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <a href="https://www.youtube.com/watch?v=amnXetXnv5c" class="glightbox play-btn" target="_blank"></a>
              <h3>Voir</h3>
              <a class="cta-btn" href="https://www.youtube.com/watch?v=amnXetXnv5c" target="_blank">Cliquer ici </a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Call To Action Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Notre Services</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="bi bi-activity"></i>
              </div>
              <h3>Gestion des horaires</h3>
              <p>Suivi des heures de travail, des congés et des absences, avec des outils de planification et de gestion des plannings.</p>
              
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-broadcast"></i>
              </div>
              <h3>Suivi des performances</h3>
              <p>Évaluation continue des performances des employés via des objectifs, des évaluations et des feedbacks réguliers.</p>
              
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-easel"></i>
              </div>
              <h3>Gestion des recrutements </h3>
              <p>Processus de recrutement, incluant la publication d'offres d'emploi, le suivi des candidatures et les entretiens.</p>
              
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-bounding-box-circles"></i>
              </div>
              <h3>Gestion des paies et des avantages</h3>
              <p>Administration des salaires, des primes et des avantages sociaux, avec des outils de conformité fiscale.</p>
              
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-calendar4-week"></i>
              </div>
              <h3>Communication interne </h3>
              <p>Outils de collaboration et de communication pour favoriser l'engagement et le partage d'informations au sein de l'équipe.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-chat-square-text"></i>
              </div>
              <h3>Formation et développement</h3>
              <p>Programmes de formation pour le développement des compétences et la gestion des carrières des employés.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section>

    </section><!-- /Recent Posts Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gx-lg-0 gy-4">

          <div class="col-lg-4">
            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>Maroc</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Tel</h3>
                  <p>+(212) 6 05 46 77 58</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email </h3>
                  <p>zouine@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h3>heures de travail:</h3>
                  <p>Lun-Sam: 9AM - 18PM</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade" data-aos-delay="100">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Votre Nom" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Votre Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Sujet" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="8" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Envoyer votre message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer accent-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">GES</span>
          </a>
          <p>Notre application de gestion des employés est conçue pour simplifier et optimiser la gestion des ressources humaines au sein de votre organisation. Grâce à une interface intuitive et conviviale, vous pouvez facilement suivre les informations essentielles de vos employés, gérer les absences, les congés, et évaluer les performances.</p>
          <div class="social-links d-none d-md-flex align-items-center">
            <a href="https://twitter.com/MohamadeZouine" class="twitter" target="_blank"><i class="bi bi-twitter"></i></a>
            <a href="https://github.com/Zouine2005" class="instagram" target="_blank"><i class="bi bi-github"></i></a>
            <a href="https://www.linkedin.com/in/mohamed-zouine-5716a2252" class="linkedin" target="_blank"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Liens</h4>
          <ul>
            <li><a href="#">Acceuil</a></li>
            <li><a href="#">À propos de nous            </a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact </h4>
          <p>Maroc</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+(212) 6 05 46 77 58</span></p>
          <p><strong>Email:</strong> <span>zouine@gmail.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">GES version01</strong>
      <div class="credits">
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('assetss/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assetss/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assetss/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assetss/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('assetss/js/main.js')}}"></script>

</body>

</html>