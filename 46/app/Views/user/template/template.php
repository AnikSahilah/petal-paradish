<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Meta Title dan Meta Description Dinamis -->
  <?php
  // Mendapatkan pengaturan bahasa dari sesi
  $lang = session()->get('lang');
  $metaTitle = 'default'; // Meta title default jika tidak ada data
  $metaDescription = 'default'; // Meta description default jika tidak ada data
  $pageTitle = 'Petal Paradise'; // Judul halaman default jika tidak ada data

  // Tentukan meta berdasarkan bahasa aktif dan data yang tersedia
  if ($lang === 'en') {
    $metaTitle = $tbproduk->meta_title_inggris ?? $artikel->meta_title_inggris ?? $tbaktivitas->meta_title_inggris ?? $metadata['meta_title_inggris'] ?? 'default';
    $metaDescription = $tbproduk->meta_description_inggris ?? $artikel->meta_description_inggris ?? $tbaktivitas->meta_description_inggris ?? $metadata['meta_description_inggris'] ?? 'default';
    $pageTitle = $tbproduk->nama_produk_en ?? $artikel->judul_inggris ?? $tbaktivitas->nama_aktivitas_en ?? $metadata->feature ?? 'Petal Paradise';
  } else {
    $metaTitle = $tbproduk->meta_title ?? $artikel->meta_title ?? $tbaktivitas->meta_title ?? $metadata['meta_title'] ?? 'default';
    $metaDescription = $tbproduk->meta_description ?? $artikel->meta_description ?? $tbaktivitas->meta_description ?? $metadata['meta_description'] ?? 'default';
    $pageTitle = $tbproduk->nama_produk_in ?? $artikel->judul_artikel ?? $tbaktivitas->nama_aktivitas_in ?? $metadata->feature ?? 'Petal Paradise';
  }
  ?>

  <title><?= esc($pageTitle) ?></title>
  <meta name="title" content="<?= esc($metaTitle) ?>">
  <meta name="description" content="<?= esc($metaDescription) ?>">

  <!-- Favicon -->
  <!--<link href="<?= base_url('Favicon_PT-NAKAM-Foods-Indonesia_22082023083620.png') ?>" rel="icon">-->
  <!-- Google Web Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <!-- Flaticon Font -->
  <link href="<?= base_url('asset-user') ?>/lib/flaticon/font/flaticon.css" rel="stylesheet">
  <!-- Libraries Stylesheet -->
  <link href="<?= base_url('asset-user') ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url('asset-user') ?>/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
  <!-- Customized Bootstrap Stylesheet -->
  <link href="<?= base_url('asset-user') ?>/css/style.css" rel="stylesheet">
  <style>
    /* Styles for floating buttons */
    .floating-button,
    .floating-button-whatsapp {
      position: fixed;
      z-index: 1000;
      width: 60px;
      height: 60px;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      border: none;
      border-radius: 50%;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      cursor: pointer;
      transition: opacity 0.3s, background-color 0.3s;
    }

    .floating-button {
      bottom: 90px;
      right: 20px;
      background-color: #007bff;
    }

    .floating-button-whatsapp {
      bottom: 20px;
      right: 20px;
      background-color: #25d366;
    }

    .floating-button:hover,
    .floating-button-whatsapp:hover {
      opacity: 0.8;
    }

    .hidden {
      opacity: 0;
      pointer-events: none;
    }

    .floating-button i,
    .floating-button-whatsapp i {
      font-size: 24px;
    }
  </style>
</head>

<body>

  <?= $this->include('user/layout/header'); ?>

  <!-- render halaman konten -->
  <?= $this->renderSection('content'); ?>

  <!-- Floating Buttons -->
  <button class="floating-button hidden" onclick="scrollToTop()">
    <i class="fas fa-arrow-up"></i>
  </button>
  <button class="floating-button-whatsapp" onclick="openWhatsApp()">
    <i class="fab fa-whatsapp"></i>
  </button>

  <!-- footer -->
  <?= $this->include('user/layout/footer');  ?>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/lib/easing/easing.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/lib/tempusdominus/js/moment.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

  <!-- Contact Javascript File -->
  <script src="<?= base_url('asset-user') ?>/mail/jqBootstrapValidation.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/mail/contact.js"></script>

  <!-- Template Javascript -->
  <script src="<?= base_url('asset-user') ?>/js/main.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/lazysizes.min.js"></script>

  <!-- Local Script for Slider -->
  <script>
    var currentSlide = 0;

    function plusSlides(n) {
      showSlides(currentSlide += n);
    }

    function dotslide(n) {
      showSlides(currentSlide = n - 1);
    }

    function showSlides(n) {
      var slides = document.getElementsByClassName("carousel-item");
      var dots = document.getElementsByClassName("dot");

      if (n >= slides.length) {
        currentSlide = 0;
      }
      if (n < 0) {
        currentSlide = slides.length - 1;
      }

      for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (var i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }

      slides[currentSlide].style.display = "block";
      dots[currentSlide].className += " active";
    }
  </script>

  <!-- Script to handle floating buttons -->
  <script>
    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }

    function openWhatsApp() {
      window.location.href = 'https://wa.me/6289696874489';
    }

    window.addEventListener('scroll', function() {
      var scrollButton = document.querySelector('.floating-button');
      if (window.scrollY > 100) {
        scrollButton.classList.remove('hidden');
      } else {
        scrollButton.classList.add('hidden');
      }
    });
  </script>


  <script>
    var currentURL = window.location.href;


    var menuLinks = document.querySelectorAll(".navbar-nav a.nav-link");


    for (var i = 0; i < menuLinks.length; i++) {
      var menuLink = menuLinks[i];


      var normalizedMenuURL = menuLink.href.split("?")[0];
      if (currentURL === normalizedMenuURL) {
        menuLink.classList.add("active");
        break;
      }
    }
  </script>

</html>