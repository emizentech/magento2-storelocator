<?php
namespace Emizentech\StoreLocator\Model\Resource;

class StoreLocator extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('storelocator', 'storelocator_id');
    }
}
?>