<?php

namespace Core\Views;

class View
{
    public static function render(string $path, array $data = [])
    {
        extract($data);
        unset($data);
        require_once 'templates/header.php';
        require_once 'templates/' . $path . '.php';
        require_once 'templates/footer.php';
    }
}
