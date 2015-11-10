module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        /**
         * browserSync
         */
        browserSync: {
            bsFiles: {
                src: 'css/build/*.css'
            },
            options: {
                watchTask: true,
                server: {
                    baseDir: "./"
                }
            }
        },

        /**
         * watch
         */
        watch: {
            scripts: {
                files: ['css/sass/*.scss'],
                tasks: ['sass'],
                options: {
                    spawn: false,
                    livereload: true
                },
            }
        },

        /**
         * sass
         */
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'css/build/style.css': 'css/sass/main.scss'
                },
            }
        }


    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    //grunt.loadNpmTasks('grunt-browser-sync');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    //grunt.registerTask('default', ['sass', 'browserSync', 'watch',]);
    grunt.registerTask('default', ['sass', 'watch']);

};
