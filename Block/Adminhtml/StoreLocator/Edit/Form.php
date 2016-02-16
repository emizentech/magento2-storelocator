<?php

namespace Emizentech\StoreLocator\Block\Adminhtml\StoreLocator\Edit;

/**
 * Adminhtml storelocator edit form block
 *
 * @author Amit Samsukha <amit@emizentech.com>
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{     
    protected function _construct()
    {
        parent::_construct();
        $this->setId('emizentech_storelocator_form');
        $this->setTitle(__('Store Information'));
    }


    protected function _prepareForm()
    {
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
