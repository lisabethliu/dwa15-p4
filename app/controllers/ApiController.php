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

    // This function is to generate user specified paragraphs of texts using the Lorem Ipsum module
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

            return Response::json(array('data' => $generator->getParagraphs($paragraphs)), 200);
        } else {
            return Response::make('Bad Request', 400);
        }
    }

    public function updateRepo(){

    }

    public function createRepo(){

    }

    public function deleteRepo(){

    }

    // This function is to generate user name(s), birthday(s) and profile(s) using Faker module.
    public function generateUser()
    {
        $qty = $this->setDefaultValue(Input::get('qty'), 1);
        $hasBirthday = $this->setDefaultValue(Input::get('hasBirthday'), false);
        $hasProfile = $this->setDefaultValue(Input::get('hasProfile'), false);

        $validator = Validator::make(array(
                'qty' => $qty,
                'hasBirthday' => $hasBirthday,
                'hasProfile' => $hasProfile
            ),
            array(
                'qty' => 'required|integer|min:1|max:99',
                'hasBirthday' => 'required|boolean',
                'hasProfile' => 'required|boolean'
            ));

        $faker = Faker\Factory::create();
        $users = array();
        while ($qty > 0) {
            $user = array('name' => $faker->name);
            if ($hasBirthday) {
                $user['birthday'] = $faker->dateTimeThisCentury->format('Y-m-d');
            }
            if ($hasProfile) {
                $user['profile'] = $faker->text();
            }

            array_push($users, $user);
            $qty--;
        }

        if ($validator->passes()) {
            return Response::json(array('data' => $users), 200);
        } else {
            return Response::make('Bad Request', 400);
        }
    }

}