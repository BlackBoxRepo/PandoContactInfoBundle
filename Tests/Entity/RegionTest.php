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

        $this->mRegionZoneType = $this->getMock('BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model\RegionZoneTypeInterface');
    }

    /**
     * @test
     */
    public function getCountry()
    {
        /** @var \PHPUnit_Framework_MockObject_MockObject|RegionZoneInterface $mShippingRegionZone */
        $mShippingRegionZone = $this->getMock('BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model\RegionZoneInterface');

        /** @var \PHPUnit_Framework_MockObject_MockObject|RegionZoneInterface $mCountryRegionZone */
        $mCountryRegionZone = clone $mShippingRegionZone;

        /** @var \PHPUnit_Framework_MockObject_MockObject|RegionZoneTypeInterface $mShippingRegionZoneType */
        $mShippingRegionZoneType = clone $this->mRegionZoneType;

        /** @var \PHPUnit_Framework_MockObject_MockObject|RegionZoneTypeInterface $mCountryRegionZoneType */
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
        /** @var \PHPUnit_Framework_MockObject_MockObject|RegionZoneInterface $mRegionZone */
        $mRegionZone = $this
            ->getMockBuilder('BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model\RegionZoneTrait')
            ->setMethods(['getType'])
            ->getMockForTrait();

        $this->mRegion
            ->expects($this->once())
            ->method('getRegionZones')
            ->willReturn(new ArrayCollection([$mRegionZone]))
        ;

        $mRegionZone
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
        /** @var \PHPUnit_Framework_MockObject_MockObject|RegionZoneInterface $mRegionZone */
        $mRegionZone = $this
            ->getMockBuilder('BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model\RegionZoneTrait')
            ->setMethods(['getType'])
            ->getMockForTrait();

        $this->mRegion
            ->expects($this->once())
            ->method('getRegionZones')
            ->willReturn(new ArrayCollection([$mRegionZone]))
        ;

        $mRegionZone
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
        /** @var \PHPUnit_Framework_MockObject_MockObject|RegionZoneInterface $mRegionZone1 */
        $mRegionZone1 = $this
            ->getMockBuilder('BlackBoxCode\Pando\Bundle\ContactInfoBundle\Model\RegionZoneTrait')
            ->setMethods(['getType'])
            ->getMockForTrait();

        /** @var \PHPUnit_Framework_MockObject_MockObject|RegionZoneInterface $mRegionZone2 */
        $mRegionZone2 = clone $mRegionZone1;

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