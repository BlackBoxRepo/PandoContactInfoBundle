<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\HasIdTrait;
use Doctrine\ORM\Mapping as ORM;

trait PhoneTrait
{
    use HasIdTrait;

    /**
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $number;

    /**
     * @ORM\ManyToOne(targetEntity="PhoneType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="RegionZone")
     * @ORM\JoinColumn(nullable=false)
     */
    private $regionZone;
}
