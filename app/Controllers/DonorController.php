<?php

namespace App\Controllers;

use App\Repository\DonorRepository;
use App\Service\DonorService;
use App\Views\ViewManager;

/**
 * controller to handle donor requests
 */
class DonorController
{
    /**
     * get all donors to fill the selectbox filter
     * @return array|string
     */
    public function getAllDonors()
    {
        $orders = new DonorRepository();
        $data = $orders->getAllDonors();

        ViewManager::renderView('donor/list.php', ['donors' => $data]);
    }

    public function addNew()
    {
        DonorService::addDonor();
    }
}
