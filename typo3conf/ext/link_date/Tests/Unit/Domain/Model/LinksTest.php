<?php

declare(strict_types=1);

namespace Rim\LinkDate\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class LinksTest extends UnitTestCase
{
    /**
     * @var \Rim\LinkDate\Domain\Model\Links|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Rim\LinkDate\Domain\Model\Links::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getUrlReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getUrl()
        );
    }

    /**
     * @test
     */
    public function setUrlForStringSetsUrl(): void
    {
        $this->subject->setUrl('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('url'));
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName(): void
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('name'));
    }

    /**
     * @test
     */
    public function getMonthReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getMonth()
        );
    }

    /**
     * @test
     */
    public function setMonthForIntSetsMonth(): void
    {
        $this->subject->setMonth('12');

        self::assertEquals('12', $this->subject->_get('month'));
    }
}
