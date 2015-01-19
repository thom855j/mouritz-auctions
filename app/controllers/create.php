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
