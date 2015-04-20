<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\IdInterface;
use Doctrine\Common\Collections\ArrayCollection;

interface RegionZoneInterface extends IdInterface
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
     * @return RegionZoneTypeInterface
     */
    public function getType();

    /**
     * @param RegionZoneTypeInterface $type
     * @return $this
     */
    public function setType(RegionZoneTypeInterface $type);

    /**
     * @return RegionZoneIsoCodeInterface
     */
    public function getRegionZoneIsoCode();

    /**
     * @param RegionZoneIsoCodeInterface $regionZoneIsoCode
     * @return $this
     */
    public function setRegionZoneIsoCode(RegionZoneIsoCodeInterface $regionZoneIsoCode);

    /**
     * @return ArrayCollection<RegionInterface>
     */
    public function getRegions();

    /**
     * @param RegionInterface $region
     * @return $this
     */
    public function addRegion(RegionInterface $region);

    /**
     * @param RegionInterface $region
     */
    public function removeRegion(RegionInterface $region);
}
