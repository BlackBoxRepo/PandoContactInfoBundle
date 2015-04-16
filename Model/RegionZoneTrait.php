<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\HasIdTrait;
use Doctrine\ORM\Mapping as ORM;

trait RegionZoneTrait
{
    use HasIdTrait;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="RegionZoneIsoCode", mappedBy="region")
     */
    private $regionZoneIsoCode;

    /**
     * @ORM\ManyToMany(targetEntity="Region", inversedBy="regionZones")
     * @ORM\JoinTable(
     *     joinColumns={@ORM\JoinColumn(nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(nullable=false)}
     * )
     */
    private $regions;
}
