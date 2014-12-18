'use strict';

angular.module('App').controller('ItemCtrl',
  function ($scope, $http, $log, $location) {
    var repoId = parseInt($location.search().repoId);
    $scope.items = [];
    $scope.current = undefined;

    $http({
      method: 'GET',
      url: 'api/item?RepoId=' + repoId,
      headers: {
        'Content-Type': 'application/json; charset=utf-8'
      }
    })
      .success(function (data) {
        $scope.items = data.data;
      })
      .error(function (error) {
        alert(error);
      });

    $scope.update = function (repo) {
      $scope.current = repo;
    };

    $scope.delete = function (id) {
      if (confirm('delete?') == true) {
        $http({
          method: 'DELETE',
          url: 'api/item',
          data: {
            Id: id,
            RepoId: repoId
          },
          headers: {
            'Content-Type': 'application/json; charset=utf-8'
          }
        })
          .success(function (data) {
            alert('delete successfully.');
            $scope.items = data.data;
          })
          .error(function (error) {
            alert(error);
          });
      }
    };

    $scope.new = function () {
      $scope.current = {
        RepoId: repoId
      };
    };

    $scope.save = function () {
      if ($scope.current.Id) {
        $http({
          method: 'PUT',
          url: 'api/item',
          data: $scope.current,
          headers: {
            'Content-Type': 'application/json; charset=utf-8'
          }
        })
          .success(function (data) {
            alert('update successfully.');
            $scope.items = data.data;
          })
          .error(function (error) {
            alert(error);
          });
      } else {
        $http({
          method: 'POST',
          url: 'api/item',
          data: $scope.current,
          headers: {
            'Content-Type': 'application/json; charset=utf-8'
          }
        })
          .success(function (data) {
            alert('create successfully.');
            $scope.items = data.data;
          })
          .error(function (error) {
            alert(error);
          });
      }
    };
  });