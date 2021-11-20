<?php
return [
    '/' => ['HomeController', 'index'],
    'contacts' => ['HomeController', 'contacts'],
    'categories' => ['CategoryController', 'index'],
    'categories/create' => ['CategoryController', 'create'],
    'categories/store' => ['CategoryController', 'store'],
    'categories/edit/([0-9]+)' => ['CategoryController', 'updateCategory'],
    'categories/update2' => ['CategoryController', 'update2'],

];
