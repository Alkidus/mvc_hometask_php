<?php

namespace Core\Controllers;

abstract class Controller
{
    protected function redirect(string $path)
    {
        header('Location: ' . $path);
        exit;
    }
    protected function dump($data)
    {
        echo '<pre>' . print_r($data, true) . '</pre>';
    }
}
