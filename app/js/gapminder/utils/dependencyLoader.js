define([
    'jquery',
    'underscore',
    'gapminder/core/Entity'
], function($, _, Entity) {
    'use strict';

    /**
     * @class gapminder.utils.DependencyLoader
     * @extends gapminder.core.Entity
     */
    var DependencyLoader = Entity.extend({
        /**
         * @type {string}
         */
        basePath: '/',

        /**
         * Loads a set of dependencies using require().
         * @returns {*}
         */
        load: function() {
            var dependencies = Array.prototype.slice.call(arguments),
                dfd = $.Deferred();
            
            for (var i = 0; i < dependencies.length; i++) {
                dependencies[i] = this.basePath + dependencies[i];
            }
            
            require(dependencies, function() {
                dfd.resolve.apply(dfd, arguments);
            });
            
            return dfd.promise();
        }
    });

    return DependencyLoader;
});