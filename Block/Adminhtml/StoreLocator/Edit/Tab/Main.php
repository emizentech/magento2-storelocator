<?php

namespace Emizentech\StoreLocator\Block\Adminhtml\StoreLocator\Edit\Tab;

/**
 * StoreLocator edit form main tab
 */
 /**
 * @author Amit Samsukha <amit@emizentech.com>
 */
class Main extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @var \Magento\Cms\Model\Wysiwyg\Config
     */
    protected $_wysiwygConfig;

    /**
     * @var \Emizentech\StoreLocator\Model\Status
     */
    protected $_status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Emizentech\StoreLocator\Model\Status $status,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_status = $status;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        /* @var $model \Emizentech\StoreLocator\Model\BlogPosts */
        $model = $this->_coreRegistry->registry('storelocator');

        $isElementDisabled = false;

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Store Information')]);

        if ($model->getId()) {
            $fieldset->addField('storelocator_id', 'hidden', ['name' => 'storelocator_id']);
        }

        $fieldset->addField(
            'title',
            'text',
            [
                'name' => 'title',
                'label' => __('Title'),
                'title' => __('Title'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );

      //   $wysiwygConfig = $this->_wysiwygConfig->getConfig(['tab_id' => $this->getTabId()]);
// 
//         $contentField = $fieldset->addField(
//             'content',
//             'editor',
//             [
//                 'name' => 'content',
//                 'style' => 'height:36em;',
//                 'required' => true,
//                 'disabled' => $isElementDisabled,
//                 'config' => $wysiwygConfig
//             ]
//         );
// 
//         // Setting custom renderer for content field to remove label column
//         $renderer = $this->getLayout()->createBlock(
//             'Magento\Backend\Block\Widget\Form\Renderer\Fieldset\Element'
//         )->setTemplate(
//             'Magento_Cms::page/edit/form/renderer/content.phtml'
//         );
//         $contentField->setRenderer($renderer);


        $dateFormat = $this->_localeDate->getDateFormat(
            \IntlDateFormatter::SHORT
        );

//         $fieldset->addField(
//             'publish_date',
//             'date',
//             [
//                 'name' => 'publish_date',
//                 'label' => __('Publish Date'),
//                 'date_format' => $dateFormat,
//                 'disabled' => $isElementDisabled,
//                 'class' => 'validate-date validate-date-range date-range-custom_theme-from'
//             ]
//         );

		$fieldset->addField(
            'address',
            'textarea',
            [
                'name' => 'address',
                'label' => __('Address'),
                'title' => __('Address'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );
        
      //   $fieldset->addField(
//             'zoomlevel',
//             'text',
//             [
//                 'name' => 'zoomlevel',
//                 'label' => __('Zoom Level'),
//                 'title' => __('Zoom Level'),
//                 'required' => true,
//                 'disabled' => $isElementDisabled
//             ]
//         );
//         
        $fieldset->addField(
            'latitude',
            'text',
            [
                'name' => 'latitude',
                'label' => __('Latitude'),
                'title' => __('Latitude'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );
        
        $fieldset->addField(
            'longitude',
            'text',
            [
                'name' => 'longitude',
                'label' => __('Longitude'),
                'title' => __('Longitude'),
                'required' => true,
                'disabled' => $isElementDisabled
            ]
        );
        
     
		
        $fieldset->addField(
            'is_active',
            'select',
            [
                'label' => __('Status'),
                'title' => __('Status'),
                'name' => 'is_active',
                'required' => true,
                'options' => $this->_status->getOptionArray(),
                'disabled' => $isElementDisabled
            ]
        );
        if (!$model->getId()) {
            $model->setData('is_active', $isElementDisabled ? '0' : '1');
        }

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Store Information');
    }

    /**
     * Prepare title for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Store Information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
