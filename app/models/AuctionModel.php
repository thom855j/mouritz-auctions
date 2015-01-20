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
        $sql = "SELECT id, title, start_date, end_date, description, start_price, buy_price, category, user, image, status
      FROM (SELECT 
      Auctions.id AS id, 
      Auctions.title AS title, 
      Auctions.start_date AS start_date, 
      Auctions.end_date AS end_date, 
      Auctions.description AS description, 
      Auctions.start_price AS start_price, 
      Auctions.buy_price AS buy_price,
      Auctions.status AS status,
      Auctions.category_id AS category_id, 
      Categories.name AS category,
      Users.username AS user,
      Auction_Images.url AS image
      FROM Auctions, Categories, Auction_Images, Users
      WHERE  Auctions.status = 0
	) AS result GROUP by id";
        $this->_db->query($sql);
        return $this->_db->results();
    }

    public function getAuction($ID) {
        $sql = "SELECT id, title, start_date, end_date, description, start_price, buy_price, category, user, image
      FROM (SELECT 
      Auctions.id AS id, 
      Auctions.title AS title, 
      Auctions.start_date AS start_date, 
      Auctions.end_date AS end_date, 
      Auctions.description AS description, 
      Auctions.start_price AS start_price, 
      Auctions.buy_price AS buy_price,
      Auctions.category_id AS category_id, 
      Categories.name AS category,
      Users.username AS user,
      Auction_Images.url AS image
      FROM Auctions, Categories, Auction_Images, Users
         WHERE Auctions.id = $ID
	) AS result GROUP by id";
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
