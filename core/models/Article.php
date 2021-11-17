<?php

namespace Core\Models;

class Article extends Model
{
    public $id;
    public $name;
    public $text;
    public $img;
    public $reated_at;
    public $category_id;

    public static function getTable()
    {
        return 'articles';
    }
    public function getCategory()
    {
        $category = Category::find($this->category_id);
        return $category ? $category->name : 'Without Category';
    }
}
