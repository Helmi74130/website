var splide = new Splide( '.splide', {
  type   : 'loop',
  autoplay: 'true'
} );
  var bar = splide.root.querySelector( '.my-carousel-progress-bar' );
  
  // Updates the bar width whenever the carousel moves:
  splide.on( 'mounted move', function () {
    console.log('piou');
    var end  = splide.Components.Controller.getEnd() + 1;
    var rate = Math.min( ( splide.index + 1 ) / end, 1 );
  } );
  
  splide.mount();