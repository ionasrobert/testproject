<?php

declare(strict_types=1);

namespace Rim\LinkDate\Controller;


/**
 * This file is part of the "LinkDate" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023
 */

/**
 * LinksController
 */
class LinksController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * linksRepository
     *
     * @var \Rim\LinkDate\Domain\Repository\LinksRepository
     */
    protected $linksRepository = null;

    /**
     * @param \Rim\LinkDate\Domain\Repository\LinksRepository $linksRepository
     */
    public function injectLinksRepository(\Rim\LinkDate\Domain\Repository\LinksRepository $linksRepository)
    {
        $this->linksRepository = $linksRepository;
    }

    /**
     * action index
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function indexAction(): \Psr\Http\Message\ResponseInterface
    {
        $currentMonthLinks = $this->linksRepository->getCurrentMonthLinks();
        $this->view->assign('header','');
        $this->view->assign('name','');
        $this->view->assign('url','');
        $this->view->assign('links', null);
        if (count($currentMonthLinks)) {
            $this->view->assign('header','Link of the month');
            $this->view->assign('name', $currentMonthLinks[0]->getName());
            $this->view->assign('url', $currentMonthLinks[0]->getUrl());

        }


        return $this->htmlResponse();
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $links = $this->linksRepository->findAll();
        $this->view->assign('links', $links);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Rim\LinkDate\Domain\Model\Links $links
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Rim\LinkDate\Domain\Model\Links $links): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('links', $links);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action create
     *
     * @param \Rim\LinkDate\Domain\Model\Links $newLinks
     */
    public function createAction(\Rim\LinkDate\Domain\Model\Links $newLinks)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->linksRepository->add($newLinks);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Rim\LinkDate\Domain\Model\Links $links
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("links")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\Rim\LinkDate\Domain\Model\Links $links): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('links', $links);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \Rim\LinkDate\Domain\Model\Links $links
     */
    public function updateAction(\Rim\LinkDate\Domain\Model\Links $links)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->linksRepository->update($links);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Rim\LinkDate\Domain\Model\Links $links
     */
    public function deleteAction(\Rim\LinkDate\Domain\Model\Links $links)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->linksRepository->remove($links);
        $this->redirect('list');
    }
}
