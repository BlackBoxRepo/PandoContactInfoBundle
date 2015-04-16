<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\HasIdTrait;
use Doctrine\ORM\Mapping as ORM;

trait RegionTrait
{
    use HasIdTrait;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="RegionIsoCode", mappedBy="region")
     */
    private $regionIsoCode;

    /**
     * @ORM\ManyToMany(targetEntity="RegionZone", mappedBy="region")
     */
    private $regionZones;
}
