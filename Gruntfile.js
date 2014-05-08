'use strict';

module.exports = function(grunt) {
    // Load plugins
    require('load-grunt-tasks')(grunt);

    /**
     * Parses the given components path and returns a list with the main file for each bower dependency.
     * @param {string} componentsPath path to Bower components
     * @returns {Array} list of files
     */
    function findBowerMainFiles(componentsPath) {
        var files = [];

        fs.readdirSync(componentsPath).filter(function (file) {
            return fs.statSync(componentsPath + '/' + file).isDirectory();
        }).forEach(function (packageName) {
            var bowerJsonPath = componentsPath + '/' + packageName + '/bower.json';
            if (fs.existsSync(bowerJsonPath)) {
                var json = grunt.file.readJSON(bowerJsonPath);
                files.push(packageName + '/' + json.main);
            }
        });

        return files;

    }

    var path = require('path'),
        fs = require('fs'),
        bowerMainFiles = findBowerMainFiles(path.resolve(__dirname, 'bower_components'));

    /* jshint camelcase:false */
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        bower: {
            app: {
                rjsConfig: 'app/js/config.js',
                options: {
                    exclude: ['jquery']
                }
            }
        },
        clean: {
            scripts: 'www/js',
            build: 'build'
        },
        copy: {
            scripts: {
                files: [
                    {
                        expand: true,
                        cwd: 'app/js/',
                        src: ['**/*.js'],
                        dest: 'www/js',
                        filter: 'isFile'
                    },
                    {
                        expand: true,
                        cwd: 'bower_components/',
                        src: bowerMainFiles,
                        dest: 'www/js/lib',
                        filter: 'isFile'
                    }
                ]
            },
            build: {
                files: [
                    {
                        expand: true,
                        cwd: 'app/js/',
                        src: ['**/*.js'],
                        dest: 'build',
                        filter: 'isFile'
                    },
                    {
                        expand: true,
                        cwd: 'bower_components/',
                        src: bowerMainFiles,
                        dest: 'build/lib',
                        filter: 'isFile'
                    }
                ]
            }
        },
        kss: {
            options: {
                includeType: 'less',
                includePath: 'app/themes/gapminder/less/main.less'
            },
            dist: {
                files: {
                    'www/styleguide': ['app/themes/gapminder/less']
                }
            }
        },
        less: {
            theme: {
                files: {
                    'app/themes/gapminder/assets/main.css': 'app/themes/gapminder/less/main.less'
                }
            }
        },
        less_imports: {
            options: {
                inlineCSS: false
            },
            dist: {
                dest: 'app/themes/gapminder/less/app.less',
                src: [
                    'app/themes/gapminder/less/layouts/**/*.less',
                    'app/themes/gapminder/less/partials/**/*.less',
                    'app/themes/gapminder/less/controllers/**/*.less',
                    'app/themes/gapminder/less/widgets/**/*.less'
                ]
            }
        },
        jshint: {
            app: ['app/js/**/*.js'],
            gruntFile: ['Gruntfile.js'],
            options: {
                'curly': true,
                'eqeqeq': true,
                'eqnull': true,
                'expr': true,
                'latedef': true,
                'onevar': true,
                'noarg': true,
                'node': true,
                'trailing': true,
                'undef': true,
                'unused': true,
                'camelcase': true,
                'indent': 4,
                'predef': ['document', 'define']
            }
        },
        requirejs: {
            app: {
                options: {
                    appDir: 'build/',
                    baseUrl: './',
                    optimize: 'uglify2',
                    name: 'lib/almond/almond',
                    dir: 'www/js'
                }
            }
        },
        watch: {
            styles: {
                files: ['app/themes/gapminder/less/**/*.less'],
                tasks: ['less', 'lessImports', 'kss'],
                options: {
                    spawn: false
                }
            },
            scripts: {
                files: [
                    'app/js/**/*.js'
                ],
                tasks: ['jshint:app', 'copy:scripts'],
                options: {
                    livereload: 35730,
                    spawn: false
                }
            }
        }
    });

    // Define tasks
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('init', 'Initializes the project.', function () {
        grunt.task.run('bower');
    });
    grunt.registerTask('build', ['copy:build', 'requirejs', 'clean:build']);
};
