<?php
namespace BlackBoxCode\Pando\ContactInfoBundle\Model;

use BlackBoxCode\Pando\BaseBundle\Model\IdInterface;

interface RegionZoneIsoCodeInterface extends IdInterface
{
    /**
     * @return string
     */
    public function getAlpha2Code();

    /**
     * @param string $alpha2Code
     * @return $this
     */
    public function setAlpha2Code($alpha2Code);

    /**
     * @return string
     */
    public function getAlpha3Code();

    /**
     * @param string $alpha3Code
     * @return $this
     */
    public function setAlpha3Code($alpha3Code);

    /**
     * @return integer
     */
    public function getNumericCode();

    /**
     * @param integer $numericCode
     * @return $this
     */
    public function setNumericCode($numericCode);

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
