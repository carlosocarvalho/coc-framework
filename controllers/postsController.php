<?php

class postsController extends Controller {

    private $view_folder = 'frontend/posts/';

    public function __construct() {
        parent::__construct();
        $this->posts = $posts = $this->model('posts');
    }

    function index() {
        $data['posts'] = $this->posts->getPosts();
        $this->view->layout($this->view_folder . 'posts.phtml', $data);
    }

    function novo() {
        if($this->post('gravar') == 1)
            {
           
            
            
            $this->posts->createPost(array('titulo'=>  $this->post('titulo'),
                             'texto'=>$this->post('texto'),
                          'data'=>date('Y-m-d'))
                    );
                    $this->redirect('posts');
            }
        $this->view->layout($this->view_folder . 'novo.phtml');
    }

    

}