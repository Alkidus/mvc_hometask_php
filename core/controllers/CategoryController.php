<?php

namespace Core\Controllers;

use Core\Models\Category;
use Core\Views\View;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        View::render('category/index', compact('categories'));
    }
    public function edit($id)
    {
        $category = Category::find($id);
        $this->dump($category);
    }
    public function create()
    {
        View::render('category/create');
    }
}
