<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AuctionModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    //Get all users
    public function getAuctions() {
        $this->_db->get(array('*'), AUCTIONS_TABLE, null);
        return $this->_db->results();
    }

    public function getAuction($ID) {
        $this->_db->get(array('*'), AUCTIONS_TABLE, array(AUCTION_ID, '=', $ID));
        return $this->_db->results();
    }

    public function create($fields = array()) {
        return $this->_db->insert(AUCTIONS_TABLE, $fields);
    }

    public function update($fields = array()) {
        return $this->_db->insert(AUCTIONS_TABLE, $fields);
    }

    public function delete($ID) {
        return $this->_db->delete(AUCTIONS_TABLE, array(AUCTION_ID, '=', $ID));
    }

}
