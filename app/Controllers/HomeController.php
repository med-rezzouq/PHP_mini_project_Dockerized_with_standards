<?php

namespace App\Controllers;

use App\Views\ViewManager;

class HomeController
{
    /**
     * show the home page view
     * @return void
     */
    public function home()
    {
        ViewManager::renderView('home/home.php');
    }
}
