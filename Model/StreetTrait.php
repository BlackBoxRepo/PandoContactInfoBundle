<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\IdTrait;
use Doctrine\ORM\Mapping as ORM;

trait StreetTrait
{
    use IdTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var StreetTypeInterface
     *
     * @ORM\ManyToOne(targetEntity="StreetType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @var AddressInterface
     *
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="streets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $address;


    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function setType(StreetTypeInterface $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAddress()
    {
        return $this->address;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setAddress(AddressInterface $address)
    {
        $this->address = $address;
        
        return $this;
    }
}
