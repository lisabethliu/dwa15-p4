@extends('layouts._master')

@section('javascript-modules')
<script src='{{ asset('js/controllers/ligCtrl.js') }}'></script>
@stop

@section('title')
Lorem Ipsum Generator
@stop

@section('content')
<div class='container-fluid' ng-controller='LigCtrl'>
  <form name='form' class='form-inline'>
      <div class='form-group' ng-class='{"has-error": form.paragraphs.$invalid, "has-success": form.paragraphs.$valid}'>
        <h3 class='control-label' for='paragraphs'>Number of Paragraphs (Max 99):</h3>
        <input type='number' name='paragraphs' class='form-control' placeholder='Input.....' ng-model='paragraphs'
          min='1' max='99' required style='width:200px'>
        <span class='error' ng-show='form.paragraphs.$invalid'>Input should be a valid number, range from 1 to 99.</span>
      </div>
      <div style='padding-top: 16px'>
        <button class='btn btn-lg btn-danger' ng-disabled='form.$invalid' ng-click='generate()'>Generate</button>
      </div>
  </form>
  <hr>
  <div ng-repeat='text in texts track by $index'>
    <div class='lead'><%text%></div>
  </div>
</div>
@stop