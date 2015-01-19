<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of register
 *
 * @author ThomasElvin
 */
class Register extends Controller {

    public function index() {
        $user = $this->loadModel('UserModel');
        if ($user->isLoggedIn()) {
            Session::flash('feedback', '<p style="color: green;">You are already logged in!</p>');
            Redirect::to(URL . 'account');
        } else {
            $feedback = Session::flash('feedback');

            // load views
            $this->view('register/index', (object) array(
                        'feedback' => (object) $feedback
            ));
        }
    }

    public function verify() {
        if (Input::exists()) {
            $validate = $this->loadModel('ValidateModel');
            $validation = $validate->check($_POST, array(
                'username' => array(
                    'required' => true,
                    'min' => 5,
                    'max' => 20,
                    'notTaken' => USERS_TABLE
                ),
                'password' => array(
                    'required' => true,
                    'min' => 5,
                    'max' => 60,
                    'validPass' => Input::get('password')
                )
            ));

            if ($validation->passed()) {
                try {
                    $user = $this->loadModel('UserModel');
                    $user->create(array(
                        USER_USERNAME => Input::get('username'),
                        USER_PASSWORD => Password::hash(Input::get('password'))
                    ));

                    Session::flash('feedback', '<p style="color: green;" >You have been registered and can now login!</p>');

                    Redirect::to(URL . 'login');
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            } else {
                foreach ($validation->errors() as $error) {
                    $errors[] = $error;
                }
                Session::flash('feedback', $errors);
//                Session::flash('input', $_POST);
                Redirect::to(URL . 'register');
            }
        }
    }

}
