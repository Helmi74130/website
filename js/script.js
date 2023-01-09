AOS.init({once: true,});

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



  let titleDemarqued = document.querySelector('#titleDemarqued');
  let titleAcccompanied = document.querySelector('#titleAcccompanied');
  let rocket = document.querySelector('#rocket');
  
    const observerH2Title = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
          titleDemarqued.classList.add('tracking-in-expand')
        }
      }, {
          threshold: 0.99
          });

    observerH2Title.observe(titleDemarqued);

    const observerH3Title = new IntersectionObserver((entries) => {
      if (entries[0].isIntersecting) {
        titleAcccompanied.classList.add('tracking-in-expand')
      }
    }, {
        threshold: 0.99
        });

  observerH3Title.observe(titleAcccompanied);

  const observerRocket = new IntersectionObserver((entries) => {
    if (entries[0].isIntersecting) {
      rocket.classList.add('bounce-out-top')
    }
  }, {
      threshold: 0.99
      });

observerRocket.observe(rocket);
  