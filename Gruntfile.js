module.exports = function(grunt) {
    // Load plugins
    require('load-grunt-tasks')(grunt);

    // Project and task configuration
    grunt.initConfig({
        kss: {
            options: {
                includeType: 'less',
                includePath: 'app/themes/gapminder/less/theme/main.less'
            },
            dist: {
                files: {
                    'www/styleguide': ['app/themes/gapminder/less/theme']
                }
            }
        },
        less: {
            theme: {
                files: {
                    "app/themes/gapminder/assets/main.css": "app/themes/gapminder/less/main.less"
                }
            }
        },
        watch: {
            styles: {
                files: ['app/themes/gapminder/less/**/*.less'],
                tasks: ['less', 'kss'],
                options: {
                    spawn: false
                }
            }
        }
    });

    // Load plugins
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Define tasks
    grunt.registerTask('default', []);
};
