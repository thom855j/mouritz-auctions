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

    public function getAuctions() {
        $this->_db->get(array('*'), VIEWS_AUCTIONS, null);
        return $this->_db->results();
    }

    public function getAuction($ID) {
        $this->_db->get(array('*'), VIEWS_AUCTIONS, array(AUCTION_ID, '=', $ID));
        return $this->_db->results();
    }

    public function getUserAuctions($ID) {
        $this->_db->get(array('*'), VIEWS_AUCTIONS, array(AUCTION_USER_ID, '=', $ID));
        return $this->_db->results();
    }

    public function getAuctionsToUser($ID, $user_id) {
        $sql = "SELECT * FROM Auctions_view WHERE id = $ID AND user_id = $user_id";
        $this->_db->query($sql);
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
