<?php
namespace ADM\StoreFinder\Api\Data;

interface ShopInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    
    const ENTITY_ID = 'entity_id';
    
    const CODE = 'code';
    
    const NAME = 'name';
    
    const DETAIL = 'detail';
    
    const EMAIL = 'email';
    
    const TELEPHONE = 'telephone';
    
    const FAX = 'fax';
    
    const STREET = 'street';
    
    const POSTCODE = 'postcode';
    
    const CITY = 'city';
    
    const REGION = 'region';
    
    const COUNTRY_ID = 'country_id';
    
    const LATITUDE = 'latitude';
    
    const LONGITUDE = 'longitude';
    
    const IS_ACTIVE = 'is_active';
    
    const CREATED_AT = 'created_at';
    

    
    /**
     * Get entity_id
     *
     * @return int|null
     */
    public function getEntityId();


    /**
     * Set entity_id
     *
     * @param int $entity_id
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setEntityId($entity_id);
    
    /**
     * Get code
     *
     * @return string|null
     */
    public function getCode();


    /**
     * Set code
     *
     * @param string $code
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setCode($code);
    
    /**
     * Get name
     *
     * @return string|null
     */
    public function getName();


    /**
     * Set name
     *
     * @param string $name
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setName($name);
    
    /**
     * Get detail
     *
     * @return string|null
     */
    public function getDetail();


    /**
     * Set detail
     *
     * @param string $detail
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setDetail($detail);
    
    /**
     * Get email
     *
     * @return string|null
     */
    public function getEmail();


    /**
     * Set email
     *
     * @param string $email
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setEmail($email);
    
    /**
     * Get telephone
     *
     * @return string|null
     */
    public function getTelephone();


    /**
     * Set telephone
     *
     * @param string $telephone
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setTelephone($telephone);
    
    /**
     * Get fax
     *
     * @return string|null
     */
    public function getFax();


    /**
     * Set fax
     *
     * @param string $fax
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setFax($fax);
    
    /**
     * Get street
     *
     * @return string|null
     */
    public function getStreet();


    /**
     * Set street
     *
     * @param string $street
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setStreet($street);
    
    /**
     * Get postcode
     *
     * @return string|null
     */
    public function getPostcode();


    /**
     * Set postcode
     *
     * @param string $postcode
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setPostcode($postcode);
    
    /**
     * Get city
     *
     * @return string|null
     */
    public function getCity();


    /**
     * Set city
     *
     * @param string $city
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setCity($city);
    
    /**
     * Get region
     *
     * @return string|null
     */
    public function getRegion();


    /**
     * Set region
     *
     * @param string $region
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setRegion($region);
    
    /**
     * Get country_id
     *
     * @return string|null
     */
    public function getCountryId();


    /**
     * Set country_id
     *
     * @param string $country_id
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setCountryId($country_id);
    
    /**
     * Get latitude
     *
     * @return decimal|null
     */
    public function getLatitude();


    /**
     * Set latitude
     *
     * @param decimal $latitude
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setLatitude($latitude);
    
    /**
     * Get longitude
     *
     * @return decimal|null
     */
    public function getLongitude();


    /**
     * Set longitude
     *
     * @param decimal $longitude
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setLongitude($longitude);
    
    /**
     * Get is_active
     *
     * @return int|null
     */
    public function getIsActive();


    /**
     * Set is_active
     *
     * @param int $is_active
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setIsActive($is_active);
    
    /**
     * Get created_at
     *
     * @return string|null
     */
    public function getCreatedAt();


    /**
     * Set created_at
     *
     * @param string $created_at
     * @return ADM\StoreFinder\ShopInterface
     */
    public function setCreatedAt($created_at);
    

}
