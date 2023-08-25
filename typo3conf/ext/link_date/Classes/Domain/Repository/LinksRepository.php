<?php

declare(strict_types=1);

namespace Rim\LinkDate\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * This file is part of the "LinkDate" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023
 */

/**
 * The repository for Links
 */
class LinksRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function getCurrentMonthLinks()
    {
        $currentMonth = date('n');
        $query = $this->createQuery();
        $query->matching(
            $query->like('month', $currentMonth . '%')
        );
        $query->setLimit(1); // Set the limit to retrieve only one record
        $query->setOrderings(['month' => QueryInterface::ORDER_DESCENDING]); // Optional: Order by date descending
        return $query->execute();
    }
}
