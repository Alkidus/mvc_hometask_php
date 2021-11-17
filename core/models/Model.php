<?php

namespace Core\Models;

use Core\Helpers\Db;

abstract class Model
{
    abstract public static function getTable();
    public static function all()
    {
        $db = new Db();
        return $db->query('SELECT * FROM ' . static::getTable(), [], static::class);
    }
    public static function find($id)
    {
        $db = new Db();
        $result =  $db->query('SELECT * FROM ' . static::getTable() . ' WHERE id=?', [$id], static::class);
        return $result ? $result[0] : null;
    }
}
