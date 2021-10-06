<?php

class Person {

    public $id;
    public $last_name;
    public $first_name;
    public $nick_name;

    public function __construct() {
        DB::connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function add($data) {
        
    }

    public function getById($id) {
        return DB::queryOne('SELECT * FROM person WHERE id = :id', ['id' => $id], 'Person');
    }

    function getAll() {
        return DB::queryAll('SELECT * FROM person ORDER BY id ASC', null, 'Person');
    }

    public function delete($data) {
        
    }

    public function whoAmI() {
        return "I am {$this->first_name} {$this->last_name} and my
			nickname is {$this->nick_name}";
    }

}
