@extends('layouts._master')

@section('javascript-modules')
@stop

@section('title')
Welcome to Developer's Best Friend
@stop

@section('content')
<div class='container-fluid'>
  <div class='well'>
    <fieldset>
      <h3>Lorem Ipsum Generator</h3>
      <p class='lead'>This generator generates random filler/gibberish text that contains some recognizable Latin that which has no real meaning when the words are placed together.  The resulting filler text is intended to be a temporary placeholder in place of relevant content.</p>
    </fieldset>
    <div>
      <div>
        <label>Create random filler text for your applications.</label>
      </div>
      <a class='btn btn-primary btn-lg' href='lorem-ipsum'>Click here to generate paragraphs of filler text</a>
    </div>
  </div>
  <div class='well'>
      <fieldset>
        <h3>Random User Generator</h3>
        <p class='lead'>This generator generates specified number of users.</p>
      </fieldset>
      <div>
        <div>
          <label>Create random user data for your applications. Like Lorem Ipsum, but for people.</label>
        </div>
        <a class='btn btn-primary btn-lg' href='user-generator'>Click here to generate users</a>
      </div>
    </div>
</div>
@stop