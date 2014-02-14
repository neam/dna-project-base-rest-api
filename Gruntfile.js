// The wrapper function
module.exports = function(grunt) {

    // Load plugins
    require('load-grunt-tasks')(grunt);


    // Project and task configuration
    grunt.initConfig({
        less: {
            theme: {
                files: {
                    "app/themes/gapminder/assets/main.css": "app/themes/gapminder/less/main.less"
                }
            }
        },
        watch: {
            styles: {
                files: ['app/themes/gapminder/less/**/*.less' ],
                tasks: ['less'],
                options: {
                    spawn: false
                }
            }
        }
    });

    // Define tasks
    grunt.registerTask('default', []);
};
