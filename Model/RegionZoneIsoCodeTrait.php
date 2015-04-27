<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model;

use BlackBoxCode\Pando\Bundle\BaseBundle\Model\IdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
trait RegionZoneIsoCodeTrait
{
    use IdTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true, length=2)
     */
    private $alpha2Code;

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true, length=3)
     */
    private $alpha3Code;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", unique=true, length=3, options={"unsigned":true})
     */
    private $numericCode;

    /**
     * @var RegionZoneInterface
     *
     * @ORM\OneToOne(targetEntity="RegionZone", inversedBy="regionZoneIsoCode")
     * @ORM\JoinColumn(nullable=false, unique=true)
     */
    private $regionZone;


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
    public function getAlpha3Code()
    {
        return $this->alpha3Code;
    }

    /**
     * {@inheritdoc}
     */
    public function setAlpha3Code($alpha3Code)
    {
        $this->alpha3Code = $alpha3Code;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getNumericCode()
    {
        return $this->numericCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setNumericCode($numericCode)
    {
        $this->numericCode = $numericCode;

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
