<?php
namespace BlackBoxCode\Pando\ContactInfoBundle\Model;

use BlackBoxCode\Pando\BaseBundle\Model\IdTrait;
use BlackBoxCode\Pando\ContactInfoBundle\Exception\Entity\LifeCycle\OneAndOnlyOneException;
use BlackBoxCode\Pando\ContactInfoBundle\Exception\Entity\TypeException;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
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
     * Returns all the RegionZones of given type that the Region is attached to
     *
     * @return ArrayCollection<RegionZone>
     */
    private function getRegionZonesByTypeName($typeName)
    {
        return $this->getRegionZones()->filter(
            function($regionZone) use ($typeName) {
                return $regionZone->getType()->getName() === $typeName;
            }
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getCountry()
    {
        return $this->getRegionZonesByTypeName(RegionZoneTypeInterface::COUNTRY)->first() ?: null;
    }

    /**
     * {@inheritdoc}
     */
    public function setCountry(RegionZoneInterface $country)
    {
        if ($country->getType()->getName() !== RegionZoneTypeInterface::COUNTRY) {
            throw new TypeException(sprintf('%s is not a country.', $country->getName()));
        }

        foreach ($this->getRegionZonesByTypeName(RegionZoneTypeInterface::COUNTRY) as $existingCountry) {
            $this->removeRegionZone($existingCountry);
        }

        $this->addRegionZone($country);

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     *
     * {@inheritdoc}
     */
    public function checkOneAndOnlyOneCountry()
    {
        $countryCount = $this->getRegionZonesByTypeName(RegionZoneTypeInterface::COUNTRY)->count();
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
