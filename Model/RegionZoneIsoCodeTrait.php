<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\BaseTrait;
use Doctrine\ORM\Mapping as ORM;

trait RegionZoneIsoCodeTrait
{
    use BaseTrait;

    /**
     * @ORM\Column(type="string", unique=true, length=2)
     */
    private $alpha2Code;

    /**
     * @ORM\Column(type="string", unique=true, length=3)
     */
    private $alpha3Code;

    /**
     * @ORM\Column(type="integer", unique=true, length=3, options={"unsigned":true})
     */
    private $numericCode;

    /**
     * @ORM\OneToOne(targetEntity="RegionZone", inversedBy="regionZoneIsoCode")
     * @ORM\JoinColumn(nullable=false, unique=true)
     */
    private $regionZone;
}
