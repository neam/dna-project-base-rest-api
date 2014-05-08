define([
    'underscore',
    'backbone',
    'app/core/entity'
], function (_, Backbone, Entity) {
    'use strict';

    /**
     * @class app.core.Component
     * @extend app.core.Entity
     */
    var Component = Entity.extend({
        /**
         * @type {app.core.App}
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
         * @returns {app.core.Component}
         */
        getComponent: function (id) {
            return this.app.getComponent(id);
        }
    });

    return Component;
});