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
        less_imports: {
            options: {
                inlineCSS: false
            },
            dist: {
                dest: 'app/themes/gapminder/less/imports.less',
                src: [
                    'app/themes/gapminder/less/layouts/**/*.less',
                    'app/themes/gapminder/less/controllers/**/*.less',
                    'app/themes/gapminder/less/widgets/**/*.less'
                ]
            }
        },
        watch: {
            styles: {
                files: ['app/themes/gapminder/less/**/*.less'],
                tasks: ['less', 'less_imports', 'kss'],
                options: {
                    spawn: false
                }
            }
        }
    });

    // Load plugins
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-less-imports');

    // Define tasks
    grunt.registerTask('default', []);
};
