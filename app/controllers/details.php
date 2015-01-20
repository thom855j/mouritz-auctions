<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of details
 *
 * @author ThomasElvin
 */
class Details extends Controller {

    public function auction($ID) {
        // load model
        $model = $this->loadModel('AuctionModel');
        $auctions = $model->getAuction($ID);
        // load views.
        $this->view('details/auction', (object) array(
                    'auction' => (object) $auctions
        ));
    }

}
