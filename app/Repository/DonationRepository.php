<?php

namespace App\Repository;

use App\Models\Donation;
use App\Service\DatabaseConnection;
use Exception;

/**
 *  repository to interact with donation mysql table
 */
class DonationRepository
{
    private $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getInstance();
        return $this;
    }



    /**
     * function to get all the donations in the donation page
     * @return array
     */
    public function getDonations(): array
    {
        try {
            $donations = [];
            $result = $this->db->query('select * from donation')->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as $donation) {
                $don =new Donation();
                $don->setId($donation['id']);
                $don->setDonorId($donation['donor_id']);
                $don->setDonationName($donation['donation_name']);
                $don->setDonationType($donation['donation_type']);

                $donations[] =['id'=>$don->getId(),
                'donationName'=> $don->getDonationName(),'donationType'=>  $don->getDonationType(),'donorId'=> $don->getDonorId()];
            }

            return $donations;
        } catch (Exception $e) {
            $fp = fopen(__DIR__ . '/../Vars/Logs/app.log', 'a');
            fwrite($fp, $e->getMessage(). PHP_EOL);
            fclose($fp);
            return $e->getMessage();
        }


        return false;
    }


    /**
     *  function takes donor id to get his donations
     * @param int $donorId
     *
     * @return json result
     */
    public function getDonationsByDonor($donorId)
    {
        try {
            $donations = [];
            $req = $this->db->prepare('select * from donation where donor_id =?');
            $req->execute([intval($donorId)]);
            $result = $req->fetchAll(\PDO::FETCH_ASSOC);


            foreach ($result as $donation) {
                $don = new Donation();
                $don->setId($donation['id']);
                $don->setDonorId($donation['donor_id']);
                $don->setDonationName($donation['donation_name']);
                $don->setDonationType($donation['donation_type']);

                $donations[] =['id'=>$don->getId(),
                'donationName'=> $don->getDonationName(),'donationType'=>  $don->getDonationType(),'donorId'=> $don->getDonorId()];
            }

            echo json_encode(['suc' => $donations]);
        } catch (Exception $e) {
            $fp = fopen(__DIR__ . '/../Vars/Logs/app.log', 'a');
            fwrite($fp, $e->getMessage(). PHP_EOL);
            fclose($fp);
            echo json_encode(['err' =>  $e->getMessage()]);
        }
    }

    /**
     * to add a new donation
     * @return [strin|boolean]
     */
    public function add()
    {
        $donation = new Donation();
        $donation->setDonationName($_POST['donationName']);
        $donation->setDonationType($_POST['donationType']);
        $donation->setDonorId($_POST['donorId']);


        try {
            $req = $this->db->prepare('insert into donation(donation_name,donation_type,donor_id) values(?,?,?);');
            $req->execute([$donation->getDonationName(),$donation->getDonationType(),intval($donation->getDonorId())]);
            return true;
        } catch (Exception $e) {
            $fp = fopen(__DIR__ . '/../Vars/Logs/app.log', 'a');
            fwrite($fp, $e->getMessage(). PHP_EOL);
            fclose($fp);
            return $e->getMessage();
        }
    }
}
