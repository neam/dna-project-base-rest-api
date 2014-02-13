// The wrapper function
module.exports = function(grunt) {
    // Project and task configuration
    grunt.initConfig({
        less: {
            dev: {
                files: {
                    "app/themes/frontend/assets/main.css": "app/themes/frontend/less/main.less"
                }
            }
        },
        watch: {
            styles: {
                files: [
                    'app/themes/frontend/less/**/*.less'
                ],
                tasks: ['less'],
                options: {
                    spawn: false
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
