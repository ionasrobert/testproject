<?php

declare(strict_types=1);

namespace Rim\LinkDate\Domain\Model;


/**
 * This file is part of the "LinkDate" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023
 */

/**
 * Links
 */
class Links extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * url
     *
     * @var string
     */
    protected $url = null;

    /**
     * name
     *
     * @var string
     */
    protected $name = null;

    /**
     * month
     *
     * @var string
     */
    protected $month = null;

    /**
     * Returns the url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the url
     *
     * @param string $url
     * @return void
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the month
     *
     * @return string month
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Sets the month
     *
     * @param string $month
     * @return void
     */
    public function setMonth(string $month)
    {
        $this->month = $month;
    }
}
