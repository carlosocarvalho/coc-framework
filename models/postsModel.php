<?php

class postsModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPosts() {

        return $this->_db->selectAll('posts');
    }

    public function createPost($data) {
        $this->_db->insertDb('posts',$data);
    }

}