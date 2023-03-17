<?php

namespace App\Service;

use App\Models\User;
use App\Repository\DonationRepository;
use App\Repository\DonorRepository;
use App\Views\ViewManager;
use Exception;
use PDOException;

/**
 *  donation service that handle all donation process
 */
final class DonationService
{
    /**
     *
     * call the repository to persist new donation
     * @return bool|String
     */
    public static function addDonation()
    {
        if ($_POST) {
            if ($_POST["donorId"] == "" or $_POST["donorName"] == "" or $_POST["donorType"]) {
                $donation = new DonationRepository();
                $result = $donation->add();

                if ($result === true) {
                    header("location: http://".$_SERVER['HTTP_HOST']."/index.php/list-donations");
                } else {
                    echo $result;
                }
            } else {
                $$error ="you must add at least one donor and also fill all required fields";
                ViewManager::renderView('donation/new.php', ['donors' => $result]);
            }
        } else {
            $order = new DonorRepository();
            $result = $order->getAllDonors();

            ViewManager::renderView('donation/new.php', ['donors' => $result]);
        }
    }

    /**
     *
     * call the repository to get all donations from the mysql table donation
     * @return array|String
     */
    public static function getAllDonations()
    {
        $donation = new DonationRepository();
        $data = $donation->getDonations();

        $order = new DonorRepository();
        $result = $order->getAllDonors();

        ViewManager::renderView('donation/list.php', ['donations' => $data, "donors" => $result ]);
    }

    /**
     *
     * call the repository to get donation by donor id from donation table
     * @return array|String
     */
    public static function getDonationsByDonor()
    {
        if ($_POST) {
            $postObj = json_decode($_POST["data"]);
            $donorId = trim(strip_tags($postObj->donorId));

            $donation = new DonationRepository();
            $result = $donation->getDonationsByDonor($donorId);
        }
    }
}
