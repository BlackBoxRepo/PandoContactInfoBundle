<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\BaseTrait;
use Doctrine\ORM\Mapping as ORM;

trait TaxIdTrait
{
    use BaseTrait;

    /**
     * @ORM\Column(type="integer", unique=true)
     */
    private $number;
}
