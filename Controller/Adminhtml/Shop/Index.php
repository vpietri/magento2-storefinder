<?php
namespace ADM\StoreFinder\Controller\Adminhtml\Shop;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('ADM_StoreFinder::storefinder');
        $resultPage->addBreadcrumb(__('ADM StoreFinder Shops'), __('ADM StoreFinder Shops'));
        $resultPage->addBreadcrumb(__('Manage ADM StoreFinder Shops'), __('Manage ADM StoreFinder Shops'));
        $resultPage->getConfig()->getTitle()->prepend(__('ADM StoreFinder Shops'));

        return $resultPage;
    }

    /**
     * Is the user allowed to view the ADM_StoreFinder shop grid.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('ADM_StoreFinder::shop');
    }


}
