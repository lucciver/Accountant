module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    concat: {
      dist: {
        src: ['assets/style/vendor/*.scss', 'assets/style/*.scss'],
        dest: 'style.min.css',
      }
    },

    sass: {
      dist: {
        options:{
          sourcemap: 'compressed',
          sourcemap: 'none'
        },
        files: {
          'style.min.css' : 'style.min.css'
        }
      }
    },

    autoprefixer:{
      options: {
        browsers: ['last 100 versions']
      },
      dist:{
        files:{
          'style.min.css':'style.min.css'
        }
      }
    },

    cssmin: {
      options: {

      },
      target: {
        files: {
          'style.min.css':'style.min.css'
        }
      }
    },

    uglify: {
      script: {
        files: {
          'script.min.js':['assets/script/vendor/*.js', 'assets/script/*.js']
        }
      }
    },

    watch: {
      css: {
        files: 'assets/style/*.scss',
        tasks: ['concat', 'sass', 'autoprefixer', 'cssmin']
      },
      script: {
        files: 'assets/script/*.js',
        tasks: ['uglify']
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-concat')
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.registerTask('default', ['watch']);
}
