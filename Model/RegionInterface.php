<?php
namespace BlackBoxCode\Pando\ContactInfoBundle\Model;

use BlackBoxCode\Pando\BaseBundle\Model\IdInterface;
use BlackBoxCode\Pando\ContactInfoBundle\Exception\Entity\LifeCycle\OneAndOnlyOneException;
use BlackBoxCode\Pando\ContactInfoBundle\Exception\Entity\TypeException;
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

    /**
     * Gets the RegionZone of type "Country"
     *
     * @return RegionZoneInterface
     */
    public function getCountry();

    /**
     * @param RegionZoneInterface $country
     * @throws TypeException if RegionZone is not a Country
     * @return $this
     */
    public function setCountry(RegionZoneInterface $country);

    /**
     * Checks if the Region belongs to only one country and throws an exception if not
     *
     * @throws OneAndOnlyOneException
     */
    public function checkOneAndOnlyOneCountry();
}
