<?php
namespace Magenuts\Password\Block;
class Password extends \Magento\Framework\View\Element\Template
{
	public function __construct(
    \Magento\Framework\View\Element\Template\Context $context,
    \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
  ){
     $this->scopeConfig = $scopeConfig;
		parent::__construct($context);
    
	}
	public function getConfig($config_path) {
      return $this->scopeConfig->getValue(
              $config_path,
              \Magento\Store\Model\ScopeInterface::SCOPE_STORE
              );
  }
}
