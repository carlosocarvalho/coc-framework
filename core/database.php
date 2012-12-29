<?php

class Database extends PDO {

    private $db;

    public function __construct() {
        $data_config = get_config('database', 'default');

        parent::__construct($data_config['host'] . ';dbname=' . $data_config['dbname'], $data_config['user'], $data_config['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . $data_config['char']));

        $this->db = $this;
    }

    public function selectAll($tb, $fields = '*') {
        $result = $this->db->query("SELECT {$fields} FROM {$tb}");
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectRow($where) {
        
        $result = $this->db->query("SELECT {$fields} FROM {$tb}  LIMIT 1");
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertDb($tb, $data = array()) {

        $cont = count(array_keys($data));
        $dataprepare = array_keys($data);
        $prepare = '';
        for ($i = 0; $i < $cont; $i++):
            $prepare .=":" . $dataprepare[$i];
            if ($i < $cont - 1):
                $prepare.=",";
            endif;
        endfor;

        $input_parameters = array_combine(explode(",", $prepare), array_values($data));
        $columns = '`' . implode('`,`', array_keys($data)) . '`';
        $values = '"' . implode('","', array_values($data)) . '"';
        $sql = "INSERT INTO `$tb` ($columns) VALUES ($values)";
        $this->db->prepare($sql)->execute();
    }

    public function editData($tb, $data, $where) {
        
    }

}