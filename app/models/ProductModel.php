<?php

class ProductModel {

    public function all () {
        $query = "SELECT * FROM products";
        return Database::query($query);
    }
}
