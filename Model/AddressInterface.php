<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\IdInterface;
use Doctrine\Common\Collections\ArrayCollection;

interface AddressInterface extends IdInterface
{
    /**
     * @return string
     */
    public function getCity();

    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city);

    /**
     * @return string
     */
    public function getPostcode();

    /**
     * @param string $postcode
     * @return $this
     */
    public function setPostcode($postcode);

    /**
     * @return AddressTypeInterface
     */
    public function getType();

    /**
     * @param AddressTypeInterface $type
     * @return $this
     */
    public function setType(AddressTypeInterface $type);

    /**
     * @return ArrayCollection<StreetInterface>
     */
    public function getStreets();

    /**
     * @param StreetInterface $street
     * @return $this
     */
    public function addStreet(StreetInterface $street);

    /**
     * @param StreetInterface $street
     */
    public function removeStreet(StreetInterface $street);

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
