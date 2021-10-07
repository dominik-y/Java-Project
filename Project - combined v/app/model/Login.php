<?php

class Login {

    public $id;
    public $uname;
    public $upassword;
    public $urole;

    public function __construct() {
        DB::connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function register($data) {
        
    }

    public function unregister($data) {
        
    }

    public function isAuthenticated($uname, $upassword) {
        $user = $this->getByUname($uname);

        if ($user & ($user->upassword == $upassword)) {
            $this->urole = $user->urole;
            return true;
        } else {
            return false;
        }
    }

    public function getById($id) {
        return DB::queryOne('SELECT * FROM user WHERE id = :id', ['id' => $id], 'User');
    }

    public function getByUname($uname) {
        return DB::queryOne('SELECT * FROM user WHERE uname = :uname', ['uname' => $uname], 'User');
    }

    function getAll() {
        return DB::queryAll('SELECT * FROM user ORDER BY id ASC', null, 'User');
    }

    public function logout() {
        session_unset();    // clear the $_SESSION array
        session_destroy();  // delete the session file
        setcookie(session_name(), '', time() - 1, $cookieInfo['path'], $cookieInfo['domain']); // instruct the browser to delete the cookie

        header("Location: index.php");
    }

}
