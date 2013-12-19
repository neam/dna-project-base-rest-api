// The wrapper function
module.exports = function(grunt) {
    // Project and task configuration
    grunt.initConfig({
        less: {
            dev: {
                files: {
                    "app/themes/frontend/assets/main.css": "app/themes/frontend/less/main.less",
                    "app/themes/backend2/css/main.css": "app/themes/backend2/less/main.less"
                }
            }
        },
        watch: {
            styles: {
                files: [
                    'app/themes/frontend/less/**/*.less',
                    'app/themes/backend2/less/**/*.less'
                ],
                tasks: ['less'],
                options: {
                    nospawn: true
                }
            }
        }
    });

    // Load plugins
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Define tasks
    grunt.registerTask('default', ['watch']);
};
