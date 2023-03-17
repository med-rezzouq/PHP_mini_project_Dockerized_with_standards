<?php

namespace App\Repository;

use App\Models\Donor;
use App\Service\DatabaseConnection;
use Exception;

/**
 *  repository to interact with donor mysql table
 */
class DonorRepository
{
    private $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getInstance();
        return $this;
    }

    /**
     * get all donors to fill the select on the filter search
     * @return array|string
     */
    public function getAllDonors(): array
    {
        $donors = [];

        try {
            $result = $this->db->query('select * from donor')->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as $donor) {
                $item =new Donor();
                $item->setId($donor['id']);
                $item->setPhone($donor['phone']);
                $item->setDonorName($donor['donor_name']);


                $donors[] =['id'=>$item->getId(),
                'donorName'=>  $item->getDonorName(),
                'phone'=> $item->getPhone()];
            }

            return $donors;
        } catch (Exception $e) {
            $fp = fopen(__DIR__ . '/../Vars/Logs/app.log', 'a');
            fwrite($fp, $e->getMessage(). PHP_EOL);
            fclose($fp);
            return $e->getMessage();
        }
    }



    /**
     * to add new Donor
     * @return bool|string
     */
    public function add()
    {
        $order = new Donor();
        $order->setDonorName($_POST['donorName']);
        $order->setPhone($_POST['phone']);

        try {
            $req = $this->db->prepare('insert into donor(phone,donor_name) values(?,?);');
            $req->execute([$order->getPhone(),$order->getDonorName()]);
            return true;
        } catch (Exception $e) {
            $fp = fopen(__DIR__ . '/../Vars/Logs/app.log', 'a');
            fwrite($fp, $e->getMessage(). PHP_EOL);
            fclose($fp);
            return $e->getMessage();
        }
    }
}
