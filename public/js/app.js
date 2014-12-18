'use strict';

angular.module('App', ['ui.bootstrap'], function($interpolateProvider, $locationProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
    $locationProvider.html5Mode(true);
})
    .value('version', '0.1');
