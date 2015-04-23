<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\IdTrait;
use BlackBoxCode\Pando\Bundle\ContactInfoBundle\Exception\Entity\LifeCycle\OneAndOnlyOneException;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

trait RegionTrait
{
    use IdTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true)
     */
    private $name;

    /**
     * @var RegionIsoCodeInterface
     *
     * @ORM\OneToOne(targetEntity="RegionIsoCode", mappedBy="region")
     */
    private $regionIsoCode;

    /**
     * @var ArrayCollection<RegionZoneInterface>
     *
     * @ORM\ManyToMany(targetEntity="RegionZone", mappedBy="regions")
     */
    private $regionZones;

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRegionIsoCode()
    {
        return $this->regionIsoCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setRegionIsoCode(RegionIsoCodeInterface $regionIsoCode)
    {
        $this->regionIsoCode = $regionIsoCode;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRegionZones()
    {
        if (is_null($this->regionZones)) $this->regionZones = new ArrayCollection();

        return $this->regionZones;
    }

    /**
     * {@inheritdoc}
     */
    public function addRegionZone(RegionZoneInterface $regionZone)
    {
        if (is_null($this->regionZones)) $this->regionZones = new ArrayCollection();
        $this->regionZones->add($regionZone);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeRegionZone(RegionZoneInterface $regionZone)
    {
        if (is_null($this->regionZones)) $this->regionZones = new ArrayCollection();
        $this->regionZones->removeElement($regionZone);
    }

    /**
     * Returns all the RegionZones of type "Country" that the Region is attached to
     *
     * @return ArrayCollection<RegionZone>
     */
    private function getCountries()
    {
        return $this->getRegionZones()->filter(
            function($regionZone) {
                return $regionZone->getType()->getName() === RegionZoneTypeInterface::COUNTRY;
            }
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getCountry()
    {
        return $this->getCountries()->first() ?: null;
    }

    /**
     * {@inheritdoc}
     */
    public function checkOneAndOnlyOneCountry()
    {
        $countryCount = $this->getCountries()->count();
        if ($countryCount !== 1) {
            throw new OneAndOnlyOneException(
                sprintf(
                    'Region "%s" should belong to one and only one RegionZone of type "Country", %d given.',
                    $this->getName(),
                    $countryCount
                )
            );
        }
    }
}
