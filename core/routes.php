<?php
return [
    '/' => ['HomeController', 'index'],
    'contacts' => ['HomeController', 'contacts'],
    'categories' => ['CategoryController', 'index'],
    'categories/edit/([0-9]+)' => ['CategoryController', 'edit'],


];
