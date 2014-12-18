<?php

class ApiController extends BaseController
{

  /*
  |--------------------------------------------------------------------------
  | Default Home Controller
  |--------------------------------------------------------------------------
  |
  | You may wish to use controllers instead of, or in addition to, Closure
  | based routes. That's great! Here is an example controller method to
  | get you started. To route to this controller, just add the route:
  |
  |	Route::get('/', 'HomeController@showWelcome');
  |
  */

  public function getRepo()
  {
    $id = Input::get('id');
    $validator = Validator::make(array(
      'id' => $id
    ),
      array(
        'id' => 'integer|min:1|max:99999'
      ));

    if ($validator->passes()) {

      return Response::json(array('data' => Repo::getAllRepo()), 200);
    } else {
      return Response::make('Bad Request', 400);
    }
  }

  public function updateRepo()
  {
    $id = Input::get('Id');
    $name = Input::get('Name');
    $description = Input::get('Description');
    $validator = Validator::make(array(
      'id' => $id,
      'name' => $name,
      'description' => $description
    ),
      array(
        'id' => 'required|integer|min:1|max:99999',
        'name' => 'required',
        'description' => 'required'
      ));

    if ($validator->passes()) {
      Repo::updateRepo($id, $name, $description);
      return Response::json(array('data' => Repo::getAllRepo()), 200);
    } else {
      return Response::make('Bad Request', 400);
    }
  }

  public function createRepo()
  {
    $name = Input::get('Name');
    $description = Input::get('Description');
    $validator = Validator::make(array(
      'name' => $name,
      'description' => $description
    ),
      array(
        'name' => 'required',
        'description' => 'required'
      ));

    if ($validator->passes()) {
      Repo::createRepo($name, $description);
      return Response::json(array('data' => Repo::getAllRepo()), 200);
    } else {
      return Response::make('Bad Request', 400);
    }
  }

  public function deleteRepo()
  {
    $id = Input::get('Id');
    $validator = Validator::make(array(
      'id' => $id
    ),
      array(
        'id' => 'required|integer|min:1|max:99999'
      ));

    if ($validator->passes()) {
      Repo::deleteRepo($id);
      return Response::json(array('data' => Repo::getAllRepo()), 200);
    } else {
      return Response::make('Bad Request', 400);
    }
  }

  public function getItem()
  {
    $repoId = Input::get('RepoId');
    $validator = Validator::make(array(
      'RepoId' => $repoId
    ),
      array(
        'RepoId' => 'integer|min:1|max:99999'
      ));

    if ($validator->passes()) {
      return Response::json(array('data' => Item::getItemsByRepoId($repoId)), 200);
    } else {
      return Response::make('Bad Request', 400);
    }
  }

  public function updateItem()
  {
    $id = Input::get('Id');
    $repoId = Input::get('RepoId');
    $name = Input::get('Name');
    $description = Input::get('Description');
    $validator = Validator::make(array(
      'id' => $id,
      'repoId' => $repoId,
      'name' => $name,
      'description' => $description
    ),
      array(
        'id' => 'required|integer|min:1|max:99999',
        'repoId' => 'integer|min:1|max:99999',
        'name' => 'required',
        'description' => 'required'
      ));

    if ($validator->passes()) {
      Item::updateItem($id, $name, $description);
      return Response::json(array('data' => Item::getItemsByRepoId($repoId)), 200);
    } else {
      return Response::make('Bad Request', 400);
    }
  }

  public function createItem()
  {
    $repoId = Input::get('RepoId');
    $name = Input::get('Name');
    $description = Input::get('Description');
    $validator = Validator::make(array(
      'repoId' => $repoId,
      'name' => $name,
      'description' => $description
    ),
      array(
        'repoId' => 'integer|min:0|max:99999',
        'name' => 'required',
        'description' => 'required'
      ));

    if ($validator->passes()) {
      Item::createItem($repoId, $name, $description);
      return Response::json(array('data' => Item::getItemsByRepoId($repoId)), 200);
    } else {
      return Response::make('Bad Request AA'.(string)$repoId.$name.$description, 400);
    }
  }

  public function deleteItem()
  {
    $id = Input::get('Id');
    $repoId = Input::get('RepoId');
    $validator = Validator::make(array(
      'id' => $id,
      'repoId' => $repoId,
    ),
      array(
        'id' => 'required|integer|min:1|max:99999',
        'repoId' => 'integer|min:1|max:99999'
      ));

    if ($validator->passes()) {
      Item::deleteItem($id);
      return Response::json(array('data' => Item::getItemsByRepoId($repoId)), 200);
    } else {
      return Response::make('Bad Request', 400);
    }
  }
}