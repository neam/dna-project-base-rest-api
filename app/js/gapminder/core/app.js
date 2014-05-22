define([
    'module',
    'jquery',
    'underscore',
    'backbone',
    'gapminder/core/Entity',
    'gapminder/utils/dependencyLoader',
    'gapminder/components/imageManager',
    'gapminder/components/urlManager',
    'gapminder/components/viewManager'
], function (module, $, _, Backbone, Entity, DependencyLoader, ImageManager, UrlManager, ViewManager) {
    'use strict';
    
    /**
     * @class gapminder.core.App
     * @extends gapminder.core.Entity
     */
    var App = Entity.extend({
        /**
         * @type {Object<string, *>}
         */
        config: null,
        
        /**
         * @type {Object<string, gapminder.core.Component>}
         */
        components: null,
        
        /**
         * Constructor.
         */
        constructor: function () {
            this.config = $('html').data('config') || {};

            this.components = {
                imageManager: new ImageManager({
                    app: this,
                    baseUrl: 'images/'
                }),
                urlManager: new UrlManager({
                    app: this
                }),
                viewManager: new ViewManager({
                    app: this,
                    loader: new DependencyLoader({basePath: 'gapminder/views/'})
                })
            };
        },
        
        /**
         * Initializes the application.
         */
        initialize: function () {
            this.initializeViews();

            this.getComponent('imageManager').loadImages(['ccmini.png', 'ccregular.png', 'ccslim.png'])
                .done(function(images) {
                    console.info('Images loaded');
                    console.debug('images:', images);
                })
                .fail(function () {
                    console.log('Error occurred!');
                });

            console.info('Application initialized');
        },
        
        /**
         * Initializes views within a specific DOM element.
         * @param {string} selector element CSS selector
         * @param {Object<string, *>} args view options
         * @param {Function} cb optional callback function to call when the view is loaded.
         */
        initializeViews: function (selector, args, cb) {
            selector = selector || document;
            args = args || {};
            cb = cb || function () {};
            
            var views = [];
            
            $(selector).find('[data-view]').each(function (index, element) {
                views.push({
                    name: $(element).data('view'),
                    options: _.extend({el: element}, args)
                });
            });

            this.getComponent('viewManager')
                .createViews(views)
                .then(cb);
        },
        
        /**
         * Returns a specific application component based on the given identifier.
         * @param {string} id component identifier
         * @returns {gapminder.core.Component}
         */
        getComponent: function (id) {
            return this.components[id];
        }
    });
    
    return App;
});