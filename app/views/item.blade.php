@extends('layouts._master')

@section('javascript-modules')
<script src='{{ asset('js/controllers/itemCtrl.js') }}'></script>
@stop

@section('title')
Item Management
@stop

@section('content')
<div class='container-fluid'>
  <div class='well' ng-controller='ItemCtrl'>
    <fieldset>
      <h3>All Items in Selected Repo</h3> <button class='btn btn-xs btn-success' ng-click='new()'>New Item</button>
    </fieldset>
    <div>
      <div>
        <table class='table table-striped table-bordered table-hover' ng-show='items.length > 0'>
          <thead>
          <tr class='info'>
            <th style='width:5%'>Id</th>
            <th style='width:20%'>Name</th>
            <th style='width:45%'>Description</th>
            <th style='width:10%'>Last Created Time</th>
            <th style='width:10%'>Last Updated Time</th>
            <th style='width:auto'>Operations</th>
          </tr>
          </thead>
          <tbody>
          <tr ng-repeat='item in items track by $index'>
            <td><%item.Id%></td>
            <td><%item.Name%></td>
            <td><%item.Description%></td>
            <td><%item.created_at%></td>
            <td><%item.updated_at%></td>
            <td><button class='btn btn-xs btn-primary' ng-click='update(item)'>Update</button>&nbsp;<button class='btn btn-xs btn-danger' ng-click='delete(item.Id)'>Delete</button></td>
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