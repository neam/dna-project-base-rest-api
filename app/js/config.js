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
        underscore: '../../bower_components/underscore/underscore',
        requirejs: '../../bower_components/requirejs/require',
        backbone: '../../bower_components/backbone/backbone',
        almond: '../../bower_components/almond/almond'
    },
    config: {
        'app/core/App': {
            baseUrl: Gapminder.server.baseUrl,
            texts: Gapminder.server.translations || {}
        }
    }
});
