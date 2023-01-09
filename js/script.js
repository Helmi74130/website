AOS.init();

/*
* Generate a carousel
*/
let splide = new Splide( '.splide', {
  type   : 'fade',
  rewind: boolean = true
} );
  let bar = splide.root.querySelector( '.my-carousel-progress-bar' );
  
  // Updates the bar width whenever the carousel moves:
  splide.on( 'mounted move', function () {

    let end  = splide.Components.Controller.getEnd() + 1;
    let rate = Math.min( ( splide.index + 1 ) / end, 1 );
  } );
  
  splide.mount();


  new Splide( '#slider2', {
    type   : 'loop',
    autoplay: 'true',
    arrowPath: 'none',
    perPage: 2,
  }  ).mount();


// Wrap every letter in a span
let textWrapper = document.querySelector('.ml7 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

function animeText(){
  anime.timeline({loop: false})
  .add({
    targets: '.ml7 .letter',
    translateY: ["1.1em", 0],
    translateX: ["0.55em", 0],
    translateZ: 0,
    rotateZ: [180, 0],
    duration: 2000,
    easing: "easeOutExpo",
    delay: (el, i) => 50 * i
  }).add({
    targets: '.ml7',
    opacity: 1,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 3000
  });
}

  let titleDemarqued = document.querySelector('#titleDemarqued');
  
  function observeImg() {
    const observerLastImg = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
          animeText()
        }
    }, {
        threshold: 0.99
    });

    observerLastImg.observe(titleDemarqued);
};

observeImg();