<?php
namespace BlackBoxCode\Pando\Bundle\ContactInfoBundle\Tests\Entity;

use BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model\RegionInterface;
use BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model\RegionZoneInterface;
use BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model\RegionZoneTypeInterface;
use Doctrine\Common\Collections\ArrayCollection;

class RegionTest extends \PHPUnit_Framework_TestCase
{
    /** @var \PHPUnit_Framework_MockObject_MockObject|RegionInterface */
    private $mRegion;

    /** @var \PHPUnit_Framework_MockObject_MockObject|RegionZoneInterface */
    private $mRegionZone;

    /** @var \PHPUnit_Framework_MockObject_MockObject|RegionZoneTypeInterface */
    private $mRegionZoneType;

    public function setUp()
    {
        $this->mRegion = $this
            ->getMockBuilder('BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model\RegionTrait')
            ->setMethods(['getRegionZones'])
            ->getMockForTrait()
        ;
        $this->mRegion->setName('Colorado');

        $this->mRegionZone = $this->getMock('BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model\RegionZoneInterface');
        $this->mRegionZoneType = $this->getMock('BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model\RegionZoneTypeInterface');
    }

    /**
     * @test
     */
    public function getCountry()
    {
        $mShippingRegionZone = clone $this->mRegionZone;
        $mCountryRegionZone = clone $mShippingRegionZone;
        $mShippingRegionZoneType = clone $this->mRegionZoneType;
        $mCountryRegionZoneType = clone $this->mRegionZoneType;

        $this->mRegion
            ->expects($this->once())
            ->method('getRegionZones')
            ->willReturn(new ArrayCollection([$mShippingRegionZone, $mCountryRegionZone]))
        ;

        $mShippingRegionZone
            ->expects($this->once())
            ->method('getType')
            ->willReturn($mShippingRegionZoneType)
        ;

        $mCountryRegionZone
            ->expects($this->once())
            ->method('getType')
            ->willReturn($mCountryRegionZoneType)
        ;

        $mShippingRegionZoneType
            ->expects($this->once())
            ->method('getName')
            ->willReturn(RegionZoneTypeInterface::SHIPPING)
        ;

        $mCountryRegionZoneType
            ->expects($this->once())
            ->method('getName')
            ->willReturn(RegionZoneTypeInterface::COUNTRY)
        ;

        $country = $this->mRegion->getCountry();
        $this->assertInstanceOf('BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model\RegionZoneInterface', $country);
        $this->assertSame($mCountryRegionZone, $country);
    }

    /**
     * @test
     */
    public function checkOneAndOnlyOneCountry_hasOne()
    {
        $this->mRegion
            ->expects($this->once())
            ->method('getRegionZones')
            ->willReturn(new ArrayCollection([$this->mRegionZone]))
        ;

        $this->mRegionZone
            ->expects($this->once())
            ->method('getType')
            ->willReturn($this->mRegionZoneType)
        ;

        $this->mRegionZoneType
            ->expects($this->once())
            ->method('getName')
            ->willReturn(RegionZoneTypeInterface::COUNTRY)
        ;

        $this->mRegion->checkOneAndOnlyOneCountry();
    }

    /**
     * @test
     * @expectedException BlackBoxCode\Pando\Bundle\ContactInfoBundle\Exception\Entity\LifeCycle\OneAndOnlyOneException
     */
    public function checkOneAndOnlyOneCountry_hasNone()
    {
        $this->mRegion
            ->expects($this->once())
            ->method('getRegionZones')
            ->willReturn(new ArrayCollection([$this->mRegionZone]))
        ;

        $this->mRegionZone
            ->expects($this->once())
            ->method('getType')
            ->willReturn($this->mRegionZoneType)
        ;

        $this->mRegionZoneType
            ->expects($this->once())
            ->method('getName')
            ->willReturn(RegionZoneTypeInterface::SHIPPING)
        ;

        $this->mRegion->checkOneAndOnlyOneCountry();
    }

    /**
     * @test
     * @expectedException BlackBoxCode\Pando\Bundle\ContactInfoBundle\Exception\Entity\LifeCycle\OneAndOnlyOneException
     */
    public function checkOneAndOnlyOneCountry_hasMany()
    {
        $mRegionZone1 = clone $this->mRegionZone;
        $mRegionZone2 = clone $this->mRegionZone;

        $this->mRegion
            ->expects($this->once())
            ->method('getRegionZones')
            ->willReturn(new ArrayCollection([$mRegionZone1, $mRegionZone2]))
        ;

        $mRegionZone1
            ->expects($this->once())
            ->method('getType')
            ->willReturn($this->mRegionZoneType)
        ;

        $mRegionZone2
            ->expects($this->once())
            ->method('getType')
            ->willReturn($this->mRegionZoneType)
        ;

        $this->mRegionZoneType
            ->expects($this->exactly(2))
            ->method('getName')
            ->willReturn(RegionZoneTypeInterface::COUNTRY)
        ;

        $this->mRegion->checkOneAndOnlyOneCountry();
    }
}