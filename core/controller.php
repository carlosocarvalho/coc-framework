<?php

abstract class Controller {

    private static $instance;
    var $view;
    var $helper;

    public function __construct() {
        self::$instance = & $this;
        $this->helper = new Helpers();
        $this->helper->load('mvc');
        $this->view = new View(new Request);
    }

    function model($model, $name = null) {
        $modelName = $model . 'Model';
        $modelFile = ROOT . 'models' . DS . $modelName . '.php';
        if (is_readable($modelFile)) {
            include_once $modelFile;
            $modelName = new $modelName();
            return (is_null($name) ? $modelName : $name = $modelName);
        }
    }

    public function library($library) {

        $libFile = ROOT . 'librarys' . DS . $library . '.php';
        if (is_readable($libFile)) {
            include_once $libFile;
            $library = new $library();
            return $library;
        }
    }

    abstract function index();

    static function & get_instance() {

        return self::$instance;
    }

    protected function post($post) {

        if (isset($_POST[$post])) {

            return trim($_POST[$post]);
        } else {

            return '';
        }
    }

    protected function redirect($url) {
        header('location:'.base_url($url));    
    }

}

