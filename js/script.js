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


  new Splide( '#slider2' ).mount();