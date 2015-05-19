<?php
namespace BlackBoxCode\Pando\ContactInfoBundle\Model;

use BlackBoxCode\Pando\BaseBundle\Model\IdInterface;

interface RegionIsoCodeInterface extends IdInterface
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
     * @return RegionInterface
     */
    public function getRegion();

    /**
     * @param RegionInterface $region
     * @return $this
     */
    public function setRegion(RegionInterface $region);
}
