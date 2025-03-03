(function ($) {
  "use strict";
  
  // ==========================================
  //      Start Document Ready function
  // ==========================================
  $(document).ready(function () {
    
  // ============== Mobile Nav Menu Dropdown Js Start =======================
  function toggleSubMenu() {
    if ($(window).width() <= 991) {
      $('.has-submenu').off('click').on('click', function () {
        $(this).toggleClass('active').siblings('.has-submenu').removeClass('active').find('.nav-submenu').slideUp(300);
        $(this).find('.nav-submenu').stop(true, true).slideToggle(300);
      });
    } else {
      $('.has-submenu').off('click'); 
    }
  }

  toggleSubMenu();
  $(window).resize(toggleSubMenu);
  // ============== Mobile Nav Menu Dropdown Js End =======================
    
  // ===================== Scroll Back to Top Js Start ======================
  var progressPath = document.querySelector('.progress-wrap path');
  var pathLength = progressPath.getTotalLength();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
  progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
  progressPath.style.strokeDashoffset = pathLength;
  progressPath.getBoundingClientRect();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
  var updateProgress = function () {
    var scroll = $(window).scrollTop();
    var height = $(document).height() - $(window).height();
    var progress = pathLength - (scroll * pathLength / height);
    progressPath.style.strokeDashoffset = progress;
  }
  updateProgress();
  $(window).scroll(updateProgress);
  var offset = 50;
  var duration = 550;
  jQuery(window).on('scroll', function() {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.progress-wrap').addClass('active-progress');
    } else {
      jQuery('.progress-wrap').removeClass('active-progress');
    }
  });
  jQuery('.progress-wrap').on('click', function(event) {
    event.preventDefault();
    jQuery('html, body').animate({scrollTop: 0}, duration);
    return false;
  })
  // ===================== Scroll Back to Top Js End ======================

  
// ========================== add active class to navbar menu current page Js Start =====================
  function dynamicActiveMenuClass(selector) {
    let FileName = window.location.pathname.split("/").reverse()[0];

    // If we are at the root path ("/" or no file name), keep the activePage class on the Home item
    if (FileName === "" || FileName === "index.html") {
      // Keep the activePage class on the Home link
      selector.find("li.nav-menu__item.has-submenu").eq(0).addClass("activePage");
    } else {
      // Remove activePage class from all items first
      selector.find("li").removeClass("activePage");

      // Add activePage class to the correct li based on the current URL
      selector.find("li").each(function () {
        let anchor = $(this).find("a");
        if ($(anchor).attr("href") == FileName) {
          $(this).addClass("activePage");
        }
      });

      // If any li has activePage element, add class to its parent li
      selector.children("li").each(function () {
        if ($(this).find(".activePage").length) {
          $(this).addClass("activePage");
        }
      });
    }
  }

  if ($('ul').length) {
    dynamicActiveMenuClass($('ul'));
  }
// ========================== add active class to navbar menu current page Js End =====================


// ========================== Set Language in dropdown Js Start =================================
$('.lang-dropdown li').each(function () {
  var thisItem = $(this); 

  thisItem.on('click', function () {
    const listText = thisItem.text().trim(); // Get the text of the clicked item
    const listImageSrc = thisItem.find('img').attr('src'); // Get the image source of the clicked item

    // Set the selected text and image
    const selectedTextContainer = thisItem.closest('.group-item').find('.selected-text');
    selectedTextContainer.contents().last().replaceWith(listText); // Update the text (after the image)
    selectedTextContainer.find('img').attr('src', listImageSrc); // Update the image
  });
});
// ========================== Set Language in dropdown Js End =================================

  
// ========================== Add Attribute For Bg Image Js Start ====================
$(".bg-img").css('background', function () {
  var bg = ('url(' + $(this).data("background-image") + ')');
  return bg;
});
// ========================== Add Attribute For Bg Image Js End =====================


// ============================ Banner Slider Js Start ===========================
var bannerMenu = ['Air Freight', 'Ocean Freight', 'Land Transport']
var bannerSwiper = new Swiper ('.banner-slider', {
  loop: true,
  speed: 800,
  slidesPerView: 1,
  grabCursor: true,
  loop: true,
  effect: 'fade',
  autoplay: {
    delay: 4500,
    disableOnInteraction: false, 
  },
  pagination: {
    el: '.banner-pagination',
    clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (bannerMenu[index]) + '</span>';
      },
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

// Stop
$('.banner-slider').on('mouseenter', function() {
  bannerSwiper.autoplay.stop();
});

// Start
$('.banner-slider').on('mouseleave', function() {
  bannerSwiper.autoplay.start();
});
// ============================ Banner Slider Js End ===========================


// ============================ Banner Slider Js Start ===========================
var bannerTwoMenu = ['Air Freight', 'Ocean Freight', 'Land Transport']
var bannerTwoSwiper = new Swiper ('.banner-two-slider', {
  loop: true,
  speed: 800,
  slidesPerView: 1,
  grabCursor: true,
	effect: 'fade',
  loop: true,
  autoplay: {
    delay: 3500,
    disableOnInteraction: false, 
  },
  pagination: {
    el: '.banner-two-pagination',
    clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (bannerMenu[index]) + '</span>';
      },
  },

  // Navigation arrows
  navigation: {
    nextEl: '.banner-two-swiper-button-next',
    prevEl: '.banner-two-swiper-button-prev',
  },
});

// Stop
$('.banner-two-slider').on('mouseenter', function() {
  bannerTwoSwiper.autoplay.stop();
});

// Start
$('.banner-two-slider').on('mouseleave', function() {
  bannerTwoSwiper.autoplay.start();
});
// ============================ Banner Slider Js End ===========================


// ============================ AOS Js Start ===========================
AOS.init();
// ============================ AOS Js End ===========================


// ============================ Features Item Js Start ===========================
$('.features-item').on('mouseenter', function () {
  $('.features-item').removeClass('bg-white common-shadow-two');
  $(this).addClass('bg-white common-shadow-two');
});
// ============================ Features Item Js End ===========================


// ============================ Animated Radial Progress Bar Js Start ===========================
$('svg.radial-progress').each(function( index, value ) { 
  $(this).find($('circle.complete')).removeAttr( 'style' );
});
// ============================ Animated Radial Progress Bar Js End ===========================


// ========================= Counter Up Js Start ===================
const counterUp = window.counterUp.default;

const callback = (entries) => {
  entries.forEach((entry) => {
    const el = entry.target;
    if (entry.isIntersecting && !el.classList.contains('is-visible')) {
      counterUp(el, {
        duration: 2000,
        delay: 16,
      });
      el.classList.add('is-visible');
    }
  });
};
const IO = new IntersectionObserver(callback, { threshold: 1 });


// Counter
const counter = document.querySelector('.counter');
if (counter) {
  IO.observe(counter);
}
// ========================= Counter Up Js End ===================


// ========================= Add Class To transport way item Js Start ===================
$('.how-it-work-item').on('mouseenter', function () {
  $('.how-it-work-item').find('.how-it-work-item__icon').removeClass('bg-main-two-600');
  $(this).find('.how-it-work-item__icon').addClass('bg-main-two-600');
});
// ========================= Add Class To transport way item Js End ===================


// ========================= magnific Popup Js Start =====================
$('.play-button').magnificPopup({
  type:'iframe',
  removalDelay: 300,
  mainClass: 'mfp-fade',
});
// ========================= magnific Popup Js End =====================


// ================================= Project slider Start =========================
var projectSlider = new Swiper(".project-slider", {
  slidesPerView: 4,
  loop: true,
  spaceBetween: 30,
  grabCursor: true,
  speed: 1500,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".project-pagination",
    clickable: true,
  },
  breakpoints: {
    300: {
      slidesPerView: 1,
    },
    575: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 3,
    },
    1400: {
      slidesPerView: 4,
    },
  },
});
// ================================= Project slider Start =========================


// ========================= Add Class To location item Js Start ===================
$('.location-item').on('mouseenter', function () {
  $('.location-item').find('.location-item__card').addClass('invisible opacity-0');
  $(this).find('.location-item__card').removeClass('invisible opacity-0');
});
// ========================= Add Class To location item Js End ===================


// ================================= Testimoanials slider Start =========================
var testiSwiper = new Swiper(".testimonials-slider", {
  grabCursor: true,
  effect: "creative",
  speed: 1500,
  autoplay: {
    delay: 1000,
    disableOnInteraction: false, 
  },
  loop: true,
  creativeEffect: {
    prev: {
      shadow: true,
      translate: ["-20%", 0, -1],
    },
    next: {
      translate: ["100%", 0, 0],
    },
  },
});

// Stop
$('.testimonials-slider').on('mouseenter', function() {
  testiSwiper.autoplay.stop();
});

// Start
$('.testimonials-slider').on('mouseleave', function() {
  testiSwiper.autoplay.start();
});
// ================================= Testimoanials slider Start =========================


// ================================= brand slider Start =========================
var brandSliderOne = new Swiper('.brand-slider', {
  autoplay: {
    delay: 2000,
    disableOnInteraction: false
  },
  speed: 1500,
  grabCursor: true,
  loop: true,
  slidesPerView: 5,
  breakpoints: {
      300: {
          slidesPerView: 2,
      },
      768: {
          slidesPerView: 3,
      },
      992: {
          slidesPerView: 4,
      },
      1200: {
          slidesPerView: 5,
      },
  }
});
// ================================= brand slider End =========================

// ================================= brand slider Start =========================
var brandSlider = new Swiper('.brand-three-slider', {
  autoplay: {
    delay: 2000,
    disableOnInteraction: false
  },
  speed: 1500,
  grabCursor: true,
  loop: true,
  slidesPerView: 5,
  breakpoints: {
      300: {
          slidesPerView: 2,
      },
      768: {
          slidesPerView: 3,
      },
      992: {
          slidesPerView: 4,
      },
      1200: {
          slidesPerView: 5,
      },
  }
});
// ================================= brand slider End =========================

// ================================= Brand Two slider Start =========================
var brandTwoSlider = new Swiper('.brand-two-slider', {
  autoplay: {
    delay: 2000,
    disableOnInteraction: false
  },
  autoplay: false,
  speed: 1500,
  grabCursor: true,
  loop: true,
  slidesPerView: 7,
  breakpoints: {
      300: {
          slidesPerView: 2,
      },
      575: {
          slidesPerView: 3,
      },
      768: {
          slidesPerView: 4,
      },
      992: {
          slidesPerView: 5,
      },
      1200: {
          slidesPerView: 6,
      },
      1400: {
          slidesPerView: 7,
      },
  }
});
// ================================= Brand Two slider End =========================

// ========================= Blog item hover Js Start ===================
$('.blog-item').on('mouseenter', function () {
  $('.blog-item').find('.blog-date').addClass('bg-main-600').removeClass('bg-main-two-600');
  $('.blog-item').find('.blog-tag').addClass('bg-main-two-600').removeClass('bg-main-600');

  $(this).find('.blog-date').removeClass('bg-main-600').addClass('bg-main-two-600');
  $(this).find('.blog-tag').removeClass('bg-main-two-600').addClass('bg-main-600');
});
// ========================= Blog item hover Js End ===================


// ========================= Transport Way Js Start ===================
$('.transport-way-item').on('mouseenter', function () {
  $('.transport-way-item').find('.transport-way-item__icon').removeClass('bg-main-two-600');
  $('.transport-way-item').find('.transport-way-item__content').removeClass('border-main-two-600').addClass('border-neutral-50 ');

  $(this).find('.transport-way-item__icon').addClass('bg-main-two-600');
  $(this).find('.transport-way-item__content').removeClass('border-neutral-50').addClass('border-main-two-600');
});
// ========================= Transport Way Js End ===================


// ================================= Project slider Start =========================
var teamSlider = new Swiper(".team-slider", {
  slidesPerView: 5,
  loop: true,
  spaceBetween: 30,
  grabCursor: true,
  speed: 1500,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  autoplay: false,
  pagination: {
    el: ".team-pagination",
    clickable: true,
  },
  breakpoints: {
    300: {
      slidesPerView: 1,
    },
    575: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 3,
    },
    1200: {
      slidesPerView: 4,
    },
    1400: {
      slidesPerView: 5,
    },
  },
});
// ================================= Project slider Start =========================


// ================================= Project slider Start =========================
var testimonialsTwoSlider = new Swiper(".testimonials-two-slider", {
  slidesPerView: 3,
  loop: true,
  spaceBetween: 30,
  grabCursor: true,
  speed: 1500,
  loop: true,
  centerMode: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  autoplay: false,
  pagination: {
    el: ".project-pagination",
    clickable: true,
  },
  // Navigation arrows
  navigation: {
    nextEl: '.testimonials-two-button-next',
    prevEl: '.testimonials-two-button-prev',
  },
  breakpoints: {
    300: {
      slidesPerView: 1,
    },
    575: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 2,
    },
    1200: {
      slidesPerView: 3,
    },
  },
});
// ================================= Project slider Start =========================

// ================================= Marquee slider Start =========================
  if ($(".marquee").length) {
    $('.marquee').marquee({
        speed: 100,
        gap: 0,
        delayBeforeStart: 0,
        direction: $('html').attr('dir') === 'rtl' ? 'right' : 'left',
        duplicated: true,
        pauseOnHover: true,
        startVisible:true,
    });
  }
// ================================= Marquee slider End =========================

// ================================ Projects page js start =================================
  $('.project-gallery-link').magnificPopup({
    type: 'image',
    gallery: {
      enabled: true
    },
  });
// ================================ Projects page js End =================================


// ================================ Floating Progress js start =================================
  const progressContainers = document.querySelectorAll('.progress-container');

  function setPercentage(progressContainer) {
      const percentage = progressContainer.getAttribute('data-percentage') + '%';
      
      const progressEl = progressContainer.querySelector('.progress');
      const percentageEl = progressContainer.querySelector('.percentage');
      
      progressEl.style.width = percentage;
      percentageEl.innerText = percentage;
      percentageEl.style.insetInlineStart = percentage;
  }

  // Intersection Observer to trigger progress animation when section is in view
  const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
          if (entry.isIntersecting) {
              // Element is in view, start the progress animation
              const progressContainer = entry.target;
              setPercentage(progressContainer);
              progressContainer.querySelector('.progress').classList.remove('active');
              progressContainer.querySelector('.percentage').classList.remove('active');
              observer.unobserve(progressContainer); // Stop observing once animation is triggered
          }
      });
  }, {
      threshold: 0.5 // Adjust this value as needed (0.5 means half the section needs to be visible)
  });

  // Start observing all progress containers
  progressContainers.forEach(progressContainer => {
      observer.observe(progressContainer);
});
// ================================ Floating Progress js End =================================

    
// ================================ Testimonials three slider js start =================================
  var testimonialsThreeThumbsSlider = new Swiper(".testimonials-three-thumbs-slider", {
    slidesPerView: 1,
    loop: true,
    freeMode: true,
    watchSlidesProgress: true,
    grabCursor: true,
    speed: 2500,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false, 
    },
    autoplay: false,
  });
  
  var testimonialsThreeContentSlider = new Swiper(".testimonials-three-content-slider", {
    slidesPerView: 1,
    loop: true,
    effect: "creative",
    creativeEffect: {
      prev: {
        shadow: true,
        translate: ["-20%", 0, -1],
      },
      next: {
        translate: ["100%", 0, 0],
      },
    },
    grabCursor: true,
    speed: 2500,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false, 
    },
    autoplay: false,
    navigation: {
      nextEl: ".testimonials-three-btn-next",
      prevEl: ".testimonials-three-btn-prev",
    },
    thumbs: {
      swiper: testimonialsThreeThumbsSlider,
    },
  });
// ================================ Testimonials three slider js End =================================


// ========================= Counter Three section Js Start ===================
$('.counter-three-item').on('mouseenter', function () {
  $('.counter-three-item').removeClass('bg-main-600');
  $('.counter-three-item').find('.hover-text').removeClass('text-white');

  $(this).addClass('bg-main-600');
  $(this).find('.hover-text').addClass('text-white');
});
// ========================= Counter Three section Js End ===================

// ========================= Service Three Js End ===================
var serviceThreeSlider = new Swiper(".service-three-slider", {
  slidesPerView: 3,
  loop: true,
  spaceBetween: 30,
  grabCursor: true,
  speed: 1500,
  loop: true,
  centerMode: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".project-pagination",
    clickable: true,
  },
  // Navigation arrows
  navigation: {
    nextEl: '.service-three-button-next',
    prevEl: '.service-three-button-prev',
  },
  breakpoints: {
    300: {
      slidesPerView: 1,
    },
    575: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 2,
    },
    1200: {
      slidesPerView: 3,
    },
  },
});
// ========================= Service Three Js End ===================

// ========================= Blog Three Js End ===================
var blogThreeSlider = new Swiper(".blog-three-slider", {
  slidesPerView: 3,
  loop: true,
  spaceBetween: 30,
  grabCursor: true,
  speed: 1500,
  loop: true,
  centerMode: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".project-pagination",
    clickable: true,
  },
  // Navigation arrows
  navigation: {
    nextEl: '.blog-three-button-next',
    prevEl: '.blog-three-button-prev',
  },
  breakpoints: {
    300: {
      slidesPerView: 1,
    },
    575: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 2,
    },
    1200: {
      slidesPerView: 3,
    },
  },
});
// ========================= Blog Three Js End ===================


});
  // ==========================================
  //      End Document Ready function
  // ==========================================

  // ========================= Preloader Js Start =====================
    $(window).on("load", function(){
      $('.preloader').fadeOut(); 
    })
    // ========================= Preloader Js End=====================

    // ========================= Header Sticky Js Start ==============
    $(window).on('scroll', function() {
      if ($(window).scrollTop() >= 460) {
        $('.header').addClass('fixed-header');
      }
      else {
          $('.header').removeClass('fixed-header');
      }
    }); 
    // ========================= Header Sticky Js End===================

})(jQuery);
