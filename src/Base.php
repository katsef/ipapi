<?php
namespace Webazon\Ipapi;

use Symfony\Component\HttpFoundation\IpUtils;

abstract class Base
{
    
    public function GetIp()
    {
        $value = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $value = $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $value = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if (!empty($_SERVER['REMOTE_ADDR'])) {
            $value = $_SERVER['REMOTE_ADDR'];
        }
        return $value;
    }
    
    public function CheckIp($ip)
    {
        return IpUtils::checkIp($ip, Config::BOGON_NETWORKS);
    }
    
    public function GetServerIp(){
        $res=false;
        $ipifi = file_get_contents(Config::URL_IPIFI);
        if (JSON::IsJson($ipifi))
            {
            $ipifi=json_decode($ipifi);
            if (isset($ipifi->ip))
                {
                $res=$ipifi->ip;
                }
            }
     return $res;   
    }
    
    public function GetIpapi($ip)
    {
    $res=false;
    $ipapi=file_get_contents(Config::URL_IPAPI.'/'.$ip);
    if (JSON::IsJson($ipapi))
        {
        $res=json_decode($ipapi);
        }
        
    return $res;    
    }
    
    public function GetLocales($country)
    {
        $res=false;
        $locales=[];
        $arr=Config::LOCALES;
        for ($i=0;$i<count($arr);$i++)
            {
            if ($arr[$i]['country']['code']==$country)
                {
                $a=['id'=>$i,'locale'=>str_replace('-','_',$arr[$i]['locale']),'language'=>$arr[$i]['language']['name_local'],'flag'=>$arr[$i]['country']['flag']];
                array_push($locales,$a);
                $res=$a;
                
                }
            }
        
     return $locales;   
    }
    
    
    public function GetLocale()
        {
        return \Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
        }
   }


?>