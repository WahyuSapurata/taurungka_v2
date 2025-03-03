/* **************************************************************************** 
                          Custom GSAP js start 
****************************************************************************  */

var tl = gsap.timeline(); 
gsap.registerPlugin(ScrollTrigger, SplitText);

// =================================== Custom Cursor Js Start =====================================
var body = document.body;
var cursor = document.querySelector('.cursor');
var dot = document.querySelector('.dot');
var cursorSmalls = document.querySelectorAll('.cursor-small');
var cursorBigs = document.querySelectorAll('.cursor-big');

body.addEventListener('mousemove', function (event) {
    gsap.to(cursor, {
        x: event.x,
        y: event.y,
        duration: 2, 
        delay: 0.1,
        visibility: 'visible',
        ease: "expo.out",
    });
});

body.addEventListener('mousemove', function (event) {
    gsap.to(dot, {
        x: event.x,
        y: event.y,
        duration: 1.5,
        visibility: 'visible',
        ease: "expo.out",
    });
});

// Small Cursor
cursorSmalls.forEach(cursorSmall => {
  cursorSmall.addEventListener('mouseenter', function () {
      gsap.to(dot, {
          scale: 8,
          backgroundColor: '#fff',
      });
      gsap.to(cursor, {
          visibility: 'hidden',
          opacity: 0
      });
  });
  
  cursorSmall.addEventListener('mouseleave', function () {
      gsap.to(dot, {
          scale: 1,
          backgroundColor: '#fff',
      });
      gsap.to(cursor, {
        visibility: 'visible',
        opacity: 1
      });
  });
});

// Big Cursor
cursorBigs.forEach(cursorBig => {
  cursorBig.addEventListener('mouseenter', function () {
      gsap.to(dot, {
          scale: 16,
          backgroundColor: '#fff',
      });
      gsap.to(cursor, {
          visibility: 'hidden',
          opacity: 0
      });
  });
  
  cursorBig.addEventListener('mouseleave', function () {
      gsap.to(dot, {
          scale: 1,
          backgroundColor: '#fff',
      });
      gsap.to(cursor, {
        visibility: 'visible',
        opacity: 1
      });
  });
});
// =================================== Custom Cursor Js End =====================================


// **************************** Mobile Menu js Start ****************************
var mmm = gsap.matchMedia(); 
var mtl = gsap.timeline({paused: true}); 

const toggleMobileMenu = document.querySelector('.toggle-mobileMenu');
const closeButton = document.querySelector('.close-button');
const mobileSideOverlay = document.querySelector('.side-overlay');

mmm.add("(max-width: 991px)", () => {
  
  mtl.to('.side-overlay', {
    opacity: 1,
    visibility: 'visible',
    duration: .3, 
  });
  
  mtl.to('.mobile-menu', {
    x: 0,
  });
  
  mtl.from('.nav-menu__item', {
    opacity: 0,
    duration: .3,
    x: -60,
    stagger: .12,
  });

  mtl.from('.close-button', {
    opacity: 0,
    scale: 0,
    duration: .2,
  });

  toggleMobileMenu.addEventListener('click', function () {
    mtl.play();
    document.body.style.overflow = 'hidden'
  });

  closeButton.addEventListener('click', function () {
    mtl.reverse();
    document.body.style.overflow = ''
  });

  mobileSideOverlay.addEventListener('click', function () {
    mtl.reverse();
    document.body.style.overflow = ''
  });

});
// **************************** Mobile Menu js End ****************************


// **************************** offcanvas sidebar js start ****************************
var stl = gsap.timeline({
  paused: true,
  onReverseComplete: function() {
    document.body.style.overflow = '';
    document.body.style.paddingInlineEnd = '';
  }
}); 

var offcanvasBarIcon = document.querySelector('.offcanvas-bar-icon');
var closeBtn = document.querySelector('.offcanvas-sidebar__close');
var sideOverlay = document.querySelector('.side-overlay');

stl.to('.side-overlay', {
  duration: .3, 
  visibility: 'visible',
  opacity: 1
});

stl.to('.offcanvas-sidebar', {
  x: 0,
  duration: .3, 
  delay: .2
});

stl.from('.animate-item', {
  x: 80,
  opacity: 0,
  stagger: .12,
  duration: .3,
}); 

stl.from('.offcanvas-sidebar__close', {
  scale: .4,
  opacity: 0,
  duration: 0.4,
  delay: 0.1,
});

mmm.add("(min-width: 992px)", () => {
  offcanvasBarIcon.addEventListener('click', function () {
    document.body.style.overflow = 'hidden';
    document.body.style.paddingInlineEnd = '18px';
  });
});

// Mobile device scroll hide
mmm.add("(max-width: 991px)", () => {
  offcanvasBarIcon.addEventListener('click', function () {
    document.body.style.overflow = 'hidden';
  });
  
  closeBtn.addEventListener('click', function () {
    document.body.style.overflow = '';
    document.body.style.paddingInlineEnd = '';
  });
  
  sideOverlay.addEventListener('click', function () {
    document.body.style.overflow = '';
    document.body.style.paddingInlineEnd = '';
  });
});

offcanvasBarIcon.addEventListener('click', function () {
  stl.play();
});

closeBtn.addEventListener('click', function () {
  stl.reverse();
});

sideOverlay.addEventListener('click', function () {
  stl.reverse();
});
// **************************** offcanvas sidebar js End ****************************

// =================================== Custom Split text Js Start =====================================
if ($(".splitTextStyleOne").length > 0) {
  let character = gsap.utils.toArray(".splitTextStyleOne");
  character.forEach((character) => {
    let split_char = new SplitText(character, {
      type: "chars, words",
      lineThreshold: 0.5,
    });
    const tl2 = gsap.timeline({
      scrollTrigger: {
        trigger: character,
        start: "top 90%",
        end: "bottom 60%",
        scrub: false,
        markers: false,
        toggleActions: "play none none none",
      },
    });
    tl2.from(split_char.chars, {
      autoAlpha: 0,
      y: 40,
      duration: 0.5,
      opacity: 0,
      stagger: 0.05,
      ease: "back.out(1.7)"
    });
  });
}
// =================================== Custom Split text Js End =====================================



// **************************** Position Aware button hover js start ****************************
class Button {
  constructor(buttonElement) {
    this.block = buttonElement;
    this.init();
    this.initEvents();
  }

  init() {
    const el = gsap.utils.selector(this.block);

    this.DOM = {
      button: this.block,
      flair: el(".button__flair")
    };

    this.xSet = gsap.quickSetter(this.DOM.flair, "xPercent");
    this.ySet = gsap.quickSetter(this.DOM.flair, "yPercent");
  }

  getXY(e) {
    const {
      left,
      top,
      width,
      height
    } = this.DOM.button.getBoundingClientRect();

    const xTransformer = gsap.utils.pipe(
      gsap.utils.mapRange(0, width, 0, 100),
      gsap.utils.clamp(0, 100)
    );

    const yTransformer = gsap.utils.pipe(
      gsap.utils.mapRange(0, height, 0, 100),
      gsap.utils.clamp(0, 100)
    );

    return {
      x: xTransformer(e.clientX - left),
      y: yTransformer(e.clientY - top)
    };
  }

  initEvents() {
    this.DOM.button.addEventListener("mouseenter", (e) => {
      const { x, y } = this.getXY(e);

      this.xSet(x);
      this.ySet(y);

      gsap.to(this.DOM.flair, {
        scale: 1,
        duration: 0.9,
        ease: "power2.out"
      });
    });

    this.DOM.button.addEventListener("mouseleave", (e) => {
      const { x, y } = this.getXY(e);

      gsap.killTweensOf(this.DOM.flair);

      gsap.to(this.DOM.flair, {
        xPercent: x > 90 ? x + 20 : x < 10 ? x - 20 : x,
        yPercent: y > 90 ? y + 20 : y < 10 ? y - 20 : y,
        scale: 0,
        duration: 0.9,
        ease: "power2.out"
      });
    });

    this.DOM.button.addEventListener("mousemove", (e) => {
      const { x, y } = this.getXY(e);

      gsap.to(this.DOM.flair, {
        xPercent: x,
        yPercent: y,
        duration: 0.9,
        ease: "power2"
      });
    });
  }
}

const buttonElements = document.querySelectorAll('[data-block="button"]');

buttonElements.forEach((buttonElement) => {
  new Button(buttonElement);
});

// **************************** Position Aware button hover js End ****************************



// **************************** banner Small Plane js Start ****************************
if (document.querySelector(".planeSmall")) {
  let st2 = gsap.timeline({
    scrollTrigger: {
        trigger: ".planeSmall",
        scrub: 2,
        start: "top 25%",
        end: "bottom 10%",
        markers: false 
    }
  });
  st2.from(".planeSmall", {
    duration: .8,
    x: -80,
    scale: .6,
  }).to(".planeSmall", {
    duration: .8,
    x: 0,
    scale: 1,
  });
}

// **************************** banner Small Plane js End ****************************


// **************************** About Section Plane js Star ****************************
if (document.querySelector(".about-plane")) {
  let atl = gsap.timeline({
    scrollTrigger: {
      trigger: ".about-plane",
      start: "top 80%",
      end: "bottom 20%",
      scrub: 2,  
      markers: false,
    }
  });
  atl.fromTo(".about-plane", 
    {
      x: -260,
    },  
    { 
      x: 260,
      y: -380,
      rotate: -40,
      duration: 1.6
    } 
  );
}


// Truck Head
if (document.querySelector(".truck-head")) { 
  let trucktl = gsap.timeline({
    scrollTrigger: {
      trigger: ".truck-head",
      start: "top 50%",
      end: "bottom 10%",
      scrub: 2,  
      markers: false,
    }
  });
  trucktl.fromTo(".truck-head", 
    {
      y: -280,
    },  
    { 
      y: 0,
      duration: 1.6
    } 
  );
}
// **************************** About Section Plane js End ****************************


// **************************** Counter Section js Start ****************************
// blue biman
if (document.querySelector(".planeSmall")) { 
  let counterBimanTL = gsap.timeline({
    scrollTrigger: {
      trigger: ".blue-biman",
      start: "top 90%",
      end: "bottom 15%",
      scrub: 2,  
      markers: false,
    }
  });
  counterBimanTL.fromTo(".blue-biman", 
    {
      x: 240,
      scale: .3
    },  
    { 
      x: 0,
      scale: 1,
      duration: 1.6
    } 
  );
}

// BG Image
if (document.querySelector(".counter-bg-img")) { 
  let counterImgTL = gsap.timeline({
    scrollTrigger: {
      trigger: ".counter-bg-img",
      start: "top 80%",
      end: "bottom 10%",
      scrub: 2,  
      markers: false,
    }
  });
  counterImgTL.fromTo(".counter-bg-img", 
    {
      x: 600,
    },  
    { 
      x: 0,
      duration: 1.6
    } 
  );
}
// **************************** Counter Section js End ****************************


// **************************** transport way Section js End ****************************
if (document.querySelector(".plan-down")) { 
  let transWayLT = gsap.timeline({
    scrollTrigger: {
      trigger: ".plan-down",
      start: "top 70%",
      end: "bottom 0%",
      scrub: 2,  
      markers: false,
    }
  });
  transWayLT.fromTo(".plan-down", 
    {
      x: -260,
      scale: .6
    },  
    { 
      x: 120,
      y: 220,
      scale: 1.4,
      duration: 1.6
    } 
  );
}
// **************************** transport way Section js End ****************************

// **************************** Project section js Start ****************************
if (document.querySelector(".project-shape-img")) { 
  let projectLT = gsap.timeline({
    scrollTrigger: {
      trigger: ".project-shape-img",
      start: "top 70%",
      end: "bottom 0%",
      scrub: 2,  
      markers: false,
    }
  });
  projectLT.fromTo(".project-shape-img", 
    {
      y: -360,
      scale: .6
    },  
    { 
      y: 0,
      scale: 1.4,
      duration: 1.6
    } 
  );
}
// **************************** Project section js End ****************************


// **************************** quote section start ==========================
if (document.querySelector(".updown-animation, .moon-shape")) { 
  gsap.utils.toArray(".updown-animation, .moon-shape").forEach((element) => {
    let karentl = gsap.timeline({
      scrollTrigger: {
        trigger: element,
        start: "top 50%",
        end: "bottom 10%",
        scrub: 2,
        markers: false,
      }
    });
  
    karentl.fromTo(
      element,
      { y: -280 },
      { y: 0, duration: 1.6 }
    );
  });
}
// **************************** quote section End ==========================

// **************************** quote Two section start ==========================
if (document.querySelector(".plan-location")) { 
  let planLocation = gsap.timeline({
    scrollTrigger: {
      trigger: ".plan-location",
      start: "top 70%",
      end: "bottom 0%",
      scrub: 2,  
      markers: false,
    }
  });
  planLocation.fromTo(".plan-location", 
    {
      y: -360,
      scale: .6
    },  
    { 
      y: 0,
      scale: 1.4,
      duration: 1.6
    } 
  );
}
// **************************** quote Two section End ==========================


// **************************** ship big section start ==========================
if (document.querySelector(".ship-big")) { 
  let shipBig = gsap.timeline({
    scrollTrigger: {
      trigger: ".ship-big",
      start: "top 92%",
      end: "bottom 60%",
      scrub: 2,  
      markers: false,
    }
  }); 
  shipBig.fromTo(".ship-big", 
    {
      y: -200,
    },  
    { 
      y: 0,
      duration: 1.6
    } 
  );
}
// **************************** ship big section End ==========================


// **************************** left to right start ==========================
// BG Image
if (document.querySelector(".truck-light")) { 
  let leftToRightTL = gsap.timeline({
    scrollTrigger: {
      trigger: ".truck-light",
      start: "top 80%",
      end: "bottom 10%",
      scrub: 2,  
      markers: false,
    }
  });
  leftToRightTL.fromTo(".truck-light", 
    {
      x: -260,
    },  
    { 
      x: 0,
      duration: 1.6
    } 
  );
}
// **************************** left to right End ==========================

// **************************** left to right start ==========================
// BG Image
if (document.querySelector(".only-track")) { 
  let leftToRightTwoTL = gsap.timeline({
    scrollTrigger: {
      trigger: ".only-track",
      start: "top 98%",
      end: "bottom 20%",
      scrub: 3,  
      markers: false,
    }
  });
  leftToRightTwoTL.fromTo(".only-track", 
    {
      x: -480,
    },  
    { 
      x: 0,
      duration: 1.6
    } 
  );
}
// **************************** left to right End ==========================


// **************************** banner Small Plane js Start ****************************
if (document.querySelector(".banner-three-plane")) { 
  let bannerThreePlane = gsap.timeline({
    scrollTrigger: {
      trigger: ".banner-three-plane",
      scrub: 2,
      start: "top 25%",
      end: "bottom 10%",
      markers: false 
    }
  });
  bannerThreePlane.from(".banner-three-plane", {
    duration: .8,
    x: 80,
    scale: .6,
  })
}
// **************************** banner Small Plane js End ****************************


// **************************** banner Small Plane js Start ****************************
if (document.querySelector(".quote-three-plane")) { 
  let bannerThreePlaneTwo = gsap.timeline({
    scrollTrigger: {
      trigger: ".quote-three-plane",
      scrub: 2,
      start: "top 80%",
      end: "bottom 10%",
      markers: false 
    }
  });
  bannerThreePlaneTwo.from(".quote-three-plane", {
    duration: .8,
    x: 80,
    scale: .2,
  })
}
// **************************** banner Small Plane js End ****************************

// **************************** banner Small Plane js Start ****************************
if (document.querySelector(".contact-us-three-plane")) { 
  let bannerThreePlaneThree = gsap.timeline({
    scrollTrigger: {
      trigger: ".contact-us-three-plane",
      scrub: 2,
      start: "top 80%",
      end: "bottom 10%",
      markers: false 
    }
  });
  bannerThreePlaneThree.from(".contact-us-three-plane", {
    duration: .8,
    x: 80,
    scale: .2,
  })
}
// **************************** banner Small Plane js End ****************************

// **************************** banner Small Plane js Start ****************************
if (document.querySelector(".support-small-plane")) { 
  let supportSmallPlane = gsap.timeline({
    scrollTrigger: {
      trigger: ".support-small-plane",
      scrub: 2,
      start: "top 80%",
      end: "bottom 10%",
      markers: false 
    }
  });
  supportSmallPlane.from(".support-small-plane", {
    duration: .8,
    x: 80,
    scale: .2,
  })
}
// **************************** banner Small Plane js End ****************************

/* **************************************************************************** 
                          Custom GSAP js start 
****************************************************************************  */