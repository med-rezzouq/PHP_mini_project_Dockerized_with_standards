<?php

namespace App\Controllers;

use App\Service\DonationService;

/**
 * controller to handle donation pages requests
 */
class DonationController
{
    public function getDonations()
    {
        DonationService::getAllDonations();
    }

    public function getDonationsByDonor()
    {
        DonationService::getDonationsByDonor();
    }

    public function addNew()
    {
        DonationService::addDonation();
    }
}
