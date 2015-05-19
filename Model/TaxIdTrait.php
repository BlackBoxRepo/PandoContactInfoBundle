<?php
namespace BlackBoxCode\Pando\ContactInfoBundle\Model;

use BlackBoxCode\Pando\BaseBundle\Model\IdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
trait TaxIdTrait
{
    use IdTrait;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", unique=true)
     */
    private $number;
    
    /**
     * {@inheritdoc}
     */
    public function getNumber()
    {
        return $this->number;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setNumber($number)
    {
        $this->number = $number;
        
        return $this;
    }
}
