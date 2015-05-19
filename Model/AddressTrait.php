<?php
namespace BlackBoxCode\Pando\ContactInfoBundle\Model;

use BlackBoxCode\Pando\BaseBundle\Model\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(indexes={
 *     @ORM\Index(columns={"city"}),
 *     @ORM\Index(columns={"postcode"})
 * })
 */
trait AddressTrait
{
    use IdTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $postcode;

    /**
     * @var AddressTypeInterface
     *
     * @ORM\ManyToOne(targetEntity="AddressType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @var ArrayCollection<StreetInterface>
     *
     * @ORM\OneToMany(targetEntity="Street", mappedBy="address")
     */
    private $streets;

    /**
     * @var RegionInterface
     *
     * @ORM\ManyToOne(targetEntity="Region")
     * @ORM\JoinColumn(nullable=false)
     */
    private $region;


    /**
     * {@inheritdoc}
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * {@inheritdoc}
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * {@inheritdoc}
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function setType(AddressTypeInterface $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getStreets()
    {
        if (is_null($this->streets)) $this->streets = new ArrayCollection();

        return $this->streets;
    }

    /**
     * {@inheritdoc}
     */
    public function addStreet(StreetInterface $street)
    {
        if (is_null($this->streets)) $this->streets = new ArrayCollection();
        $this->streets->add($street);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeStreet(StreetInterface $street)
    {
        if (is_null($this->streets)) $this->streets = new ArrayCollection();
        $this->streets->removeElement($street);
    }

    /**
     * {@inheritdoc}
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * {@inheritdoc}
     */
    public function setRegion(RegionInterface $region)
    {
        $this->region = $region;

        return $this;
    }
}
