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
    public function edit_old($id)
    {
        $category = Category::find($id);
        $this->dump($category);
        View::render('category/edit');
    }
    public function create()
    {
        View::render('category/create');
    }

    public function store()
    {
        $name = $_POST['name'] ?? null;
        $description = $_POST['description'] ?? null;

        $category = new Category();
        $category->name = $name;
        $category->description = $description;
        $category->save(); //добавляет строку в таблицу category
        $this->redirect('/categories');
    }

    public function updateCategory($id) //сделать его таким же универсальным как и метод save()
    {
        $category = Category::find($id);
        $name = $category->name;
        $description = $category->description;
        View::render('category/edit', compact('category'));
    }
    public function edit()
    {
        $name = $_POST['name'] ?? null;
        $description = $_POST['description'] ?? null;
        $id = $_POST['id'] ?? null;

        $category = new Category();
        $category->name = $name;
        $category->description = $description;
        $category->update($id);
        $this->redirect('/categories');
    }
}
