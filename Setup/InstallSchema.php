<?php

namespace ADM\StoreFinder\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();
        /**
         * Create table 'adm_shop_entity'
         */
        $table = $installer->getConnection()
        ->newTable($installer->getTable('adm_shop_entity'))
        ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['identity' => true, 'primary' => true, 'unsigned' => true, 'nullable' => false],
                'entity_id'
        )->addColumn(
                'code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                32,
                ['nullable' => false],
                'code'
        )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'name'
        )->addColumn(
                'detail',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '64k',
                [],
                'detail'
        )->addColumn(
                'email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'email'
        )->addColumn(
                'telephone',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'telephone'
        )->addColumn(
                'fax',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'fax'
        )->addColumn(
                'street',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'street'
        )->addColumn(
                'postcode',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'postcode'
        )->addColumn(
                'city',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'city'
        )->addColumn(
                'region',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'region'
        )->addColumn(
                'country_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                2,
                ['nullable' => false],
                'country_id'
        )->addColumn(
                'latitude',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '9,6',
                [],
                'latitude'
        )->addColumn(
                'longitude',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '9,6',
                [],
                'longitude'
        )->addColumn(
                'is_active',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => false, 'default' => '0'],
                'is_active'
        )->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => '\Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT'],
                'created_at'
        )
         ->setComment('List of shops');
         $installer->getConnection()->createTable($table);

        $setup->endSetup();
    }
}