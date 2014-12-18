@extends('layouts._master')

@section('javascript-modules')
  <script src='{{ asset('js/controllers/repoCtrl.js') }}'></script>
@stop

@section('title')
  Welcome to Repo Management
@stop

@section('content')
  <div class='container-fluid'>
    <div class='well' ng-controller='RepoCtrl'>
      <fieldset>
        <h3>Welcome to Repo Management V1</h3> <button class='btn btn-xs btn-success' ng-click='new()'>New Repo</button>
      </fieldset>
      <div>
        <div>
          <table class='table table-striped table-bordered table-hover' ng-show='repos.length > 0'>
            <thead>
            <tr class='info'>
              <th style='width:5%'>Id</th>
              <th style='width:20%'>Name</th>
              <th style='width:35%'>Description</th>
              <th style='width:10%'>Items</th>
              <th style='width:10%'>Record Created Time</th>
              <th style='width:10%'>Last Updated Time</th>
              <th style='width:auto'>Operations</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat='repo in repos track by $index'>
              <td><%repo.Id%></td>
              <td><%repo.Name%></td>
              <td><%repo.Description%></td>
              <td><a href='item?repoId=<%repo.Id%>' target='_blank'>Items</a></td>
              <td> <%repo.created_at%></td>
              <td><%repo.updated_at%></td>
              <td><button class='btn btn-xs btn-primary' ng-click='update(repo)'>Update</button>&nbsp;<button class='btn btn-xs btn-danger' ng-click='delete(repo.Id)'>Delete</button></td>
            </tr>
            </tbody>
          </table>
        </div>
        <div ng-show='current'>
          <div class='row form-group'>
            <div class='pull-left' style='width:100px; padding-left: 20px'>
              <label>Id:</label>
            </div>
            <div class='col-xs-6'>
              <label ng-bind='current.Id'></label>
            </div>
          </div>
          <div class='row form-group'>
            <div class='pull-left' style='width:100px; padding-left: 20px'>
              <label>Name:</label>
            </div>
            <div class='col-xs-6'>
              <input type='text' ng-model='current.Name' class='input-xs form-control'>
            </div>
          </div>
          <div class='row form-group'>
            <div class='pull-left' style='width:100px; padding-left: 20px'>
              <label>Description:</label>
            </div>
            <div class='col-xs-6'>
              <textarea ng-model='current.Description' class='input-xs form-control'></textarea>
            </div>
          </div>
          <div class='row form-group'>
            <div class='pull-left' style='width:100px; padding-left: 20px'>
              <button class='btn btn-primary' ng-click='save()'>Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
