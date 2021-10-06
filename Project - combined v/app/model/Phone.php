<?php

class Phone {

    public $id;
    public $phone_type;
    public $phone_number;
    public $country_code;

    public function __construct() {
        DB::connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function getAll($id) {
        return DB::queryAll('SELECT * FROM phonenumber WHERE id = :id', ['id' => $id], 'Phone');
    }



    public function getAllJoinedBy($id) {
        $query = "SELECT * FROM person 
                  INNER JOIN phonenumber USING (id)
                  WHERE id = :id
                  ORDER BY person.last_name DESC;";
        /*
         * Phone model is used in this case also, and that is fine, because in PHP,
         * if a property you try to use does not exit (first_name, last_name, ...) 
         * it is going to be created automatically as part of the object.
         */
        return DB::queryAll($query, ['id' => $id], 'Phone');
    }

}
