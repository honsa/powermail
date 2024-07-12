<?php

declare(strict_types=1);
namespace In2code\Powermail\ViewHelpers\Be;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Configuration\Exception\InvalidConfigurationTypeException;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class UploadsFolderViewHelper
 */
class UploadsFolderPathViewHelper extends AbstractViewHelper
{
    /**
     * Upload Folder
     *
     * @var string
     */
    public string $folder = 'uploads/tx_powermail/';

    /**
     * Check if uploads folder exists
     *
     * @return string
     * @throws InvalidConfigurationTypeException
     */
    public function render(): string
    {
        $configurationManager = GeneralUtility::makeInstance(ConfigurationManager::class);
        $fullTypoScriptArray = $configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);

        return $fullTypoScriptArray['plugin.']['tx_powermail.']['settings.']['setup.']['misc.']['file.']['folder'] ?? $this->folder;
    }
}
