 <!-- Carousel Start Slider -->
 <div class="container-fluid p-0">
     <div id="header-carousel" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
             <?php foreach ($tbslider as $key => $slider) : ?>
                 <div class="carousel-item<?= $key === 0 ? ' active' : ''; ?>">
                     <img class="w-100 lazyload" data-src="asset-user/images/<?= $slider->file_foto_slider; ?>" alt="Image">
                     <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                     </div>
                 </div>
             <?php endforeach; ?>
         </div>
         <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
             <div class="btn btn-primary rounded" style="width: 45px; height: 45px;">
                 <span class="carousel-control-prev-icon mb-n2"></span>
             </div>
         </a>
         <a class="carousel-control-next" href="#header-carousel" data-slide="next">
             <div class="btn btn-primary rounded" style="width: 45px; height: 45px;">
                 <span class="carousel-control-next-icon mb-n2"></span>
             </div>
         </a>
         <div class="page">
             <?php for ($a = 1; $a <= count($tbslider); $a++) : ?>
                 <span class="dot<?= $a === 1 ? ' active' : ''; ?>" onclick="dotslide(<?= $a; ?>)"></span>
             <?php endfor; ?>
         </div>
     </div>
 </div>
 <style>
     .carousel-item img {
         height: 70vh;
     }
 </style>
 <!-- Carousel End -->