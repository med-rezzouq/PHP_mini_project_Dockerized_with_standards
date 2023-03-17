<?php

namespace App\Router;

use App\Controllers\HomeController;
use App\Controllers\DonorController;
use App\Controllers\DonationController;

/**
 * Router to handle all coming requests and parse them using regex to call the concerned controllers
 */
class Router
{
    /** @var array list of registered routes */
    private const ROUTES = [  '/\/new-donor/' => [DonorController::class, 'addNew'], '/\/list-donations/' => [DonationController::class, 'getDonations'],'/\/filter-donations/' => [DonationController::class, 'getDonationsByDonor'], '/\/new-donation/' => [DonationController::class, 'addNew'],   '/\//' => [HomeController::class, 'home'], ];

    /** call the appropriate controller method of the requested uri */
    public static function handleRequest()
    {
        foreach (self::ROUTES as $url => $action) {
            $matches = preg_match($url, $_SERVER['REQUEST_URI'], $params);

            if ($matches > 0) {
                $controller = new $action[0]();
                $controller->{$action[1]}($params[1]);
                break;
            }
        }
    }
}
