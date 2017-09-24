<?php

namespace ADM\StoreFinder\Model\ResourceModel\Shop;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('ADM\StoreFinder\Model\Shop', 'ADM\StoreFinder\Model\ResourceModel\Shop');
    }

}