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
            return fs.statSync(path.join(componentsPath, file)).isDirectory();
        }).forEach(function (packageName) {
            var bowerJsonPath = path.join(componentsPath, packageName, 'bower.json');
            if (fs.existsSync(bowerJsonPath)) {
                var json = grunt.file.readJSON(bowerJsonPath);
                files.push(path.join(packageName, json.main));
            }
        });

        return files;
    }

    /**
     * Finds the amd modules within a specific path (not recrusively) and builds a list of includes for r.js.
     * @param {string} modulePath path to look in
     * @param {string} moduleNamespace module namespace to use for includes
     * @returns {Array} list of includes
     */
    function findModuleIncludes(modulePath, moduleNamespace) {
        var includes = [];

        fs.readdirSync(modulePath).filter(function (file) {
            return fs.statSync(path.join(modulePath, file)).isFile();
        }).forEach(function (scriptFile) {
            includes.push(moduleNamespace + '/' + scriptFile.replace(/.js$/g, ''));
        });

        return includes;
    }

    var path = require('path'),
        fs = require('fs'),
        bowerMainFiles = findBowerMainFiles(path.resolve(__dirname, 'bower_components'));

    /* jshint camelcase:false */
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        bower: {
            app: {
                rjsConfig: 'app/js/config.js'
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
                includePath: 'vendor/neam/yii-simplicity-theme/less/main.less'
            },
            dist: {
                files: {
                    'www/styleguide': ['vendor/neam/yii-simplicity-theme/less']
                }
            }
        },
        less: {
            theme: {
                files: {
                    'vendor/neam/yii-simplicity-theme/assets/main.css': 'vendor/neam/yii-simplicity-theme/less/main.less'
                }
            }
        },
        less_imports: {
            options: {
                inlineCSS: false
            },
            dist: {
                dest: 'vendor/neam/yii-simplicity-theme/less/app.less',
                src: [
                    'vendor/neam/yii-simplicity-theme/less/mixins/**/*.less',
                    'vendor/neam/yii-simplicity-theme/less/layouts/**/*.less',
                    'vendor/neam/yii-simplicity-theme/less/partials/**/*.less',
                    'vendor/neam/yii-simplicity-theme/less/common/**/*.less',
                    'vendor/neam/yii-simplicity-theme/less/controllers/**/*.less',
                    'vendor/neam/yii-simplicity-theme/less/widgets/**/*.less',
                    'vendor/neam/yii-simplicity-theme/less/responsive/**/*.less'
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
                'predef': ['document', 'define', 'Image']
            }
        },
        requirejs: {
            app: {
                options: {
                    mainConfigFile: 'build/config.js',
                    baseUrl: './',
                    appDir: 'build/',
                    dir: 'www/js',
                    optimize: 'uglify2',
                    modules: [
                        {
                            name: 'main',
                            include: findModuleIncludes(path.resolve(__dirname, 'app/js/gapminder/views'), 'gapminder/views'),
                            exclude: ['jquery', 'backbone', 'underscore']
                        }
                    ],
                    removeCombined: true,
                    useStrict: true
                }
            }
        },
        watch: {
            styles: {
                files: ['vendor/neam/yii-simplicity-theme/less/**/*.less'],
                tasks: ['less', 'less_imports'],
                options: {
                    spawn: false
                }
            },
            scripts: {
                files: [
                    'app/js/**/*.js',
                    'Gruntfile.js'
                ],
                tasks: ['jshint', 'copy:scripts'],
                options: {
                    livereload: 35730,
                    spawn: false
                }
            }
        }
    });

    // Define tasks
    grunt.registerTask('default', ['less', 'less_imports', 'watch']);
    grunt.registerTask('createRjsConfig', ['bower']);
    grunt.registerTask('copyScripts', ['clean:scripts', 'copy:scripts']);
    grunt.registerTask('build', ['copy:build', 'clean:scripts', 'requirejs', 'clean:build']);
};
