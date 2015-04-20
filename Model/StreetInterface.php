<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\IdInterface;

interface StreetInterface extends IdInterface
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
     * @return StreetTypeInterface
     */
    public function getType();

    /**
     * @param StreetTypeInterface $type
     * @return $this
     */
    public function setType(StreetTypeInterface $type);

    /**
     * @return AddressInterface
     */
    public function getAddress();

    /**
     * @param AddressInterface $address
     * @return $this
     */
    public function setAddress(AddressInterface $address);
}
