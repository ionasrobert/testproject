<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'LinkDate',
        'web',
        'linkdate',
        '',
        [
            \Rim\LinkDate\Controller\LinksController::class => 'index, list, show, new, create, edit, update, delete',
        ],
        [
            'access' => 'user,group',
            'icon'   => 'EXT:link_date/Resources/Public/Icons/user_mod_linkdate.svg',
            'labels' => 'LLL:EXT:link_date/Resources/Private/Language/locallang_linkdate.xlf',
        ]
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_linkdate_domain_model_links', 'EXT:link_date/Resources/Private/Language/locallang_csh_tx_linkdate_domain_model_links.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_linkdate_domain_model_links');
})();
