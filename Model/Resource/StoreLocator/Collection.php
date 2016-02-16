<?php
namespace Emizentech\StoreLocator\Model\Resource\StoreLocator;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Emizentech\StoreLocator\Model\StoreLocator', 'Emizentech\StoreLocator\Model\Resource\StoreLocator');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>