<?php

// Const tables with prefix USER_
class UserModel {

    private $_db,
            $_data,
            $_sessionName,
            $_cookieName,
            $_isLoggedIn;

    public function __construct($user = null) {
        $this->_db = DB::getInstance();

        $this->_sessionName = SESSION_NAME;
        $this->_cookieName = COOKIE_NAME;

        if (!$user) {
            if (Session::exists($this->_sessionName)) {
                $user = Session::get($this->_sessionName);

                if ($this->find($user)) {
                    $this->_isLoggedIn = true;
                } else {
                    $this->logout();
                }
            }
        } else {
            $this->find($user);
        }
    }

    //Update users
    public function update($fields = array(), $id = null) {

        if (!$id && $this->isLoggedIn()) {
            $id = $this->data()->ID;
        }

        if (!$this->_db->update(USERS_TABLE, $id, $fields)) {
            throw new Exception('There was a problem updating.');
        }
    }

    //Create users
    public function create($fields) {
        if (!$this->_db->insert(USERS_TABLE, $fields)) {
            throw new Exception('There was a problem creating an account.');
        }
    }

    //Delete a user
    public function deleteUser($ID) {
        if (!$this->_db->delete(USERS_TABLE, array(array(USER_ID, '=', $ID)))) {
            throw new Exception('There was a problem deleting an account.');
        }
    }

    //Get all users
    public function getAllUsers() {
        $this->_db->get(array('*'), USERS_TABLE);
        return $this->_db->results();
    }

    //Get a user
    public function getUser($ID) {
        $this->_db->get(array('*'), USERS_TABLE, array(array(USER_ID, '=', $ID)));
        return $this->_db->results();
    }

    //Find users
    public function find($user = null) {
        if ($user) {
            $field = (is_numeric($user)) ? USER_ID : USER_NAME;
            $data = $this->_db->get(array('*'), USERS_TABLE, array($field, '=', $user), null);

            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    //check if user exists
    public function exists() {
        return (!empty($this->_data)) ? true : false;
    }

    //Log users in
    public function login($username = null, $password = null, $remember = false) {

        if (!$username && !$password && $this->exists()) {
            Session::put($this->_sessionName, $this->data()->ID);
        } else {

            $user = $this->find($username);
            if ($user) {
                $data = Password::verify($this->data()->Password);
                Password::check($password, $this->data()->Password);
                if (crypt($password, $data) === $data) {
                    // password is correct

                    Session::put($this->_sessionName, $this->data()->ID);

                    if ($remember) {
                        $hash = Hash::unique();
                        $hashCheck = $this->_db->get(array('*'), SESSIONS_TABLE, array(SESSION_USER_ID, '=', $this->data()->ID));

                        if (!$hashCheck->count()) {
                            $this->_db->insert(SESSIONS_TABLE, array(
                                SESSION_USER_ID => $this->data()->ID,
                                SESSION_HASH => $hash
                            ));
                        } else {
                            $hashCheck = $hashCheck->first()->Hash;
                        }

                        Cookie::put($this->_cookieName, $hash, COOKIE_EXPIRY);
                    }

                    return true;
                }
            }
        }

        return false;
    }

    //User roles
    public function role($key) {
        $role = $this->_db->get(array('*'), ROLES_TABLE, array(ROLE_ID, '=', $this->data()->Role_ID));

        if ($role->count()) {
            $permissions = json_decode($role->first()->Role, true);

            if ($permissions[$key] == true) {
                return true;
            }
        }
        return false;
    }

    public function logout() {
        $this->_db->delete(SESSIONS_TABLE, array(SESSION_USER_ID, '=', $this->data()->ID));
        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }

    public function data() {
        return $this->_data;
    }

    public function isLoggedIn() {
        return $this->_isLoggedIn;
    }

}
