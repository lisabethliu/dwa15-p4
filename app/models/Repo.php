<?php

class Repo extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'repo';

    protected $fillable = array('Name', 'Description');

    /**
    * Searches and returns any books added in the last 24 hours
    *
    * @return Collection
    */
    public static function getAllRepo() {

        return Repo::all();

    }


    /**
     * @param $id
     * @param $name
     * @param $description
     */
    public static function updateRepo($id, $name, $description) {
        Repo::where('Id', '=', $id)->update(array('Name' => $name, 'Description' => $description));
    }

    /**
     * @param $name
     * @param $description
     */
    public static function createRepo($name, $description) {
        Repo::create(array('Name' => $name, 'Description' => $description));
    }

    /**
     * @param $id
     */
    public static function deleteRepo($id) {
        Repo::where('Id', '=', $id)->delete();
    }
}