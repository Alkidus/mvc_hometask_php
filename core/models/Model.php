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

        //'INSERT INTO categories(name, description) VALUES(name=:name, description=:description)'
        $sql = 'INSERT INTO ' . static::getTable() . '(' . implode(', ', $props) . ') VALUES(:' . implode(', :', $props) . ')';
        echo "<br>";
        echo $sql;
        $params = [];
        foreach ($props as $prop) {
            $params[$prop] = $this->$prop;
        }
        echo "<br>";
        var_dump($params);
        return $p->query($sql, $params, static::class);
    }
    // public function delete()
    // {
    //     $db = new Db();

    //     $id = $_POST['id'];
    //     return $db->query('DELETE FROM categories WHERE id=' . $id);
    // }
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
        echo "<br>";
        var_dump($props);
        //unset($props['id']);
        echo "<br>";
        var_dump($props);
        if (isset($props['created_at'])) {
            unset($props['created_at']);
        }
        echo "<br>";
        echo 'id= ' . $id;
        $sql = 'UPDATE ' . static::getTable() . ' SET name=:n, description=:d WHERE id=' . $id;
        echo "<br>";
        echo $sql;
        //$sql = 'UPDATE ' . static::getTable() . ' SET ' . implode(', ', $props) . ') VALUES(:' . implode(', :', $props) . ' WHERE id = ';
        //$sql = "UPDATE 'categories' SET 'name'='[value-2]','description'='[value-3]' WHERE id = " . $id;
        $params = [];
        foreach ($props as $prop) {
            $params[$prop] = $this->$prop;
        }
        echo "<br>";
        var_dump($params);
        // return $db->query($sql, $params, static::class);
    }
}
