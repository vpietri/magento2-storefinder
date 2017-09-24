<?php
namespace ADM\StoreFinder\Block\Shop;

use Magento\Store\Model\ScopeInterface;
use ADM\StoreFinder\Api\Data\ShopInterface;
use ADM\StoreFinder\Model\ResourceModel\Shop\Collection as ShopCollection;


class Index extends \Magento\Framework\View\Element\Template implements
\Magento\Framework\DataObject\IdentityInterface
{
    /**
     * @var \ADM\StoreFinder\Model\ResourceModel\ShopFactory
     */
    protected $_shopCollectionFactory;

    protected $_jsonHelper;

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \ADM\StoreFinder\Model\ResourceModel\Shop\CollectionFactory $shopCollectionFactory,
     * @param array $data
     */
    public function __construct(
            \Magento\Framework\View\Element\Template\Context $context,
            \Magento\Framework\Json\Helper\Data $jsonHelper,
            \ADM\StoreFinder\Model\ResourceModel\Shop\CollectionFactory $shopCollectionFactory,
            array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_jsonHelper = $jsonHelper;
        $this->_shopCollectionFactory = $shopCollectionFactory;
    }


    /**
     * @return \ADM\StoreFinder\Model\ResourceModel\Shop\Collection
     */
    public function getShops()
    {
        if (!$this->hasData('shops')) {
            $shop = $this->_shopCollectionFactory
            ->create();

            $this->setData('shops', $shop);
        }
        return $this->getData('shops');
    }


    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        return [\ADM\StoreFinder\Model\Shop::CACHE_TAG . '_' . 'list'];
    }

    /**
     * @param object $shop
     * @return string
     */
    public function getViewUrl($shop)
    {
        return $this->getUrl('storefinder/shop/view', ['id'=>$shop->getEntityId()]);
    }

    public function getJsonShops()
    {
        $shopToJson = [];
        foreach($this->getShops() as $shop) {
            if($shop->getLatitude() && $shop->getLongitude()) {
                $shopToJson[] = ['code'=>$shop->getCode(),
                    'title'=>$shop->getName(),
                    'longitude'=>$shop->getLongitude(),
                    'latitude'=>$shop->getLatitude()];
            }
        }

        return $this->_jsonHelper->jsonEncode($shopToJson);
    }

    /**
     * Prepare global layout
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        $this->_addBreadcrumbs();
        $this->pageConfig->addBodyClass('storefinder');
        $this->pageConfig->getTitle()->set(__('List of stores'));
        $this->pageConfig->setDescription(__('List of stores'));

        return parent::_prepareLayout();
    }



    /**
     * Prepare breadcrumbs
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     * @return void
     */
    protected function _addBreadcrumbs()
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
        }
    }
}
