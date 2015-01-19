<?php

class Employees extends Controller {

    public function index($limit = 10) {
        //load model

        $user = $this->loadModel('UserModel');
        if (!$user->isLoggedIn()) {
            Session::flash('errors', '<p>You need to login to continue.</p>');
            Redirect::to(URL . 'account/login');
        } else {
            $model = $this->loadModel('UserModel');
            $users = $model->getAllEmployees($limit);

            $this->view('employees/index', (object) array(
                        'users' => (object) $users
            ));
        }
    }

    public function search() {
        //load model

        $user = $this->loadModel('UserModel');
        if (!$user->isLoggedIn()) {
            Session::flash('errors', '<p>You need to login to continue.</p>');
            Redirect::to(URL . 'account/login');
        } else {
            if (Input::exists()) {
                $model = $this->loadModel('UserModel');

                $users = $model->getUserModelsByCompany(
                        Input::escape(Input::get('Firstname')), 
                        Input::escape(Input::get('Lastname'))
                );

                $this->view('employees/search', (object) array(
                            'users' => (object) $users
                ));
            }
        }
    }

}
