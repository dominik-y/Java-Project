<?php
class Manager {

    public $id;
    public $phone_type;
    public $phone_number;
    public $country_code;

    public function __construct() {
        DB::connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    //TODO: implement getting all the phone data for the specified person id
    //http://localhost/.../index.php?page=phone&method=getAll&param=1
    public function getAll($id) {
        return  null;//DB::queryAll('SELECT * FROM phonenumber', NULL, 'Phone');
    }


}
