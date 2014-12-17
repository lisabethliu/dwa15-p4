'use strict';

angular.module('App').controller('RepoCtrl',
    function ($scope, $http, $log) {
        $scope.paragraphs = 1;
        $scope.texts = [];

        $scope.generate = function () {
            $log.info($scope.paragraphs);
            $http({
                method: 'GET',
                url: 'api/lig?paragraphs=' + $scope.paragraphs,
                headers: {
                    'Content-Type': 'application/json; charset=utf-8'
                }
            })
                .success(function (data) {
                    $log.debug(data);
                    $scope.texts = data.data;
                })
                .error(function (error, status) {
                    $log.debug(error, status);
                    alert(error);
                });
        };
    });