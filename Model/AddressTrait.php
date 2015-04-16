<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\BaseTrait;
use Doctrine\ORM\Mapping as ORM;

trait AddressTrait
{
    use BaseTrait;

    /**
     * @ORM\Column(type="string")
     */
    private $city;

    /**
     * @ORM\Column(type="string")
     */
    private $postcode;

    /**
     * @ORM\OneToMany(targetEntity="Street", mappedBy="address")
     */
    private $streets;

    /**
     * @ORM\ManyToOne(targetEntity="Region")
     * @ORM\JoinColumn(nullable=false)
     */
    private $region;

    /**
     * @ORM\ManyToOne(targetEntity="AddressType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;
}
