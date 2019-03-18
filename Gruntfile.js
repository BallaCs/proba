module.exports = function(grunt) {

    grunt.initConfig({
        concat: {
            js: {
                src: ['assets/js/main.js'],
                dest: 'build/js/main.js'
            },
            css: {
                src: ['assets/scss/bootstrap/bootstrap.css'],
                dest: 'style.css'
            }
        },
        uglify: {
            js:{
                options: {
                    mangle: false
                },
                files:{
                    'main.js':[ 'build/js/main.js']
                }
            }
        },
        sass:{
            stylecss:{
                options:{
                    style: 'compressed',
                    check: false,
                },
                files:{
                    'style.css': 'assets/scss/style.scss'
                }
            }
        },
        watch: {
            options:{
                livereload: true
            },
            js:{
                files: ['assets/js/*.js'],
                tasks: ['concat:js', 'uglify:js']
            },
            css:{
                files: ['assets/scss/**/*.scss'],
                tasks: ['sass']
            }
        }
    })



    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify-es');
    grunt.loadNpmTasks('grunt-contrib-sass');

    grunt.registerTask('default', ['sass', 'concat', 'uglify', 'watch']);

};