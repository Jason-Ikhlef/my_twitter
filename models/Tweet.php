<?php

class Tweet {
    private $_id;
    private $_user_id;
    private $_message;
    private $_date;
    private $_images;
    private $_origin;
    private $_comments;
    private $_liked_id;
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

    public function setUser_id($user_id) {

        $user_id = (int) $user_id;
        if ($user_id > 0) {
            $this->_user_id = $user_id;
        }

    }

    public function setMessage($message) {

        if (is_string($message)) {
            $this->_message = $message;
        }
    }

    public function setDate($date) {

        $this->_date = $date;
    }

    public function setImages($images) {

        $this->_images = $images;
    }

    public function setOrigin($origin) {

        $this->_origin = $origin;
    }

    public function setComments($comments) {

        $this->_comments = $comments;
    }

    public function setLiked_id($liked_id) {

        $this->_liked_id = $liked_id;
    }
 

    //GETTERS

    public function id() {

        return $this->_id;
    }

    public function user_id() {

        return $this->_user_id;
    }

    public function message() {
        
        return $this->_message;
    }

    public function date() {
        
        return $this->_date;
    }

    public function images() {
        
        return $this->_images;
    }

    public function origin() {
        
        return $this->_origin;
    }

    public function comments() {
        
        return $this->_comments;
    }

    public function liked_id() {
        
        return $this->_liked_id;
    }
}