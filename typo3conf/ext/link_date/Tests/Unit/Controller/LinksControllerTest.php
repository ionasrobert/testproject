<?php

declare(strict_types=1);

namespace Rim\LinkDate\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 */
class LinksControllerTest extends UnitTestCase
{
    /**
     * @var \Rim\LinkDate\Controller\LinksController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Rim\LinkDate\Controller\LinksController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllLinksFromRepositoryAndAssignsThemToView(): void
    {
        $allLinks = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $linksRepository = $this->getMockBuilder(\Rim\LinkDate\Domain\Repository\LinksRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $linksRepository->expects(self::once())->method('findAll')->will(self::returnValue($allLinks));
        $this->subject->_set('linksRepository', $linksRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('links', $allLinks);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenLinksToView(): void
    {
        $links = new \Rim\LinkDate\Domain\Model\Links();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('links', $links);

        $this->subject->showAction($links);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenLinksToLinksRepository(): void
    {
        $links = new \Rim\LinkDate\Domain\Model\Links();

        $linksRepository = $this->getMockBuilder(\Rim\LinkDate\Domain\Repository\LinksRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $linksRepository->expects(self::once())->method('add')->with($links);
        $this->subject->_set('linksRepository', $linksRepository);

        $this->subject->createAction($links);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenLinksToView(): void
    {
        $links = new \Rim\LinkDate\Domain\Model\Links();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('links', $links);

        $this->subject->editAction($links);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenLinksInLinksRepository(): void
    {
        $links = new \Rim\LinkDate\Domain\Model\Links();

        $linksRepository = $this->getMockBuilder(\Rim\LinkDate\Domain\Repository\LinksRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $linksRepository->expects(self::once())->method('update')->with($links);
        $this->subject->_set('linksRepository', $linksRepository);

        $this->subject->updateAction($links);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenLinksFromLinksRepository(): void
    {
        $links = new \Rim\LinkDate\Domain\Model\Links();

        $linksRepository = $this->getMockBuilder(\Rim\LinkDate\Domain\Repository\LinksRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $linksRepository->expects(self::once())->method('remove')->with($links);
        $this->subject->_set('linksRepository', $linksRepository);

        $this->subject->deleteAction($links);
    }
}
