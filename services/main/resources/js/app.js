import './bootstrap';
import 'flowbite';

var swiper = new Swiper(".swiper-container", {
  loop: true,
  autoplay: {
      delay: 3500
  },

  // Add SwiperPluginAutoPlay plugin.
  plugins: [ SwiperPluginAutoPlay ]
});



import.meta.glob([
    '../images/**',
    '../fonts/**',
    '../svg/**'    
  ]);
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//exports CheckDomainAvilaplety;