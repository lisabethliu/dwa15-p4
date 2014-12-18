'use strict';

angular.module('App').controller('RepoCtrl',
  function ($scope, $http, $log) {
    $scope.repos = [];
    $scope.current = undefined;

    $http({
      method: 'GET',
      url: 'api/repo',
      headers: {
        'Content-Type': 'application/json; charset=utf-8'
      }
    })
      .success(function (data) {
        $log.debug(data);
        $scope.repos = data.data;
      })
      .error(function (error, status) {
        $log.debug(error, status);
        alert(error);
      });

    $scope.update = function (repo) {
      $scope.current = repo;
    };

    $scope.delete = function (id) {
      if (confirm('delete?') == true) {
        $http({
          method: 'DELETE',
          url: 'api/repo',
          data: {
            Id: id
          },
          headers: {
            'Content-Type': 'application/json; charset=utf-8'
          }
        })
          .success(function (data) {
            alert('delete successfully.');
            $scope.repos = data.data;
          })
          .error(function (error) {
            alert(error);
          });
      }
    };

    $scope.new = function () {
      $scope.current = {};
    };

    $scope.save = function () {
      if ($scope.current.Id) {
        $http({
          method: 'PUT',
          url: 'api/repo',
          data: $scope.current,
          headers: {
            'Content-Type': 'application/json; charset=utf-8'
          }
        })
          .success(function (data) {
            alert('update successfully.');
            $scope.repos = data.data;
          })
          .error(function (error) {
            alert(error);
          });
      } else {
        $http({
          method: 'POST',
          url: 'api/repo',
          data: $scope.current,
          headers: {
            'Content-Type': 'application/json; charset=utf-8'
          }
        })
          .success(function (data) {
            alert('create successfully.');
            $scope.repos = data.data;
          })
          .error(function (error) {
            alert(error);
          });
      }
    };
  });