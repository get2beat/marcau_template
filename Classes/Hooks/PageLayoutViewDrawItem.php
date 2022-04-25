<?php
namespace Marcau\MarcauTemplate\Hooks;

use TYPO3\CMS\Backend\Form\Exception;
use TYPO3\CMS\Backend\Form\FormDataCompiler;
use TYPO3\CMS\Backend\Form\FormDataGroup\TcaDatabaseRecord;
use TYPO3\CMS\Backend\View\PageLayoutView;
use TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;


class PageLayoutViewDrawItem implements PageLayoutViewDrawItemHookInterface
{
    /**
     * @var array
     */
    protected $supportedContentTypes = [
    'modul_text' => 'Text',
        'modul_header' => 'Header',
        'modul_bildtext' => 'BildText',
        'modul_trennlinie' => 'Trennlinie',
        'modul_galerieslider' => 'GalerieSlider',
        'modul_galeriekarussell' => 'GalerieKarussell',
        'modul_topslider' => 'TopSlider',
        'modul_accordion' => 'Accordion',
        ];

    /**
     * @var StandaloneView
     */
    protected $view;

    public function __construct(StandaloneView $view = null)
    {
        $this->view = $view ?: GeneralUtility::makeInstance(StandaloneView::class);
    }


    /**
     * Preprocesses the preview rendering of a content element.
     *
     * @param PageLayoutView $parentObject
     * @param bool $drawItem
     * @param string $headerContent
     * @param string $itemContent
     * @param array $row
     */
    public function preProcess(PageLayoutView &$parentObject, &$drawItem, &$headerContent, &$itemContent, array &$row)
    {
        if (!isset($this->supportedContentTypes[$row['CType']])) {
            return;
        }

        $formDataGroup = GeneralUtility::makeInstance(TcaDatabaseRecord::class);
        $formDataCompiler = GeneralUtility::makeInstance(FormDataCompiler::class, $formDataGroup);
        $formDataCompilerInput = [
            'command' => 'edit',
            'tableName' => 'tt_content',
            'vanillaUid' => (int)$row['uid'],
        ];
        try {

            $result = $formDataCompiler->compile($formDataCompilerInput);
            $processedRow = $this->getProcessedData($result['databaseRow'], $result['processedTca']['columns']);

            //\TYPO3\CMS\Core\Utility\DebugUtility::debug($result,'PageLayoutViewDrawItem');

            $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\Extbase\\Object\\ObjectManager');
            $configurationManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager');
            $extbaseFrameworkConfiguration = $configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
            $settings['settings']['page'] = $extbaseFrameworkConfiguration['tt_content.']['modul_text.']['settings.']['page.'];

            //\TYPO3\CMS\Core\Utility\DebugUtility::debug($extbaseFrameworkConfiguration,'PageLayoutViewDrawItem');

            $this->configureView($result['pageTsConfig'], $row['CType']);
            $this->view->assignMultiple(
                [
                    'settings' => $settings['settings'],
                    'row' => $row,
                    'processedRow' => $processedRow,
                ]
            );

            $itemContent = $this->view->render();
        } catch (Exception $exception) {
            $message = $GLOBALS['BE_USER']->errorMsg;
            if (empty($message)) {
                $message = $exception->getMessage() . ' ' . $exception->getCode();
            }

            $itemContent = $message;
        }

        $drawItem = false;
    }

    /**
     * @param array $pageTsConfig
     * @param string $contentType
     */
    protected function configureView(array $pageTsConfig, $contentType)
    {
        if (empty($pageTsConfig['mod.']['web_layout.']['tt_content.']['preview.'])) {
            return;
        }

        $previewConfiguration = $pageTsConfig['mod.']['web_layout.']['tt_content.']['preview.'];
        list($extensionKey) = explode('_', $contentType, 2);
        $extensionKey .= '.';
        if (!empty($previewConfiguration[$extensionKey]['templateRootPath'])) {
            $this->view->setTemplateRootPaths([
                'EXT:marcau_template/Resources/Private/Backend/Templates/',
                $previewConfiguration[$extensionKey]['templateRootPath'],
            ]);
        }
        if (!empty($previewConfiguration[$extensionKey]['layoutRootPath'])) {
            $this->view->setLayoutRootPaths([
                $previewConfiguration[$extensionKey]['layoutRootPath'],
            ]);
        }
        if (!empty($previewConfiguration[$extensionKey]['partialRootPath'])) {
            $this->view->setPartialRootPaths([
                $previewConfiguration[$extensionKey]['partialRootPath'],
            ]);
        }
        $this->view->setTemplate($this->supportedContentTypes[$contentType]);
    }

    /**
     * @param array $databaseRow
     * @param array $processedTcaColumns
     * @return array
     */
    protected function getProcessedData(array $databaseRow, array $processedTcaColumns)
    {
        $processedRow = $databaseRow;
        foreach ($processedTcaColumns as $field => $config) {
            if (!isset($config['children'])) {
                continue;
            }
            $processedRow[$field] = [];
            foreach ($config['children'] as $child) {
                if (!$child['isInlineChildExpanded']) {
                    $formDataGroup = GeneralUtility::makeInstance(TcaDatabaseRecord::class);
                    $formDataCompiler = GeneralUtility::makeInstance(FormDataCompiler::class, $formDataGroup);
                    $formDataCompilerInput = [
                        'command' => 'edit',
                        'tableName' => $child['tableName'],
                        'vanillaUid' => $child['vanillaUid'],
                    ];
                    $child = $formDataCompiler->compile($formDataCompilerInput);
                }
                $processedRow[$field][] = $this->getProcessedData($child['databaseRow'], $child['processedTca']['columns']);
            }
        }

        return $processedRow;
    }
}
