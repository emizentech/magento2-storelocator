<?php
namespace Emizentech\StoreLocator\Block\Adminhtml\StoreLocator\Edit;

/**
 * Admin page left menu
 */
 /**
 * @author Amit Samsukha <amit@emizentech.com>
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('storelocator_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Store Information'));
    }
}
