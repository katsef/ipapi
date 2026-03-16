<?php
namespace Webazon\Ipapi;

    class IP extends Base{
        public $status = false;
        public $ip = false;
        public $sip = false;
        public $locale = "en_US";
        public $locales = false;
        public $exception = false;
        public $ipapi = false;

        function __construct($ip = false) {
                Exception::set_error();
                 try {
        
            if (!$ip) {
                $ip = Base::GetIp();
            }
            if (filter_var($ip, FILTER_VALIDATE_IP)) {
                if (!Base::CheckIp($ip)) {
                    $this->sip=Base::GetServerIp();
                    $this->ipapi=Base::GetIpapi($ip);
                    if ($this->ipapi->status=='success')
                        {
                        $this->status=true;
                        }else{throw new Exception($this->ipapi->status.' '.$this->ipapi->message.' '.$this->ipapi->query, 0, __FILE__, __LINE__);}
                    $this->locales=Base::GetLocales($this->ipapi->countryCode);
                    $this->locale=Base::GetLocale();
                    //$client = new \ipinfo\ipinfo\IPinfo($access_token);
                    //$this->ipinfo = $client->getDetails($ip);
                    //$this->locale = Base::GetLocale($this->ipinfo->country);
                } else {
                    throw new Exception($ip . ' is not a valid IP address', 0, __FILE__, __LINE__);
                }
            } else {
                throw new Exception($ip . ' is not a valid IP address', 0, __FILE__, __LINE__);
            }
            $this->ip = $ip;
        } catch (\Throwable $e) {
            $this->exception = Exception::getException($e);
        }
    }

    
    
    
    }





    


    ?>