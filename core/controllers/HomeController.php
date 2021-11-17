<?php

namespace Core\Controllers;

use Core\Models\Article;
use Core\Models\Category;
use Core\Views\View;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $text = 'Welcome!';
        $categories = Category::all();
        $articles = Article::all();

        //print_r(Category::find(6)->description);




        View::render('home', compact('title', 'text', 'categories', 'articles'));
    }
    public function contacts()
    {

        //View::render('contacts');
    }
}
