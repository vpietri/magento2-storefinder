<?php

namespace ADM\StoreFinder\Helper;

use Magento\Framework\App\Action\Action;

class Shop extends \Magento\Framework\App\Helper\AbstractHelper
{

    /**
     * @var \ADM\StoreFinder\Model\Shop
     */
    protected $_shop;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \ADM\StoreFinder\Model\Shop $shop
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
            \Magento\Framework\App\Helper\Context $context,
            \ADM\StoreFinder\Model\Shop $shop,
            \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->_shop = $shop;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Return a blog shop from given shop id.
     *
     * @param Action $action
     * @param null $entityId
     * @return \Magento\Framework\View\Result\Page|bool
     */
    public function prepareResultShop(Action $action, $entityId= null)
    {
        if ($entityId !== null && $entityId !== $this->_shop->getEntityId()) {
            $delimiterPosition = strrpos($entityId, '|');
            if ($delimiterPosition) {
                $entityId = substr($entityId, 0, $delimiterPosition);
            }

            if (!$this->_shop->load($entityId)) {
                return false;
            }
        }

        if (!$this->_shop->getEntityId()) {
            return false;
        }

        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        // We can add our own custom page handles for layout easily.
        $resultPage->addHandle('storefinder_shop_view');

        // This will generate a specific layout handle like: storefinder_shop_view_id_1
        // giving us a unique handle to target specific storefinder shops if we wish to.
        $resultPage->addPageLayoutHandles(['id' => $this->_shop->getEntityId()]);

        // Magento is event driven after all, lets remember to dispatch our own, to help people
        // who might want to add additional functionality, or filter the shops somehow!
        $this->_eventManager->dispatch(
                'adm_shop_render',
                ['shop' => $this->_shop, 'controller_action' => $action]
        );

        return $resultPage;
    }
}