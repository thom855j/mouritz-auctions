<?php

class Account extends Controller {

    public function index() {
//check for cookies
        if (Cookie::exists(COOKIE_NAME) && !Session::exists(SESSION_NAME)) {
            $hash = Cookie::get(COOKIE_NAME);
            $hashCheck = DB::getInstance()->get(SESSION_TABLE, array(SESSION_HASH, '=', $hash));

            if ($hashCheck->count()) {
                $ID = USER_ID;
                $user = $this->load('UserModel', $hashCheck->first()->$ID);
                $user->login();
            }
        } else {

            // loadModel model
            $user = $this->loadModel('UserModel');
            $feedback[] = Session::flash('feedback');
            // feedback feedback
            if ($user->isLoggedIn()) {
                // loadModel views
                $this->view('account/index', (object) array(
                            'user' => $user,
                            'feedback' => $feedback
                ));
            } else {
                Session::flash('feedback', '<p style="color: red;">You need to login to continue!</p>');
                Redirect::to(URL . 'login');
            }
        }
    }

    public function create($params) {
        $this->view('account/create/' . $params);
    }

    public function profile() {
        $user = $this->loadModel('UserModel');
        if ($user->isLoggedIn()) {

            $feedback = Session::flash('feedback');
            $this->view('account/profile', (object) array(
                        'user' => (object) $user,
                        'feedback' => (object) $feedback
            ));
        } else {
            Session::flash('feedback', '<p style="color: red;">You need to login to continue.</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function settings() {
        $user = $this->loadModel('UserModel');
        if ($user->isLoggedIn()) {
            Redirect::to(URL . 'account/login');
            $feedback = Session::flash('feedback');
            $this->view('account/settings', (object) array(
                        'user' => (object) $user,
                        'feedback' => (object) $feedback
            ));
        } else {
            Session::flash('feedback', '<p style="color: red;">You need to login to continue.</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function change() {
        $user = $this->loadModel('UserModel');
        if ($user->isLoggedIn()) {

            $feedback = Session::flash('feedback');
            $this->view('account/change', (object) array(
                        'feedback' => (object) $feedback,
                        'user' => (object) $user
            ));
        } else {
            Session::flash('feedback', '<p style="color: red;">You need to login to continue.</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function logout() {
        $model = $this->loadModel('UserModel');
        $user = $model->logout();
        Session::flash('feedback', '<p>You have been logged out!</p>');
        Redirect::to(URL . 'login');
    }

}
