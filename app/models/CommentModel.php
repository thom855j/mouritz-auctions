<?php

class CommentModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    //Get all users
    public function getComments() {
        $this->_db->get(array('*'), COMMENTS_TABLE, null);
        return $this->_db->results();
    }

    public function getComment($ID) {
        $this->_db->get(array('*'), COMMENTS_TABLE, array(COMMENT_ID, '=', $ID));
        return $this->_db->results();
    }

    public function create($fields = array()) {
        return $this->_db->insert(COMMENTS_TABLE, $fields);
    }

    public function update($fields = array()) {
        return $this->_db->insert(COMMENTS_TABLE, $fields);
    }

    public function delete($ID) {
        return $this->_db->delete(COMMENTS_TABLE, array(COMMENT_ID, '=', $ID));
    }

}
