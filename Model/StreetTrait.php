<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\HasIdTrait;
use Doctrine\ORM\Mapping as ORM;

trait StreetTrait
{
    use HasIdTrait;

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
