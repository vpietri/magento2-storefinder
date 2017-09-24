<?php
namespace ADM\StoreFinder\Controller\Shop;

use \Magento\Framework\App\Action\Action;

class View extends Action
{
    /** @var  \Magento\Framework\Controller\Result\ForwardFactory */
    protected $resultForwardFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(\Magento\Framework\App\Action\Context $context,
                                \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
    )
    {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    /**
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $entity_id = $this->getRequest()->getParam('entity_id', $this->getRequest()->getParam('id', false));
        /** @var \ADM\StoreFinder\Helper\Shop $shop_helper */
        $shop_helper = $this->_objectManager->get('ADM\StoreFinder\Helper\Shop');
        $result_page = $shop_helper->prepareResultShop($this, $entity_id);
        if (!$result_page) {
            $resultForward = $this->resultForwardFactory->create();
            return $resultForward->forward('noroute');
        }
        return $result_page;
    }
}