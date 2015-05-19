<?php
namespace BlackBoxCode\Pando\ContactInfoBundle\Model;

use BlackBoxCode\Pando\BaseBundle\Model\IdInterface;

interface TaxIdInterface extends IdInterface
{
    /**
     * @return integer
     */
    public function getNumber();

    /**
     * @param integer $number
     * @return $this
     */
    public function setNumber($number);
}
