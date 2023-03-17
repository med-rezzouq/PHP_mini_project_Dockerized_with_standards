<?php

namespace tests;

use App\Models\Donor;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    /**
     * Assert that Order methods work correctly.
     * @return void
     */
    public function testFillDonorData()
    {
        $donor = new Donor();
        $donor->setDonorName("Ahmed");

        $this->assertEquals($donor->getDonorName(), "Ahmed");
    }
}
