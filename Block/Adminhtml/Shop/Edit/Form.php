<?php
namespace ADM\StoreFinder\Block\Adminhtml\Shop\Edit;

class Form extends \Magento\Backend\Block\Widget\Form\Generic
{

    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
            \Magento\Backend\Block\Template\Context $context,
            \Magento\Framework\Registry $registry,
            \Magento\Framework\Data\FormFactory $formFactory,
            \Magento\Store\Model\System\Store $systemStore,
            array $data = []
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Init form
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('shop_form');
        $this->setTitle(__('Shop Information'));
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /** @var \Ashsmith\Blog\Model\Shop $model */
        $model = $this->_coreRegistry->registry('storefinder_shop');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
                ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'shop']]
        );

        $form->setHtmlIdPrefix('shop_');

        $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('General Information'), 'class' => 'fieldset-wide']
        );

        
        $fieldset->addField(
                'entity_id',
                'text',
                ['name' => 'entity_id', 'label' => __('Entity Id'), 'title' => __('Entity Id'), 'required' => true]
        );
        
        $fieldset->addField(
                'code',
                'text',
                ['name' => 'code', 'label' => __('Code'), 'title' => __('Code'), 'required' => true]
        );
        
        $fieldset->addField(
                'name',
                'text',
                ['name' => 'name', 'label' => __('Name'), 'title' => __('Name'), 'required' => true]
        );
        
        $fieldset->addField(
                'detail',
                'text',
                ['name' => 'detail', 'label' => __('Detail'), 'title' => __('Detail'), 'required' => false]
        );
        
        $fieldset->addField(
                'email',
                'text',
                ['name' => 'email', 'label' => __('Email'), 'title' => __('Email'), 'required' => false]
        );
        
        $fieldset->addField(
                'telephone',
                'text',
                ['name' => 'telephone', 'label' => __('Telephone'), 'title' => __('Telephone'), 'required' => false]
        );
        
        $fieldset->addField(
                'fax',
                'text',
                ['name' => 'fax', 'label' => __('Fax'), 'title' => __('Fax'), 'required' => false]
        );
        
        $fieldset->addField(
                'street',
                'text',
                ['name' => 'street', 'label' => __('Street'), 'title' => __('Street'), 'required' => false]
        );
        
        $fieldset->addField(
                'postcode',
                'text',
                ['name' => 'postcode', 'label' => __('Postcode'), 'title' => __('Postcode'), 'required' => false]
        );
        
        $fieldset->addField(
                'city',
                'text',
                ['name' => 'city', 'label' => __('City'), 'title' => __('City'), 'required' => true]
        );
        
        $fieldset->addField(
                'region',
                'text',
                ['name' => 'region', 'label' => __('Region'), 'title' => __('Region'), 'required' => false]
        );
        
        $fieldset->addField(
                'country_id',
                'text',
                ['name' => 'country_id', 'label' => __('Country Id'), 'title' => __('Country Id'), 'required' => true]
        );
        
        $fieldset->addField(
                'latitude',
                'text',
                ['name' => 'latitude', 'label' => __('Latitude'), 'title' => __('Latitude'), 'required' => false]
        );
        
        $fieldset->addField(
                'longitude',
                'text',
                ['name' => 'longitude', 'label' => __('Longitude'), 'title' => __('Longitude'), 'required' => false]
        );
        
        $fieldset->addField(
                'is_active',
                'text',
                ['name' => 'is_active', 'label' => __('Is Active'), 'title' => __('Is Active'), 'required' => true]
        );
        
        $fieldset->addField(
                'created_at',
                'text',
                ['name' => 'created_at', 'label' => __('Created At'), 'title' => __('Created At'), 'required' => true]
        );
        
        // Remove field auto generated
        $fieldset->removeField('entity_id');

         if ($model->getEntityId()) {
             $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
         }

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}