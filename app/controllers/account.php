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
                        ), 'account');
            } else {
                Session::flash('feedback', '<p style="color: red;">You need to login to continue!</p>');
                Redirect::to(URL . 'login');
            }
        }
    }

    public function create($params) {
        $this->view('account/create/' . $params, null, 'account');
    }

    public function edit($params, $ID) {
        $user = $this->loadModel('UserModel');
        $User_ID = $user->data()->id;

        $auction_model = $this->loadModel('AuctionModel');
        $auctions = $auction_model->getAuctionsToUser($ID, $User_ID);

        $feedback[] = Session::flash('feedback');
        $this->view('account/edit/' . $params, (object) array(
                    'feedback' => (object) $feedback,
                    'auctions' => (object) $auctions
                ), 'account');
    }

    public function auctions() {
        $user = $this->loadModel('UserModel');
        $ID = $user->data()->id;

        $model = $this->loadModel('AuctionModel');
        $auctions = $model->getUserAuctions($ID);

        $feedback[] = Session::flash('feedback');
        $this->view('account/auctions', (object) array(
                    'feedback' => (object) $feedback,
                    'auctions' => (object) $auctions
                ), 'account');
    }

    public function profile() {
        $user = $this->loadModel('UserModel');
        if ($user->isLoggedIn()) {

            $feedback = Session::flash('feedback');
            $this->view('account/profile', (object) array(
                        'user' => (object) $user,
                        'feedback' => (object) $feedback
                    ), 'account');
        } else {
            Session::flash('feedback', '<p style="color: red;">You need to login to continue.</p>');
            Redirect::to(URL . 'login');
        }
    }

    public function settings() {
        $user = $this->loadModel('UserModel');
        if ($user->isLoggedIn()) {
            $feedback = Session::flash('feedback');
            $this->view('account/settings', (object) array(
                        'user' => (object) $user,
                        'feedback' => (object) $feedback
                    ), 'account');
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
