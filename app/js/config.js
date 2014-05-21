'use strict';

var Gapminder = Gapminder || {};

Gapminder.server = Gapminder.server || {};
Gapminder.server.baseUrl = Gapminder.server.baseUrl || '/';
Gapminder.server.translations = Gapminder.server.transltaions || {};

require.config({
    baseUrl: Gapminder.server.baseUrl + 'js',
    urlArgs: '_=' + Gapminder.server.cacheBuster,
    shim: {

    },
    paths: {
        app: 'gapminder/',
        underscore: 'lib/underscore/underscore',
        requirejs: 'lib/requirejs/require',
        backbone: 'lib/backbone/backbone',
        almond: 'lib/almond/almond'
    },
    config: {
        'app/core/App': {
            baseUrl: Gapminder.server.baseUrl,
            texts: Gapminder.server.translations || {}
        }
    }
});
