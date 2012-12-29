<?php

class layoutModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function menu() {
        return array(
                array('id' => 'index', 'titulo' => 'Home'),
                array('id' => 'contato', 'titulo' => 'Contato'),
                array('id' => 'posts', 'titulo' => 'Publicações')
                
               );
    }

}