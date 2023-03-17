<?php

namespace App\Service;

use App\Models\User;
use App\Repository\DonorRepository;
use App\Views\ViewManager;
use Exception;
use PDOException;

/**
 *  donation service that handle all donation process
 */
final class DonorService
{
    /**
     *
     * call the repository to persist new donor
     * @return Bool|String
     */
    public static function addDonor()
    {
        if ($_POST) {
            $donor = new DonorRepository();

            $result = $donor->add();

            if ($result === true) {
                header("location: http://".$_SERVER['HTTP_HOST']."/index.php/list-donations");
            } else {
                echo $result;
            }
        } else {
            ViewManager::renderView('donor/new.php');
        }
    }
}
