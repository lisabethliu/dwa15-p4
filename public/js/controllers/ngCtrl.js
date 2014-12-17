'use strict';

angular.module('App').controller('NgCtrl',
    function ($scope, $http, $log) {
        $scope.qty = 1;
        $scope.hasBirthday = false;
        $scope.hasProfile = false;
        $scope.users = [];

        $scope.generate = function () {
            $log.debug($scope.qty, $scope.hasBirthday, $scope.hasProfile);

            $http({
                method: 'GET',
                url: 'api/ug?qty=' + $scope.qty + '&hasBirthday=' + ($scope.hasBirthday ? '1' : '0') + '&hasProfile=' + ($scope.hasProfile ? '1' : '0'),
                headers: {
                    'Content-Type': 'application/json; charset=utf-8'
                }
            })
                .success(function (data) {
                    $log.debug(data);
                    $scope.users = data.data;
                })
                .error(function (error, status) {
                    $log.debug(error, status);
                    alert(error);
                });
        };
    });