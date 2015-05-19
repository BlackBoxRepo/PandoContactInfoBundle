<?php
namespace BlackBoxCode\Pando\ContactInfoBundle\Model;

use BlackBoxCode\Pando\BaseBundle\Model\IdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
trait RegionZoneTrait
{
    use IdTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true)
     */
    private $name;

    /**
     * @var PhoneTypeInterface
     *
     * @ORM\ManyToOne(targetEntity="PhoneType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @var RegionZoneIsoCodeInterface
     *
     * @ORM\OneToOne(targetEntity="RegionZoneIsoCode", mappedBy="regionZone")
     */
    private $regionZoneIsoCode;

    /**
     * @var ArrayCollection<RegionInterface>
     *
     * @ORM\ManyToMany(targetEntity="Region", inversedBy="regionZones")
     * @ORM\JoinTable(
     *     joinColumns={@ORM\JoinColumn(nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(nullable=false)}
     * )
     */
    private $regions;
    
    
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function setType(RegionZoneTypeInterface $type)
    {
        $this->type = $type;

        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getRegionZoneIsoCode()
    {
        return $this->regionZoneIsoCode;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setRegionZoneIsoCode(RegionZoneIsoCodeInterface $regionZoneIsoCode)
    {
        $this->regionZoneIsoCode = $regionZoneIsoCode;
        
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRegions()
    {
        if (is_null($this->regions)) $this->regions = new ArrayCollection();

        return $this->regions;
    }

    /**
     * {@inheritdoc}
     */
    public function addRegion(RegionInterface $region)
    {
        if (is_null($this->regions)) $this->regions = new ArrayCollection();
        $this->regions->add($region);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeRegion(RegionInterface $region)
    {
        if (is_null($this->regions)) $this->regions = new ArrayCollection();
        $this->regions->removeElement($region);
    }
}
