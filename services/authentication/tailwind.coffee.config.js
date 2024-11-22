module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      'resources/views/solid/css/solid.css',
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      fontFamily: {
        'Camel': ['Camel'],
        'IBMP':['IBM Plex Sans Arabic']
      },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            solid :'#092635',            
            solidsecondary :'#1B4242',            
            solidlight :'#5C8374', 
            secondarylight :'#EEF5FF',           
           
            primary: '#265073',
            secondary: '#2D9596',
            neutral: '#9AD0C2',
            light:'#F1FADA'
          },
      extend: {},
    },
    plugins: [
        require('flowbite/plugin')
    ],
  }