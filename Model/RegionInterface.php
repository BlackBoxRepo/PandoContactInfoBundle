<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\IdInterface;
use Doctrine\Common\Collections\ArrayCollection;

interface RegionInterface extends IdInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * @return RegionIsoCodeInterface
     */
    public function getRegionIsoCode();

    /**
     * @param RegionIsoCodeInterface $regionIsoCode
     * @return $this
     */
    public function setRegionIsoCode(RegionIsoCodeInterface $regionIsoCode);

    /**
     * @return ArrayCollection<RegionZoneInterface>
     */
    public function getRegionZones();

    /**
     * @param RegionZoneInterface $regionZone
     * @return $this
     */
    public function addRegionZone(RegionZoneInterface $regionZone);

    /**
     * @param RegionZoneInterface $regionZone
     */
    public function removeRegionZone(RegionZoneInterface $regionZone);
}
