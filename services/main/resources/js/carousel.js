import  { Carousel }  from 'flowbite';

const carouselElement = document.getElementById('product-carousel');
// options with default values
const options = {
    defaultPosition: 1,
    interval: 3000,

    indicators: {
        activeClasses: 'border border-black',
        inactiveClasses:
            'dark:hover:bg-gray-800 border border-black',
            items: []

    },
    // callback functions

};

// instance options object
const instanceOptions = {
  id: 'product-carousel',
  override: true
};


const carousel = new Carousel(carouselElement, [], options, instanceOptions);

