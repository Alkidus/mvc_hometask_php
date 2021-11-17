<?php

namespace Core\Models;

use Core\Helpers\Db;

class Category extends Model
{
    public $id;
    public $name;
    public $description;

    public static function getTable()
    {
        return 'categories';
    }
}
