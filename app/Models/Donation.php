<?php

namespace App\Models;

/**
/** Encapsulate `donors` table records.
 */
class Donation
{
    /**
     * @var [int]
     */
    private $id;
    /**
     * @var [string]
     */
    private $donationName;
    /**
     * @var [string]
     */
    private $donationType;

    /**
    * @var [int]
    */
    private $donorId;




    /**
     * get id
     * @return [int]
     */
    public function getId()
    {
        return $this->id;
    }

    /**
      * set id
      *
      */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * get donor id
     * @return [int]
     */
    public function getDonorId()
    {
        return $this->donorId;
    }

    /**
      * set donorid
      *
      */
    public function setDonorId($id)
    {
        $this->donorId = $id;
    }

    /**
      * set donation name
      *
      */
    public function setDonationName($donationName)
    {
        $this->donationName = $donationName;
    }


    /**
     * get donation name
     * @return [string]
     */
    public function getDonationName()
    {
        return $this->donationName;
    }


    /**
      * set donation type
      *
      */
    public function setDonationType($donationType)
    {
        $this->donationType = $donationType;
    }


    /**
     * get donation type
     * @return [string]
     */
    public function GetDonationType()
    {
        return $this->donationType;
    }
}
