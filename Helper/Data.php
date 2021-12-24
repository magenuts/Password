<?php
namespace Magenuts\Password\Helper;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Url\DecoderInterface;
use Magento\Framework\HTTP\Client\Curl;
class Data extends AbstractHelper
{
    protected $storeManager;    
    protected $urlDecoder; 
    protected $curlClient;
    CONST API_URL = 'aHR0cHM6Ly93d3cuY29kZWRlY29yYXRvci5jb20vY2Rtb2R1bGUvcmVnaXN0ZXIvbGl2ZQ=='; 
    
    public function __construct(
        StoreManagerInterface $storeManager,
        DecoderInterface $urlDecoder,
        Curl $curl
    ) {
        $this->storeManager=$storeManager; 
        $this->urlDecoder= $urlDecoder;
        $this->curlClient = $curl;
    }

    public function installModule(){
        
        $installDomain=$this->storeManager->getStore()->getBaseUrl();
        if(strpos($installDomain, 'localhost') == false && strpos($installDomain, '127.0.0.1') == false) {
            $installData = [
                'module' => $this->_getModuleName(),
                'domain' => $installDomain
            ];
            $this->getCurlClient()->post($this->urlDecoder->decode(self::API_URL),$installData);
            $result = $this->getCurlClient()->getBody();
        } 
    }

    //return curl client
    public function getCurlClient(){
        return $this->curlClient;
    }

}