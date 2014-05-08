define([
    'jquery',
    'underscore',
    'app/core/Entity'
], function($, _, Entity) {
    'use strict';

    /**
     * @class app.utils.DependencyLoader
     * @extends app.core.Entity
     */
    var DependencyLoader = Entity.extend({
        /**
         * @type {string}
         */
        basePath: '/',

        /**
         * Loads the given dependencies.
         * @returns {*}
         */
        load: function() {
            var deps = Array.prototype.slice.call(arguments),
                dfd = $.Deferred();
            for (var i = 0, len = deps.length; i < len; i++) {
                deps[i] = this.basePath + deps[i];
            }
            require(deps, function() {
                dfd.resolve.apply(dfd, arguments);
            });
            return dfd.promise();
        }
    });

    return DependencyLoader;
});