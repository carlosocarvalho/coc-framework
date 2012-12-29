<?php


class Helpers {
    
    private $helpers;
    public function __construct(){
        $this->helpers = get_config('helpers');
     }


    function load($name = false)
    {   
        if($name){
            $this->helpers = array_merge($this->helpers,array($name));
        }
        foreach($this->helpers as $helper):
                       $filename = ROOT.'helpers'.DS.$helper.'_helper.php';  
                   if(is_readable($filename)){include_once $filename;}
                   else{
                       echo 'helper '. $helper.' nao encontrado';
                   }
        endforeach;
        
        
    }
    
    
   
    
}