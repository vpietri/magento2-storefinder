<?php

namespace ADM\StoreFinder\Model;

use ADM\StoreFinder\Api\Data\ShopInterface;
use Magento\Framework\DataObject\IdentityInterface;

class Shop extends \Magento\Framework\Model\AbstractModel
implements ShopInterface, IdentityInterface
{
    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'storefinder_shop';

    /**
     * @var string
     */
    protected $_cacheTag = 'storefinder_shop';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'storefinder_shop';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('ADM\StoreFinder\Model\ResourceModel\Shop');
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getEntityId()];
    }



    /**
     * Get entity_id
    *
    * @return int|null
    */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }


    /**
     * Set entity_id
     *
     * @param int $entity_id
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setEntityId($entity_id)
    {
        return $this->setData(self::ENTITY_ID, $entity_id);
    }

    /**
     * Get code
    *
    * @return string|null
    */
    public function getCode()
    {
        return $this->getData(self::CODE);
    }


    /**
     * Set code
     *
     * @param string $code
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setCode($code)
    {
        return $this->setData(self::CODE, $code);
    }

    /**
     * Get name
    *
    * @return string|null
    */
    public function getName()
    {
        return $this->getData(self::NAME);
    }


    /**
     * Set name
     *
     * @param string $name
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get detail
    *
    * @return string|null
    */
    public function getDetail()
    {
        return $this->getData(self::DETAIL);
    }


    /**
     * Set detail
     *
     * @param string $detail
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setDetail($detail)
    {
        return $this->setData(self::DETAIL, $detail);
    }

    /**
     * Get email
    *
    * @return string|null
    */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }


    /**
     * Set email
     *
     * @param string $email
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get telephone
    *
    * @return string|null
    */
    public function getTelephone()
    {
        return $this->getData(self::TELEPHONE);
    }


    /**
     * Set telephone
     *
     * @param string $telephone
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setTelephone($telephone)
    {
        return $this->setData(self::TELEPHONE, $telephone);
    }

    /**
     * Get fax
    *
    * @return string|null
    */
    public function getFax()
    {
        return $this->getData(self::FAX);
    }


    /**
     * Set fax
     *
     * @param string $fax
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setFax($fax)
    {
        return $this->setData(self::FAX, $fax);
    }

    /**
     * Get street
    *
    * @return string|null
    */
    public function getStreet()
    {
        return $this->getData(self::STREET);
    }


    /**
     * Set street
     *
     * @param string $street
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setStreet($street)
    {
        return $this->setData(self::STREET, $street);
    }

    /**
     * Get postcode
    *
    * @return string|null
    */
    public function getPostcode()
    {
        return $this->getData(self::POSTCODE);
    }


    /**
     * Set postcode
     *
     * @param string $postcode
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setPostcode($postcode)
    {
        return $this->setData(self::POSTCODE, $postcode);
    }

    /**
     * Get city
    *
    * @return string|null
    */
    public function getCity()
    {
        return $this->getData(self::CITY);
    }


    /**
     * Set city
     *
     * @param string $city
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setCity($city)
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * Get region
    *
    * @return string|null
    */
    public function getRegion()
    {
        return $this->getData(self::REGION);
    }


    /**
     * Set region
     *
     * @param string $region
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setRegion($region)
    {
        return $this->setData(self::REGION, $region);
    }

    /**
     * Get country_id
    *
    * @return string|null
    */
    public function getCountryId()
    {
        return $this->getData(self::COUNTRY_ID);
    }


    /**
     * Set country_id
     *
     * @param string $country_id
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setCountryId($country_id)
    {
        return $this->setData(self::COUNTRY_ID, $country_id);
    }

    /**
     * Get latitude
    *
    * @return decimal|null
    */
    public function getLatitude()
    {
        return $this->getData(self::LATITUDE);
    }


    /**
     * Set latitude
     *
     * @param decimal $latitude
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setLatitude($latitude)
    {
        return $this->setData(self::LATITUDE, $latitude);
    }

    /**
     * Get longitude
    *
    * @return decimal|null
    */
    public function getLongitude()
    {
        return $this->getData(self::LONGITUDE);
    }


    /**
     * Set longitude
     *
     * @param decimal $longitude
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setLongitude($longitude)
    {
        return $this->setData(self::LONGITUDE, $longitude);
    }

    /**
     * Get is_active
    *
    * @return int|null
    */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }


    /**
     * Set is_active
     *
     * @param int $is_active
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setIsActive($is_active)
    {
        return $this->setData(self::IS_ACTIVE, $is_active);
    }

    /**
     * Get created_at
    *
    * @return string|null
    */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }


    /**
     * Set created_at
     *
     * @param string $created_at
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setCreatedAt($created_at)
    {
        return $this->setData(self::CREATED_AT, $created_at);
    }
}