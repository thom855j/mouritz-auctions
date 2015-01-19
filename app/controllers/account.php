<?php

class Account extends Controller {

    public function index() {
        // loadModel model
        $user = $this->loadModel('UserModel');
        $errors[] = Session::flash('errors');
        // errors feedback
        if (!$user->isLoggedIn()) {
            Session::flash('errors', '<p>You need to login to continue.</p>');
            Redirect::to(URL . 'account/login');
        } else {
            // loadModel views
            $this->view('account/index', (object) array(
                        'user' => $user,
                        'errors' => $errors
            ));
        }
    }

    public function register() {
        // loadModel model
        $user = $this->loadModel('UserModel');

        if ($user->isLoggedIn()) {
            Session::flash('errors', '<p>You are already logged in!</p>');
            Redirect::to(URL . 'account');
        } else {
            // errors feedback
            $errors = Session::flash('errors');
            $input = Session::flash('input');
            // loadModel view
            $this->view('account/register', (object) array(
                        'errors' => (object) $errors,
                        'input' => (object) $input
            ));
        }
    }

    public function login() {
        $user = $this->loadModel('UserModel');
        if ($user->isLoggedIn()) {
            Session::flash('errors', '<p>You are already logged in!</p>');
            Redirect::to(URL . 'account');
        } else {
            $errors = Session::flash('errors');

            // loadModel views
            $this->view('account/login', (object) array(
                        'errors' => (object) $errors
            ));
        }
    }

    public function profile() {
        $user = $this->loadModel('UserModel');
        if (!$user->isLoggedIn()) {
            Redirect::to(URL . 'account/login');
        } else {
            $errors = Session::flash('errors');
            $this->view('account/profile', (object) array(
                        'user' => (object) $user,
                        'errors' => (object) $errors
            ));
        }
    }

    public function settings() {
        $user = $this->loadModel('UserModel');
        if (!$user->isLoggedIn()) {
            Redirect::to(URL . 'account/login');
        } else {
            $errors = Session::flash('errors');
            $this->view('account/settings', (object) array(
                        'user' => (object) $user,
                        'errors' => (object) $errors
            ));
        }
    }

    public function change() {
        $user = $this->loadModel('UserModel');
        if (!$user->isLoggedIn()) {
            Redirect::to(URL . 'account/login');
        } else {
            $errors = Session::flash('errors');
            $this->view('account/change', (object) array(
                        'errors' => (object) $errors,
                        'user' => (object) $user
            ));
        }
    }

    public function uploadModels($limit = 2147483647) {
        // loadModel model
        $user = $this->loadModel('UserModel');
        // errors feedback
        if (!$user->isLoggedIn()) {
            Session::flash('errors', '<p>You need to login to continue.</p>');
            Redirect::to(URL . 'account/login');
        } else {
            // errors feedback
            $errors = Session::flash('errors');
            $input = Session::flash('input');

            $ID = $user->data()->ID;
            $Company_ID = $user->data()->Company_ID;
            $uploadModel_model = $this->loadModel('UploadModel');
            $uploadModels = $uploadModel_model->getUploadModelsByUserModel($ID, $limit);
            
            $album_model = $this->loadModel('Album');
            $albums = $album_model->getAllAlbumsByCompany($Company_ID, $limit);
            
            $type_model = $this->loadModel('Type');
            $types = $type_model->getTypes($Company_ID, $limit);
        }
        // loadModel view
        $this->view('account/uploadModels', (object) array(
                    'errors' => (object) $errors,
                    'input' => (object) $input,
                    'uploadModels' => (object) $uploadModels,
                    'albums' => (object) $albums,
                    'types' => (object) $types
        ));
    }

}
