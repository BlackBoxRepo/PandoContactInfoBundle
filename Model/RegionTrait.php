<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\BaseTrait;
use Doctrine\ORM\Mapping as ORM;

trait RegionTrait
{
    use BaseTrait;

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
