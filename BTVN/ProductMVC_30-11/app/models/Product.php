<?php
namespace App\Models;

class Product {
    private static function getSessionKey() {
        return 'products';
    }

    public static function initProducts() {
        if (!isset($_SESSION[self::getSessionKey()])) {
            $_SESSION[self::getSessionKey()] = [];
        }
    }

    public static function add($name, $price, $image) {
        self::initProducts();
        $id = time();
        $_SESSION[self::getSessionKey()][$id] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'image' => $image
        ];
        return $id;
    }

    public static function update($id, $name, $price, $image) {
        if (isset($_SESSION[self::getSessionKey()][$id])) {
            $_SESSION[self::getSessionKey()][$id] = [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'image' => $image
            ];
            return true;
        }
        return false;
    }

    public static function delete($id) {
        if (isset($_SESSION[self::getSessionKey()][$id])) {
            unset($_SESSION[self::getSessionKey()][$id]);
            return true;
        }
        return false;
    }

    public static function getAll() {
        self::initProducts();
        return $_SESSION[self::getSessionKey()];
    }

    public static function getById($id) {
        return $_SESSION[self::getSessionKey()][$id] ?? null;
    }
}