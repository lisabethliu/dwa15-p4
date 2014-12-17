'use strict';

angular.module('App').controller('NgCtrl',
    function ($scope, $http, $log) {
        $scope.qty = 1;
        $scope.hasBirthday = false;
        $scope.hasProfile = false;
        $scope.users = [];

        $scope.generate = function () {
        };
    });