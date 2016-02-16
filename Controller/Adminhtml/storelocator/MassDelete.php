<?php
namespace Emizentech\StoreLocator\Controller\Adminhtml\storelocator;

use Magento\Backend\App\Action;

/**
 * Class MassDelete
 */
class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $itemIds = $this->getRequest()->getParam('storelocator');
        if (!is_array($itemIds) || empty($itemIds)) {
            $this->messageManager->addError(__('Please select Store(s).'));
        } else {
            try {
                foreach ($itemIds as $itemId) {
                    $post = $this->_objectManager->get('Emizentech\StoreLocator\Model\StoreLocator')->load($itemId);
                    $post->delete();
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 Store(s) have been deleted.', count($itemIds))
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        return $this->resultRedirectFactory->create()->setPath('storelocator/*/index');
    }
}
