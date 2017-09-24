<?php
namespace ADM\StoreFinder\Controller;

use \Magento\Framework\App\Action\Action;

class Router implements \Magento\Framework\App\RouterInterface
{
    /**
     * @var \Magento\Framework\App\ActionFactory
     */
    protected $actionFactory;

    /**
     * @param \Magento\Framework\App\ActionFactory $actionFactory
     * @param \Ashsmith\Blog\Model\PostFactory $postFactory
     */
    public function __construct(
        \Magento\Framework\App\ActionFactory $actionFactory
    ) {
        $this->actionFactory = $actionFactory;
    }

    /**
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return bool
     */
    public function match(\Magento\Framework\App\RequestInterface $request)
    {

        if(preg_match('/^\/storefinder\/?(.*)/', $request->getPathInfo(), $match)) {

            $requestPathMatch = $match[1];
            MageLog($requestPathMatch);

            if(empty($requestPathMatch)) {
                $request->setModuleName('storefinder')->setControllerName('shop')->setActionName('index');
                //$request->setAlias(\Magento\Framework\Url::REWRITE_REQUEST_PATH_ALIAS, 'storefinder');
                return $this->actionFactory->create('Magento\Framework\App\Action\Forward');
            } elseif(preg_match('/^shop\/(.+)/', $requestPathMatch, $match)) {
                $request->setModuleName('storefinder')->setControllerName('shop')->setActionName('view')->setParam('id', $match[1]);;
                return $this->actionFactory->create('Magento\Framework\App\Action\Forward');
            } else {
                return null;
            }

        } else {
            return null;
        }

    }
}