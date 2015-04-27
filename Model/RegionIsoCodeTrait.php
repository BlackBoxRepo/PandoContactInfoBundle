<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\IdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
trait RegionIsoCodeTrait
{
    use IdTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true, length=2)
     */
    private $alpha2Code;

    /**
     * @var RegionInterface
     *
     * @ORM\OneToOne(targetEntity="Region", inversedBy="regionIsoCode")
     * @ORM\JoinColumn(nullable=false, unique=true)
     */
    private $region;


    /**
     * {@inheritdoc}
     */
    public function getAlpha2Code()
    {
        return $this->alpha2Code;
    }

    /**
     * {@inheritdoc}
     */
    public function setAlpha2Code($alpha2Code)
    {
        $this->alpha2Code = $alpha2Code;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * {@inheritdoc}
     */
    public function setRegion(RegionInterface $region)
    {
        $this->region = $region;

        return $this;
    }
}
