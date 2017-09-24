<?php
namespace ADM\StoreFinder\Block\Shop;

use Magento\Store\Model\ScopeInterface;

class View extends \Magento\Framework\View\Element\Template implements
    \Magento\Framework\DataObject\IdentityInterface
{

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \ADM\StoreFinder\Model\Shop $shop
     * @param \ADM\StoreFinder\Model\ShopFactory $shopFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \ADM\StoreFinder\Model\Shop $shop,
        \ADM\StoreFinder\Model\ShopFactory $shopFactory,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->_shop = $shop;
        $this->_shopFactory = $shopFactory;
    }

    /**
     * @return \ADM\StoreFinder\Model\Shop
     */
    public function getShop()
    {
        // Check if shops has already been defined
        // makes our block nice and re-usable! We could
        // pass the 'shops' data to this block, with a collection
        // that has been filtered differently!
        if (!$this->hasData('shop')) {
            if ($this->getEntityId()) {
                /** @var \ADM\StoreFinder\Model\Post $page */
                $shop = $this->_shopFactory->create();
            } else {
                $shop = $this->_shop;
            }
            $this->setData('shop', $shop);
        }
        return $this->getData('shop');
    }

    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        return [\ADM\StoreFinder\Model\Shop::CACHE_TAG . '_' . $this->getShop()->getEntityId()];
    }

    /**
     * Prepare global layout
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        $shop = $this->getShop();
        $this->_addBreadcrumbs($shop);
        $this->pageConfig->addBodyClass('storefinder');
        $this->pageConfig->getTitle()->set($shop->getName());
        $this->pageConfig->setDescription($shop->getDetail());

        return parent::_prepareLayout();
    }



    /**
     * Prepare breadcrumbs
     *
     * @param \ADM\StoreFinder\Model\Shop $shop
     * @throws \Magento\Framework\Exception\LocalizedException
     * @return void
     */
    protected function _addBreadcrumbs(\ADM\StoreFinder\Model\Shop $shop)
    {
        if ($this->_scopeConfig->getValue('web/default/show_storefinder_shop_breadcrumbs', ScopeInterface::SCOPE_STORE)
                 && ($breadcrumbsBlock = $this->getLayout()->getBlock('breadcrumbs'))
        ) {
            $breadcrumbsBlock->addCrumb(
                    'home',
                    [
                    'label' => __('Home'),
                    'title' => __('Go to Home Page'),
                    'link' => $this->_storeManager->getStore()->getBaseUrl()
                    ]
            );
            $breadcrumbsBlock->addCrumb('storefinder', ['label' => __('List of stores'), 'title' => __('List of stores'), 'link' => $this->getUrl('storefinder')]);
            $breadcrumbsBlock->addCrumb('storefinder_shop', ['label' => $shop->getName(), 'title' => $shop->getName()]);
        }
    }

}
