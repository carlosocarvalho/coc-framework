<?php
class contatoController extends Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
       $this->view->layout('frontend/contato.phtml');
    }
    
}
?>
