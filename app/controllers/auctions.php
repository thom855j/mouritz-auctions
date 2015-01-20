<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auctions
 *
 * @author ThomasElvin
 */
class Auctions extends Controller {

    public function index() {
        // load model
        $auction_model = $this->loadModel('AuctionModel');
        $auctions = $auction_model->getAuctions();
        
        // load views.
        $this->view('auctions/index', (object) array(
                    'auctions' => (object) $auctions
        ));
    }

}
