<?php

namespace App\classes;

class Controller
{
    protected function render($view, $data = [])
    {
        extract($data);

        // include "Views/$view.php";
        include "../views/$view.php";
    }
}
