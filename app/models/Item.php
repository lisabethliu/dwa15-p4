<?php

class Item extends Eloquent
{

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'item';

  protected $fillable = array('Name', 'Description', 'RepoId');

  public static function getItemsByRepoId($repoId)
  {
    return Item::where('RepoId', '=', $repoId)->get();
  }

  public static function updateItem($id, $name, $description)
  {
    Item::where('Id', '=', $id)->update(array('Name' => $name, 'Description' => $description));
  }

  public static function createItem($repoId, $name, $description)
  {
    Item::create(array('RepoId' => $repoId, 'Name' => $name, 'Description' => $description));
  }

  public static function deleteItem($id)
  {
    Item::where('Id', '=', $id)->delete();
  }
}