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
    public function save()
    {
        $p = new Db();
        $reflect = new \ReflectionClass(($this));
        $properties = $reflect->getProperties();
        echo '<pre>' . print_r($properties, true) . '</pre>';
        $props = [];
        foreach ($properties as $pr) {
            $props[$pr->name] = $pr->name;
        }
        unset($props['id']);
        if (isset($props['created_at'])) {
            unset($props['created_at']);
        }

        $sql = 'INSERT INTO ' . static::getTable() . '(' . implode(', ', $props) . ') VALUES(:' . implode(', :', $props) . ')';
        $params = [];
        foreach ($props as $prop) {
            $params[$prop] = $this->$prop;
        }
        return $p->query($sql, $params, static::class);
    }
}
