<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\BaseTrait;
use Doctrine\ORM\Mapping as ORM;

trait RegionIsoCodeTrait
{
    use BaseTrait;

    /**
     * @ORM\Column(type="string", unique=true, length=2)
     */
    private $alpha2Code;

    /**
     * @ORM\OneToOne(targetEntity="Region", inversedBy="regionIsoCode")
     * @ORM\JoinColumn(nullable=false, unique=true)
     */
    private $region;
}
