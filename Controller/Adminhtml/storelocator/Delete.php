<?php
namespace Emizentech\StoreLocator\Controller\Adminhtml\storelocator;
/**
 * @author Amit Samsukha <amit@emizentech.com>
 */
class Delete extends \Magento\Backend\App\Action
{
    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('storelocator_id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create('Emizentech\StoreLocator\Model\StoreLocator');
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccess(__('The Store has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['storelocator_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('We can\'t find a Store to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
