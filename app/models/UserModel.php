<?php

class UserModel {

    // Call to the database
    public function getTestFunction($sqlParameters) {
        return Database::query("SELECT testAttribute1, testAttribute2 FROM test LIMIT ?", [$sqlParameters]);
    }

    public function login ($user, $password) {
        $query = "SELECT count(*) as user FROM users WHERE `user`='$user' AND `password`='$password'";
        return Database::query($query);
    }
}

?>