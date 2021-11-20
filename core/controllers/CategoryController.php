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
        // $name = $_POST['name'] ?? null;
        // $description = $_POST['description'] ?? null;
        // $id = $_POST['id'] ?? null;

        $category = Category::find($id);
        $name = $category->name;
        $description = $category->description;
        // $description = $_POST['description'] ?? null;
        // $id = $_POST['id'] ?? null;
        echo 'name= ' . $name . '<br>' . $description . '<br>' . $id . '<br>';
        View::render('category/edit', compact('category'));
        // $category->name = $name;
        // $category->description = $description;
        // $category->update(); //обновляет строку в таблицу category
        //$this->redirect('/categories');
    }
    public function update2()
    {
        $name = $_POST['name'] ?? null;
        $description = $_POST['description'] ?? null;
        $id = $_POST['id'] ?? null;

        $category = new Category();
        $category->name = $name;
        $category->description = $description;
        $category->update($id);
        //$this->redirect('/categories');
    }
}
