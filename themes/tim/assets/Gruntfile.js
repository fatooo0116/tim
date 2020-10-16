module.exports = function(grunt) {


// require('load-grunt-tasks')(grunt);



 
grunt.initConfig({
    sass: {
        dist: {
            files: {
                'dist/css/main.css': 'sass/style.scss'
            }
        }
    },
    watch: {
        scripts: {
          files: ['sass/style.scss','sass/*.scss','sass/tpl/*.scss','sass/page/*.scss','sass/vc/*.scss'],
          tasks: ['sass'],
          options: {
          //  event: ['added', 'deleted'],
          },
        },
      },
});


grunt.loadNpmTasks('grunt-contrib-watch');
grunt.loadNpmTasks('grunt-contrib-sass');


grunt.registerTask('default', ['sass','watch']);

};