 var galleryThumbs = new Swiper('.gallery-thumbs', {
   spaceBetween: 10,
   //centeredSlides: true,
   //touchRatio: 0.2,
   slideToClickedSlide: true,
   freeMode: true,
   watchSlidesVisibility: true,
   watchSlidesProgress: true,
   slidesPerView: 6,
 });
 var galleryTop = new Swiper('.gallery-top', {
   spaceBetween: 10,
   navigation: {
     nextEl: '.swiper-button-next',
     prevEl: '.swiper-button-prev',
   },
   loop: true,
   thumbs: {
     swiper: galleryThumbs
   }
 });