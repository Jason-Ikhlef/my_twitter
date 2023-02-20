<?php

class User {
    private $_id;
    private $_nickname;
    private $_email;
    private $_password;
    private $_follows;
    private $_picture;
    public function __construct(array $data) {

        $this->hydrate($data);
    }

    public function hydrate(array $data) {

        foreach ($data as $k => $value) {

            $method = 'set' . ucfirst($k);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function setId($id) {

        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }

    }

    public function setNickname($nickname) {

        if (is_string($nickname)) {
            $this->_nickname = $nickname;
        }

    }

    public function setEmail($email) {

        if (is_string($email)) {
            $this->_email = $email;
        }
    }

    public function setPassword($password) {

        if (is_string($password)) {
            $this->_password = $password;
        }

    }

    public function setFollows($follows) {

        if (is_string($follows)) {
            $this->_follows = $follows;
        }

    }

    public function setPicture($picture) {

        $this->_picture = $picture;
    }
 

    //GETTERS

    public function id() {

        return $this->_id;
    }

    public function nickname() {

        return $this->_nickname;
    }

    public function email() {
        
        return $this->_email;
    }

    public function password() {
        
        return $this->_password;
    }

    public function follows() {
        
        return $this->_follows;
    }

    public function picture() {
        
        return $this->_picture;
    }
}