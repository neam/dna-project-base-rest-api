define([
    'underscore',
    'backbone',
    'gapminder/core/entity'
], function (_, Backbone, Entity) {
    'use strict';

    /**
     * @class gapminder.core.Component
     * @extend gapminder.core.Entity
     */
    var Component = Entity.extend({
        /**
         * @type {gapminder.core.App}
         */
        app: null,
        
        /**
         * @inheritDoc
         */
        initialize: function () {
            if (!this.app) {
                throw new Error('Component.app must be set.');    
            }
        },
        
        /**
         * Returns a specific application component based on the given identifier.
         * @param {string} id component identifier
         * @returns {gapminder.core.Component}
         */
        getComponent: function (id) {
            return this.app.getComponent(id);
        }
    });

    return Component;
});