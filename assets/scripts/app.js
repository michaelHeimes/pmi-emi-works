   /**
   * Required
   */
   
   //@prepros-prepend vendor/foundation/js/plugins/foundation.core.js
   
   /**
   * Optional Plugins
   * Remove * to enable any plugins you want to use
   */
   
   // What Input
   //@*prepros-prepend vendor/whatinput.js
   
   // Foundation Utilities
   // https://get.foundation/sites/docs/javascript-utilities.html
   //@prepros-prepend vendor/foundation/js/plugins/foundation.util.box.min.js
   //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.imageLoader.min.js
   //@prepros-prepend vendor/foundation/js/plugins/foundation.util.keyboard.min.js
   //@prepros-prepend vendor/foundation/js/plugins/foundation.util.mediaQuery.min.js
   //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.motion.min.js
   //@prepros-prepend vendor/foundation/js/plugins/foundation.util.nest.min.js
   //@*prepros-prepend vendor/foundation/js/plugins/foundation.util.timer.min.js
   //@prepros-prepend vendor/foundation/js/plugins/foundation.util.touch.min.js
   //@prepros-prepend vendor/foundation/js/plugins/foundation.util.triggers.min.js
   
   
   // JS Form Validation
   //@*prepros-prepend vendor/foundation/js/plugins/foundation.abide.js
   
   // Tabs UI
   //@*prepros-prepend vendor/foundation/js/plugins/foundation.tabs.js
   
   // Accordian
   //@prepros-prepend vendor/foundation/js/plugins/foundation.accordion.js
   //@prepros-prepend vendor/foundation/js/plugins/foundation.accordionMenu.js
   //@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveAccordionTabs.js
   
   // Menu enhancements
   //@prepros-prepend vendor/foundation/js/plugins/foundation.drilldown.js
   //@*prepros-prepend vendor/foundation/js/plugins/foundation.dropdown.js
   //@prepros-prepend vendor/foundation/js/plugins/foundation.dropdownMenu.js
   //@prepros-prepend vendor/foundation/js/plugins/foundation.responsiveMenu.js
   //@*prepros-prepend vendor/foundation/js/plugins/foundation.responsiveToggle.js
   
   // Equalize heights
   //@*prepros-prepend vendor/foundation/js/plugins/foundation.equalizer.js
   
   // Responsive Images
   //@*prepros-prepend vendor/foundation/js/plugins/foundation.interchange.js
   
   // Navigation Widget
   //@*prepros-prepend vendor/foundation/js/plugins/foundation.magellan.js
   
   // Offcanvas Naviagtion Option
   //@prepros-prepend vendor/foundation/js/plugins/foundation.offcanvas.js
   
   // Carousel (don't ever use)
   //@*prepros-prepend vendor/foundation/js/plugins/foundation.orbit.js
   
   // Modals
   //@prepros-prepend vendor/foundation/js/plugins/foundation.reveal.js
   
   // Form UI element
   //@*prepros-prepend vendor/foundation/js/plugins/foundation.slider.js
   
   // Anchor Link Scrolling
   //@prepros-prepend vendor/foundation/js/plugins/foundation.smoothScroll.js
   
   // Sticky Elements
   //@*prepros-prepend vendor/foundation/js/plugins/foundation.sticky.js
   
   // On/Off UI Switching
   //@*prepros-prepend vendor/foundation/js/plugins/foundation.toggler.js
   
   // Tooltips
   //@*prepros-prepend vendor/foundation/js/plugins/foundation.tooltip.js
   
   // What Input
   //@prepros-prepend vendor/what-input.js
   
   // Swiper
   //@prepros-prepend vendor/swiper-bundle.js
   
   // Magnific Popup
   //@prepros-prepend vendor/magnific-popup.min
   
   // DOM Ready
   (function($) {
   'use strict';
   
   var _app = window._app || {};
   
   _app.foundation_init = function() {
      $(document).foundation();
   }
      
   _app.emptyParentLinks = function() {
            
      $('.menu li a[href="#"]').click(function(e) {
            e.preventDefault ? e.preventDefault() : e.returnValue = false;
      });	
      
   };
   
   _app.fixed_nav_hack = function() {
      $('.off-canvas').on('opened.zf.offCanvas', function() {
            $('header.site-header').addClass('off-canvas-content is-open-right has-transition-push');		
            $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').addClass('clicked');	
      });
      
      $('.off-canvas').on('close.zf.offCanvas', function() {
            $('header.site-header').removeClass('off-canvas-content is-open-right has-transition-push');
            $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').removeClass('clicked');
      });
      
      $(window).on('resize', function() {
            if ($(window).width() > 1023) {
               $('.off-canvas').foundation('close');
               $('header.site-header').removeClass('off-canvas-content has-transition-push');
               $('header.site-header #top-bar-menu .menu-toggle-wrap a#menu-toggle').removeClass('clicked');
            }
      });    
   }
   
   _app.display_on_load = function() {
      $('.display-on-load').css('visibility', 'visible');
   }
   
   // Custom Functions
   
   _app.mobile_takeover_nav = function() {
      function closeOpenMenusIfWide() {
   
         if (window.innerWidth <= 899) return;
      
         const toggles = document.querySelectorAll('.menu-toggle');
         toggles.forEach(toggle => {
               if (toggle.getAttribute('aria-expanded') === 'true') {
               toggle.click();
               }
         });
      }
      
      // Run on load and optionally on resize
      closeOpenMenusIfWide();
      window.addEventListener('resize', closeOpenMenusIfWide);
   }
   
   _app.body_scrolled = function() {
      const loadNav = document.querySelector(".top-bar.load");
      if (!loadNav) return;
      
      const observer = new IntersectionObserver(
         ([entry]) => {
               if (!entry.isIntersecting) {
                  document.body.classList.add("has-scrolled");
               } else {
                  document.body.classList.remove("has-scrolled");
               }
         },
         { rootMargin: "0px 0px 0px 0px", threshold: 0 }
      );
      
      observer.observe(loadNav);
   }
   
   _app.body_scrolled = function() {
      const loadNav = document.querySelector(".top-bar.load");
      if (!loadNav) return;
      
      const observer = new IntersectionObserver(
            ([entry]) => {
               if (!entry.isIntersecting) {
                  document.body.classList.add("has-scrolled");
               } else {
                  document.body.classList.remove("has-scrolled");
               }
            },
            { rootMargin: "0px 0px 0px 0px", threshold: 0 }
      );
      
      observer.observe(loadNav);
   }
   
   _app.banner_slider = function() {
      const bannerSlider = document.querySelector('.page-banner .hero-slider');
      if(bannerSlider) {
            const slides = bannerSlider.querySelectorAll('.swiper-slide');
            
            const delay = bannerSlider.getAttribute('data-delay');
            
            function pauseAndRestartAllVideos() {
            var allVideos = document.querySelectorAll('.swiper-slide video');
            allVideos.forEach(function (video) {
               video.pause();
               video.currentTime = 0;
            });
            }
            
            function playVideoInActiveSlide() {
            var activeSlide = document.querySelector('.swiper-slide-active video');
            if (activeSlide) {
               // Show loading animation.
               const playPromise = activeSlide.play();
               
               if (playPromise !== undefined) {
                  playPromise.then(_ => {
                     // Automatic playback started!
                     // Show playing UI.
                  })
                  .catch(error => {
                     // Auto-play was prevented
                     // Show paused UI.
                  });
               }
            }
            }
   
            if( slides.length > 1 ) {
               const swiper = new Swiper('.page-banner .hero-slider', {
                  loop: true,
                  slidesPerView: 1,
                  speed: 500,
                  spaceBetween: 0,
                  effect: "fade",
                  autoplay: {
                        delay: delay + '000',
                        disableOnInteraction: false,
                  },
                  pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                  },
                  on: {
                        init: function () {
                        // Play the video in the first slide on initialization
                        playVideoInActiveSlide();
                        },
                  
                        // Listen for the transitionStart event
                        transitionStart: function () {
                        // Pause and restart all videos in slides
                        pauseAndRestartAllVideos();
                  
                        // Play the video in the active slide
                        playVideoInActiveSlide();
                        }
                  }
               });
               
            } else {
               bannerSlider.style.opacity = 1; 
            }
      }
      
   }
   
   _app.media_slider = function () {
      const mediaSliders = document.querySelectorAll('.media-slider');
      if (mediaSliders.length < 1) return;
   
      mediaSliders.forEach(function (mediaSlider) {
         const sliderSlides = mediaSlider.querySelectorAll('.swiper-slide');
         if (sliderSlides.length < 2) return;
   
         const autoplay = mediaSlider.getAttribute('data-autoplay');
         const delay = mediaSlider.getAttribute('data-delay');
         const thumbContainer = mediaSlider.querySelector('.media-slider-thumbnails');
   
         // Init thumbnail Swiper
         let thumbSwiper;
         if (thumbContainer) {
            thumbSwiper = new Swiper(thumbContainer, {
               slidesPerView: 3,
               spaceBetween: 16,
               slideToClickedSlide: true,
               watchSlidesProgress: true,
               navigation: {
                  nextEl: mediaSlider.querySelector('.swiper-button-next'),
                  prevEl: mediaSlider.querySelector('.swiper-button-prev'),
               },
               breakpoints: {
                  450: {
                     slidesPerView: 4,
                     spaceBetween: 25,
                  },
                  640: {
                     slidesPerView: 3,
                     spaceBetween: 16,
                  },
                  800: {
                     slidesPerView: 4,
                     spaceBetween: 16,
                  },
                  992: {
                     slidesPerView: 5,
                     spaceBetween: 25,
                  },
               },
            });
         }
   
         // Main slider options
         const mainSwiperOptions = {
            loop: true,
            slidesPerView: 1,
            speed: 500,
            spaceBetween: 20,
            allowTouchMove: false,
            thumbs: thumbSwiper ? { swiper: thumbSwiper } : undefined,
         };
   
         if (autoplay === '1') {
            mainSwiperOptions.autoplay = {
               delay: parseInt(delay + '000'),
               disableOnInteraction: false,
            };
         }
   
         new Swiper(mediaSlider, mainSwiperOptions);
      });
   };
   
   _app.val_prop_slider = function () {
      
      const valPropSliderSection = document.querySelector('.value-proposition-section');
      
      if( !valPropSliderSection ) return;
      
      const valPropImageSliderMobile = document.querySelector('.value-proposition-image-slider-mobile');
      const valPropImageSliderDesktop = document.querySelector('.value-proposition-image-slider-desktop');
      const valPropTextSliderMobile = document.querySelector('.value-proposition-text-slider-mobile');
      const valPropTextSliderDesktop = document.querySelector('.value-proposition-text-slider-desktop');
      const nextBtn = valPropSliderSection.querySelector('.swiper-button-next');
      
      
      const valPropImageSwiperMobile = new Swiper(valPropImageSliderMobile, {
         loop: true,
         slidesPerView: 1,
         speed: 500,
         spaceBetween: 0,
         slideToClickedSlide: false,
         navigation: {
         nextEl: nextBtn,
         },
      });
      
      const valPropImageSwiperDesktop = new Swiper(valPropImageSliderDesktop , {
         loop: true,
         slidesPerView: 1,
         speed: 500,
         spaceBetween: 0,
         slideToClickedSlide: false,
         navigation: {
         nextEl: nextBtn,
         },
      });
      
      const valPropTextSwiperMobile = new Swiper(valPropTextSliderMobile, {
         loop: true,
         slidesPerView: 2,
         speed: 500,
         spaceBetween: 0,
         slideToClickedSlide: false,
         effect: "fade",
         fadeEffect: {
            crossFade: true,
         },
         navigation: {
         nextEl: nextBtn,
         },
      });
      
      const valPropTextSwiperDesktop = new Swiper(valPropTextSliderDesktop, {
         loop: true,
         slidesPerView: 2,
         speed: 500,
         spaceBetween: 0,
         slideToClickedSlide: false,
         effect: "fade",
         fadeEffect: {
            crossFade: true,
         },
         navigation: {
         nextEl: nextBtn,
         },
      });
      
   }
   
   _app.btn_group_width = function() {
      const updateButtonWidths = () => {
            const btnGroups = document.querySelectorAll('.btns-group');
            
            if( btnGroups.length < 1) return;
            
            btnGroups.forEach(group => {
               const buttons = group.querySelectorAll('.button');
      
               // Reset widths to ensure accurate measurement
               buttons.forEach(button => button.style.width = '');
      
               if (window.innerWidth < 460) {
                  // Find the widest button
                  let maxWidth = 0;
                  buttons.forEach(button => {
                        const buttonWidth = button.offsetWidth;
                        if (buttonWidth > maxWidth) {
                           maxWidth = buttonWidth;
                        }
                  });
      
                  // Apply the widest width to all buttons
                  buttons.forEach(button => {
                        button.style.width = `${maxWidth}px`;
                  });
               }
            });
      };
      
      // Run on page load
      updateButtonWidths();
      
      // Update on window resize
      window.addEventListener('resize', updateButtonWidths);
   }
   
   _app.page_menu_block = function() {
      if( $('.page-menu-block a') ) {
         var menuitems = $('.page-menu-block a').length;
         var middle = Math.ceil(menuitems / 2);
         $('.page-menu-block a').eq(middle).addClass("first-of-column");
         if (Number.isInteger(menuitems / 2 ) == false) {
            $('.page-menu-block a').eq(menuitems - 1).addClass("last-of-column");
         }
      }
   }
   
   _app.magnificPopup = function() {
      if( $('.thumb-video') ) {
         $('.thumb-video').magnificPopup({
            type: 'iframe',
            gallery: {
               enabled:true
            },
            iframe: {
               markup: '<div class="mfp-iframe-scaler">'+
                        '<div class="mfp-close"></div>'+
                        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
                        '<div class="mfp-title">Some caption</div>'+
                     '</div>'
            },
            callbacks: {
               markupParse: function(template, values, item) {
                  values.title = item.el.attr('title');
                  },
               close: function () {
                  // Call pause() here instead of load()
                  $(".videoslide").each(function() {
                  this.pause();
                  this.currentTime = 0;
               });
               }
            }
         });
      }
   }

   
            
   _app.init = function() {
      
      // Standard Functions
      _app.foundation_init();
      _app.emptyParentLinks();
      //_app.fixed_nav_hack();
      _app.display_on_load();
      
      // Custom Functions
      _app.mobile_takeover_nav();
      _app.body_scrolled();
      _app.banner_slider();
      _app.media_slider();
      _app.val_prop_slider();
      _app.btn_group_width();
      _app.magnificPopup();
      _app.page_menu_block();
   }
   
   
   // initialize functions on load
   $(function() {
      _app.init();
   });
   
   
   })(jQuery);