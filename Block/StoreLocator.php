<?php
namespace Emizentech\StoreLocator\Block;
/**
 * @author Amit Samsukha <amit@emizentech.com>
 */
class StoreLocator extends \Magento\Framework\View\Element\Template
{
	/**
     * @var \Emizentech\StoreLocator\Model\storelocatorFactory
     */
    protected $_storelocatorFactory;
    protected $_status;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
         \Emizentech\StoreLocator\Model\StoreLocatorFactory $storelocatorFactory,
        \Emizentech\StoreLocator\Model\Status $status
    ) 
    {
    	 $this->_storelocatorFactory = $storelocatorFactory;
    	 $this->_status = $status;
        parent::__construct($context);
    }
    
    
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
    
    public function getAllStores()
    {
        $collection = $this->_storelocatorFactory->create()->getCollection();
        return $collection;
    }
}
