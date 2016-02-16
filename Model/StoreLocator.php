<?php
namespace Emizentech\StoreLocator\Model;

class StoreLocator extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Emizentech\StoreLocator\Model\Resource\StoreLocator');
    }
}
?>