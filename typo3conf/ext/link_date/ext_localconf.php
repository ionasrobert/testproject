<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'LinkDate',
        'Linkdate',
        [
            \Rim\LinkDate\Controller\LinksController::class => 'index, list, show, new, create, edit, update, delete'
        ],
        // non-cacheable actions
        [
            \Rim\LinkDate\Controller\LinksController::class => 'create, update, delete'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    linkdate {
                        iconIdentifier = link_date-plugin-linkdate
                        title = LLL:EXT:link_date/Resources/Private/Language/locallang_db.xlf:tx_link_date_linkdate.name
                        description = LLL:EXT:link_date/Resources/Private/Language/locallang_db.xlf:tx_link_date_linkdate.description
                        tt_content_defValues {
                            CType = list
                            list_type = linkdate_linkdate
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
