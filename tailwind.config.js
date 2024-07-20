module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      fontFamily: {
        'Cairo': ['Cairo'],
        'ElMessiri':['El Messiri']
      },
      animation: {
        'bounce-slow': 'bounce 6s linear infinite',
        'wiggle': 'wiggle 6s ease-in-out infinite',

      }
      ,
      extend: {},
    },
    plugins: [
        require('flowbite/plugin')
    ],
  }