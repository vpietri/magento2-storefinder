<?php
namespace ADM\StoreFinder\Controller\Adminhtml\Shop;

use Magento\Backend\App\Action;

class Edit extends \Magento\Backend\App\Action
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
            Action\Context $context,
            \Magento\Framework\View\Result\PageFactory $resultPageFactory,
            \Magento\Framework\Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        parent::__construct($context);
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('ADM_StoreFinder::save');
    }

    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('ADM_StoreFinder::shop')
        ->addBreadcrumb(__('ADM StoreFinder'), __('ADM StoreFinder'))
        ->addBreadcrumb(__('Manage ADM StoreFinder Shops'), __('Manage ADM StoreFinder Shops'));
        return $resultPage;
    }

    /**
     * Edit ADM StoreFinder shop
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('entity_id');
        $model = $this->_objectManager->create('ADM\StoreFinder\Model\Shop');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This shop no longer exists.'));
                /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
        }

        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        $this->_coreRegistry->register('storefinder_shop', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
                $id ? __('Edit ADM StoreFinder Shop') : __('New ADM StoreFinder Shop'),
                $id ? __('Edit ADM StoreFinder Shop') : __('New ADM StoreFinder Shop')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('ADM StoreFinder Shops'));
        $resultPage->getConfig()->getTitle()
        ->prepend($model->getId() ? $model->getTitle() : __('New ADM StoreFinder Shop'));

        return $resultPage;
    }
}

