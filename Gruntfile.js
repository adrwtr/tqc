module.exports = function(grunt) {
    grunt.loadNpmTasks('grunt-express-server');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.initConfig({
        express: {
            options: {
                port: 3001
            },
            dev: {
                options: {
                    script: 'index.js'
                }
            }
        },

        watch: {
            express: {
                files:  [
                    'index.js',
                    'src/*.js',
                    'public/views/*.html',
                    'public/js/*.js',
                ],
                tasks:  [ 'express:dev' ],
                options: {
                    spawn: false
                }
            }
        }
    });


    grunt.registerTask('server', [ 'express:dev', 'watch' ]);
};