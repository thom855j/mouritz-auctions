<?php

class Controlpanel extends Controller {

    public function index() {

        // load models
        $user = $this->loadModel('UserModel');
        $feedback = Session::flash('feedback');
        if ($user->isLoggedIn() && $user->role('Admin')) {
            //load view
            $this->view('controlpanel/index', (object) array(
                        'user' => (object) $user,
                        'feedback' => (object) $feedback
                    ), 'controlpanel');
        } else {
            Session::flash('feedback', '<p style="color: red;">Access denied!</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function edit($params, $ID) {
        $class = ucfirst($params) . 'Model';
        $method = 'get' . $class;
        $model = $this->loadModel($class);
        $data = $model->$method($ID);
        $this->view('controlpanel/edit/' . $params, (object) array(
                    'data' => (object) $data
        ));
    }

    public function create($params) {
        $this->view('controlpanel/create/' . $params);
    }

    public function page($params, $ID) {
        $class = ucfirst($params) . 'Model';
        $method = 'get' . $class;
        $model = $this->loadModel($class);
        $data = $model->$method($ID);
        $this->view('controlpanel/create/' . $params, (object) array(
                    'data' => (object) $data
        ));
    }

//    public function comments() {
//        // load model
//
//        $model = $this->loadModel('CommentModel');
//        $data = $model->getComments();
//        // load views
//        $this->view('controlpanel/comments', (object) array(
//                    'comments' => (object) $data
//        ));
//    }
//
//    public function users($limit = 10) {
//        //load model
//        $user = $this->loadModel('User');
//
//        $model = $this->loadModel('User');
//        $users = $model->getAllUsers($limit);
//
//        $this->view('controlpanel/users', (object) array(
//                    'users' => (object) $users
//        ));
//    }
}
