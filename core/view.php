<?php

class View {

    private $_controller;
    var $layout = 'default';
    private $menu = array();
    private $js_all = array();
    private $css_all = array();

    public function __construct(Request $requisicao) {
        $this->_controller = $requisicao->getController();
    }

    public function load($view, $data = array()) {
        extract($data);
        if (preg_match('(\.php)', $view) || !strpos($view, '.'))
            $view = $view . '.php';
        else
            $view = $view;

        $fileView = APP_VIEWS . $view;

        if (is_readable($fileView))
            require_once $fileView;

        else
            error_404("Não encontramos a {$view}");
    }

    public function layout($view, $data = array()) {
        ob_start();
        $this->load($view, $data);
        $content = ob_get_clean();
        $layout = 'layout' . DS . $this->layout;


        $this->load($layout, array('content' => $content, 'menu' => $this->get_menu()));
    }

    private function get_menu() {
        $ins = & get_instance();
        $menu = $ins->model('layout');

        return $menu->menu();
    }

    public function add_js($js, $position = 'footer') {
        if (!in_array($js, $this->js_all)) {
            $this->js_all[$position][] = $js;
        }
    }

    public function get_js($position = 'footer') {
        $lib = array();
        $pl = array();
        $cm = array();
        if (isset($this->js_all[$position])):
            foreach ($this->js_all[$position] as $script) {

                if (preg_match('/librarys/', $script)):
                    $lib[] = $script;
                endif;
                if (preg_match('/plugins/', $script)):
                    $pl[] = $script;
                endif;
                if (preg_match('/common/', $script)):
                    $cm[] = $script;
                endif;
            }
            foreach ($lib as $script):
                echo '<script src="' . base_url('public/') . 'js/' . $script . '.js"> </script>' . "\n";
            endforeach;
            foreach ($pl as $script):
                echo '<script src="' . base_url('public/') . 'js/' . $script . '.js"> </script>' . "\n";
            endforeach;
            foreach ($cm as $script):
                echo '<script src="' . base_url('public/') . 'js/' . $script . '.js"> </script>' . "\n";
            endforeach;
        endif;
    }
    
    public function add_css($css, $position = 'top') {
        if (!in_array($css, $this->css_all)) {
            $this->css_all[$position][] = $css;
        }
    }

    public function get_css($css, $position = 'top') {
        
        $lib = array();
        $pl = array();
        $cm = array();
        if (isset($this->css_all[$position])):
            foreach ($this->css_all[$position] as $script) {

                if (preg_match('/librarys/', $script)):
                    $lib[] = $script;
                endif;
                if (preg_match('/plugins/', $script)):
                    $pl[] = $script;
                endif;
                if (preg_match('/layouts/', $script)):
                    $cm[] = $script;
                endif;
            }
            foreach ($lib as $style):
                echo '<link rel="stylesheet"   href="' . base_url('public/') . 'css/' . $style . '.css" />'."\n";
            endforeach;
            foreach ($pl as $style):
                echo '<link rel="stylesheet"   href="' . base_url('public/') . 'css/' . $style . '.css" />'."\n";
            endforeach;
            foreach ($cm as $style):
                echo '<link rel="stylesheet"   href="' . base_url('public/') . 'css/' . $style . '.css" />'."\n";
            endforeach;
        endif;
        
    }

}

