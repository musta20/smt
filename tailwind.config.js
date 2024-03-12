module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      fontFamily: {
        'Camel': ['Camel'],
        'ElMessiri':['El Messiri']
      },
      extend: {},
    },
    plugins: [
        require('flowbite/plugin')
    ],
  }