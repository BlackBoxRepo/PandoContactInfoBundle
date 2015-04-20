<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\IdInterface;

interface PhoneInterface extends IdInterface
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

    /**
     * @return PhoneTypeInterface
     */
    public function getType();

    /**
     * @param PhoneTypeInterface $type
     * @return $this
     */
    public function setType(PhoneTypeInterface $type);

    /**
     * @return RegionZoneInterface
     */
    public function getRegionZone();

    /**
     * @param RegionZoneInterface $regionZone
     * @return $this
     */
    public function setRegionZone(RegionZoneInterface $regionZone);
}
