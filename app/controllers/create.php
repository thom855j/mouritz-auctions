<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of create
 *
 * @author ThomasElvin
 */
class Create {

    public function index() {
        if (Input::exists()) {
            
        }
        Redirect::to(URL . 'error/404');
    }

    public function auction() {
        if (Input::exists()) {

            $allowedExts = unserialize(ALLOWED_EXTENSIONS);
            $temp = explode(".", Input::escape(Input::get('file', 'name')));
            $extension = end($temp);

            if (((Input::get('file', 'type') == "image/gif") ||
                    (Input::get('file', 'type') == "image/jpeg") ||
                    (Input::get('file', 'type') == "image/jpg") ||
                    (Input::get('file', 'type') == "image/pjpeg") ||
                    (Input::get('file', 'type') == "image/x-png") ||
                    (Input::get('file', 'type') == "image/png")) &&
                    (Input::get('file', 'size') < MAX_UPLOAD_SIZE) && in_array($extension, $allowedExts)) {
                if (Input::get('file', 'error') > 0) {
                    Session::flash('feedback', '<p style="color: red;">Return Code: ' . Input::get('file', 'error') . '</p>');
                    Redirect::to(URL . 'account/auctions');
                } else {

                    $ext = str_replace('image/', '.', Input::get('file', 'type'));
                    $file = RANDOM_NAME . $ext;

                    if (file_exists(UPLOADS_FOLDER . $file)) {
                        $uploaderror = $file . " already exists. ";
                        Session::flash('feedback', '<p style="color: red;">' . $uploaderror . '</p>');
                        Redirect::to(URL . 'account/create/auction');
                    } else {
                        copy(Input::escape(Input::get('file', 'tmp_name')), UPLOADS_FOLDER . $file);
                    }
                }
            } else {
                Session::flash('feedback', '<p style="color: red;">Invalid file!</p>');
                Redirect::to(URL . 'account/create/auction');
            }

            $end_date = Input::escape(Input::get('date')) . ' ' . Input::escape(Input::get('time'));

            $model = $this->loadModel('AuctionModel');
            $model->create(array(
                'car_image' => $file,
                'title' => Input::escape(Input::get('name')),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => $end_date,
                'description' => Input::escape(Input::get('description')),
                'start_price' => Input::escape(Input::get('start')),
                'buy_price' => Input::escape(Input::get('buy')),
                'category_id' => Input::escape(Input::get('cateogry')),
                'user_id' => Input::escape(Input::get('user'))
            ));

            Session::flash('feedback', '<p style="color: green;">Auction created successfully!</p>');
            Redirect::to(ACCOUNT . 'account/auctions');
        }
        Redirect::to(URL . 'error/404');
    }

    public function comment() {
        if (Input::exists()) {
            
        }
        Redirect::to(URL . 'error/404');
    }

    public function user() {
        if (Input::exists()) {
            
        }
        Redirect::to(URL . 'error/404');
    }

}
