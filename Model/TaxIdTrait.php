<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\HasIdTrait;
use Doctrine\ORM\Mapping as ORM;

trait TaxIdTrait
{
    use HasIdTrait;

    /**
     * @ORM\Column(type="integer", unique=true)
     */
    private $number;
}
