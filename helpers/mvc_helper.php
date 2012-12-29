<?php

if (!function_exists('load_js')) {

    function load_js($js) {


        if (!is_array($js))
            $js = array($js);
        foreach ($js as $script):
            echo '<script src="' . base_url('public/') . 'js/' . $script . '.js"> </script>';
        endforeach;
    }

}


if (!function_exists('add_js')) {

    function add_js($js, $position = 'footer') {
        if (!is_array($js))
            $js = array($js);
        $ins = & get_instance();


        foreach ($js as $script):
            $ins->view->add_js($script, $position);
        endforeach;
    }

}


if (!function_exists('show_js')) {

    function show_js($position = 'footer') {
        $ins = & get_instance();
        $ins->view->get_js($position);
    }

}


if (!function_exists('show_css')) {

    function show_css($position = 'top') {
        $ins = & get_instance();
        $ins->view->get_css($position);
    }

}
if (!function_exists('add_css')) {

    function add_css($css,$position= 'top') {

        if (!is_array($css))
            $css = array($css);
        $ins = & get_instance();

        foreach ($css as $style):
            $ins->view->add_css($style, $position);
        endforeach;
    }

}

if (!function_exists('base_url')) {

    function base_url($uri = '') {
        $url = get_config('url_base');

        return $url . '/' . $uri;
    }

}


