<?php
$config['url_base'] = 'http://localhost/mvc';
$config['controller']['default'] = 'index';
$config['helpers']  = array(/*helpers*/);

$config['database']['default'] = array('host'=>'mysql:host=localhost',
                                       'user'=>'root',
                                       'pass'=>'',
                                       'dbname'=>'mvc-base',
                                       'char'=>'utf8');