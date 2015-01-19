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
        }
        
        // loadModel model
        $user = $this->loadModel('UserModel');
        $feedback[] = Session::flash('feedback');
        // feedback feedback
        if (!$user->isLoggedIn()) {
            Session::flash('feedback', '<p>You need to login to continue.</p>');
            Redirect::to(URL . 'account/login');
        } else {
            // loadModel views
            $this->view('account/index', (object) array(
                        'user' => $user,
                        'feedback' => $feedback
            ));
        }
    }

    public function register() {
        // loadModel model
        $user = $this->loadModel('UserModel');

        if ($user->isLoggedIn()) {
            Session::flash('feedback', '<p>You are already logged in!</p>');
            Redirect::to(URL . 'account');
        } else {
            // feedback feedback
            $feedback = Session::flash('feedback');
            $input = Session::flash('input');
            // loadModel view
            $this->view('register', (object) array(
                        'feedback' => (object) $feedback,
                        'input' => (object) $input
            ));
        }
    }


    public function profile() {
        $user = $this->loadModel('UserModel');
        if (!$user->isLoggedIn()) {
            Redirect::to(URL . 'account/login');
        } else {
            $feedback = Session::flash('feedback');
            $this->view('account/profile', (object) array(
                        'user' => (object) $user,
                        'feedback' => (object) $feedback
            ));
        }
    }

    public function settings() {
        $user = $this->loadModel('UserModel');
        if (!$user->isLoggedIn()) {
            Redirect::to(URL . 'account/login');
        } else {
            $feedback = Session::flash('feedback');
            $this->view('account/settings', (object) array(
                        'user' => (object) $user,
                        'feedback' => (object) $feedback
            ));
        }
    }

    public function change() {
        $user = $this->loadModel('UserModel');
        if (!$user->isLoggedIn()) {
            Redirect::to(URL . 'login');
        } else {
            $feedback = Session::flash('feedback');
            $this->view('account/change', (object) array(
                        'feedback' => (object) $feedback,
                        'user' => (object) $user
            ));
        }
    }



}
