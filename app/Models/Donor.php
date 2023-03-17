<?php

namespace App\Models;

/**
/** Encapsulate `donors` table records.
 */
class Donor
{
    /**
     * @var [int]
     */
    private $id;
    /**
     * @var [string]
     */
    private $phone;
    /**
     * @var [string]
     */
    private $donorName;




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
      * set donor name
      *
      */
    public function setDonorName($donorName)
    {
        $this->donorName = $donorName;
    }


    /**
     * get donor name
     * @return [string]
     */
    public function getDonorName()
    {
        return $this->donorName;
    }


    /**
      * set donor phone
      *
      */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }


    /**
     * get donor phone
     * @return [string]
     */
    public function getPhone()
    {
        return $this->phone;
    }
}
