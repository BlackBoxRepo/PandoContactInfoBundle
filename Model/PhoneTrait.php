<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\IdTrait;
use Doctrine\ORM\Mapping as ORM;

trait PhoneTrait
{
    use IdTrait;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", options={"unsigned":true})
     */
    private $number;

    /**
     * @var PhoneTypeInterface
     *
     * @ORM\ManyToOne(targetEntity="PhoneType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @var RegionZoneInterface
     *
     * @ORM\ManyToOne(targetEntity="RegionZone")
     * @ORM\JoinColumn(nullable=false)
     */
    private $regionZone;


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
    public function setType(PhoneTypeInterface $type)
    {
        $this->type = $type;

        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getRegionZone()
    {
        return $this->regionZone;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setRegionZone(RegionZoneInterface $regionZone)
    {
        $this->regionZone = $regionZone;
        
        return $this;
    }
}
