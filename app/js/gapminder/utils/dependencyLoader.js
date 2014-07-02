define([
    'jquery',
    'underscore',
    'gapminder/core/entity'
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
        load: function(dependencies) {
            var defer = $.Deferred();

            for (var i = 0; i < dependencies.length; i++) {
                dependencies[i] = this.basePath + dependencies[i];
            }

            require(dependencies, function() {
                defer.resolve.apply(defer, arguments);
            });
            
            return defer.promise();
        }
    });

    return DependencyLoader;
});