<?php

class Request {
    private $controller;
    private $action;
    private $params;
    
    
    public function __construct() {
        
        if(isset($_GET['url'])){
            $url = filter_input(INPUT_GET,'url',FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            // array filter limpara caso exista slash sobrando
            $url = array_filter($url);
            $this->controller = array_shift($url);
            $this->action     = array_shift($url);
            $this->params     =  $url;
            
        }else{
            
            $this->controller = get_config('controller','default');
            $this->action     = 'index';
            $this->params     = array();
            
        }
        
    }
    
    
    public function getController()
            {
           return $this->controller;
            }
    public function getAction(){
        
        return $this->action;
        
    }        
    public function getParams(){
        
        return $this->params;
    }
}