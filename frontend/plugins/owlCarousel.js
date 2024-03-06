// plugins/owlCarousel.js
export default function(app) {
    if (process.client) {
      // Initialize Owl Carousel here
     // import 'jquery';
     // import 'owl.carousel/dist/owl.carousel';
  
      // You may need to adjust the jQuery selector based on your HTML structure
      $(document).ready(() => {
        $('.sliderPart').owlCarousel({
          items: 1,
          loop: true,
          margin: 5,
          nav: false,
          autoplay: true,
          autoplayTimeout: 2000,
          autoplayHoverPause: true
        });
      });
    }
  }
  