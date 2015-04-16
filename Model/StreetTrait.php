<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\BaseTrait;
use Doctrine\ORM\Mapping as ORM;

trait StreetTrait
{
    use BaseTrait;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="StreetType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="streets")
     * @ORM\JoinColumn(nullable=false)
     **/
    private $address;
}
