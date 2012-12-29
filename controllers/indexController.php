<?php


class indexController extends Controller{
    
    
    public function __construct() {
        parent::__construct();
        
        $this->posts =  $posts = $this->model('posts');
    }
    
    function index(){
        
        
        $data['posts']= $this->posts->getPosts();
        $data['titulo'] = 'Titulo do Portal';
        $this->view->layout('frontend/index.phtml',$data);      
    }
}