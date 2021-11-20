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

        //'INSERT INTO categories(name, description) VALUES(:name, :description)'
        $sql = 'INSERT INTO ' . static::getTable() . '(' . implode(', ', $props) . ') VALUES(:' . implode(', :', $props) . ')';
        echo "<br>";
        echo $sql;
        $params = [];
        foreach ($props as $prop) {
            $params[$prop] = $this->$prop;
        }
        echo "<br>";
        print_r($params);
        return $p->query($sql, $params, static::class);
    }

    // UPDATE `categories` SET `id`='[value-1]',`name`='[value-2]',`description`='[value-3]' WHERE 1
    public function update($id)
    {
        $db = new Db();
        $reflect = new \ReflectionClass(($this));
        $properties = $reflect->getProperties();
        echo '<pre>' . print_r($properties, true) . '</pre>';
        $props = [];
        foreach ($properties as $pr) {
            $props[$pr->name] = $pr->name;
        }
        // echo "<br>";
        // var_dump($props); //array(3) { ["id"]=> string(2) "id" ["name"]=> string(4) "name" ["description"]=> string(11) "description" } 
        // unset($props['id']);
        // echo "<br>";
        // var_dump($props); //array(2) { ["name"]=> string(4) "name" ["description"]=> string(11) "description" } 
        if (isset($props['created_at'])) {
            unset($props['created_at']);
        }
        $parameters = [];
        foreach ($props as $prop) {
            $parameters[$prop] = $prop . '=:' . $prop;
        }
        // echo "<br>";
        // print_r($parameters);
        $sql = 'UPDATE ' . static::getTable() . ' SET ' . implode(', ', $parameters) . ' WHERE id=' . $id;
        // echo "<br>";
        // echo $sql; //UPDATE categories SET name=:name, description=:description WHERE id=10

        $params = [];
        foreach ($props as $prop) {
            $params[$prop] = $this->$prop;
        }
        // echo "<br>";
        // print_r($params);
        return $db->query($sql, $params, static::class);
    }
}
