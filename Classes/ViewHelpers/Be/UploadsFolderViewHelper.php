<?php

declare(strict_types=1);
namespace In2code\Powermail\ViewHelpers\Be;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

/**
 * Class UploadsFolderViewHelper
 */
class UploadsFolderViewHelper extends AbstractViewHelper
{
    /**
     * Upload Filder
     *
     * @var string
     */
    public $folder = 'uploads/tx_powermail/';

    /**
     * Check if uploads folder exists
     *
     * @return bool
     */
    public function render(): bool
    {
        $configurationManager = GeneralUtility::makeInstance(ConfigurationManager::class);
        $fullTypoScriptArray = $configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);

        $folder = $fullTypoScriptArray['plugin.']['tx_powermail.']['settings.']['setup.']['misc.']['file.']['folder'] ?? $this->folder;
        
        return file_exists(GeneralUtility::getFileAbsFileName($folder));
    }
}
