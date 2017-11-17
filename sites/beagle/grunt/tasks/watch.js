/*Watch task*/

module.exports = {
  options: {
    livereload: true,
  },
  less: {
    files: [ 'src/less/**/*.less'],
    tasks: ['less:development','notify:less']
  },
  js: {
    files: [ 'src/js/app.js'],
    tasks: ['concat:dev','notify:js']
  }
};