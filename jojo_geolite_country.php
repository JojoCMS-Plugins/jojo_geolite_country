<?php
/**
 * Jojo CMS
 *
 * Copyright 2007-2008 Jojo CMS
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Harvey Kane <code@ragepank.com>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 * @package jojo_geolite_country
 */



class Jojo_Plugin_jojo_geolite_country extends Jojo_Plugin
{
    function get_option($value, $args)
    {
        $name = $args[0];
        if ($name != 'captcha_num_chars') return $value; //ignore everything except captcha_num_chars
        $options = Jojo::getOptions();
        if (!empty($options['captcha_trusted_countries'])) {
            $trusted_str = $options['captcha_trusted_countries'];
            $trusted = explode(',', $trusted_str);
            $my_country = self::getCountryCode();
            foreach ($trusted as $country) {
                if (strtoupper($my_country) == strtoupper($country)) return floor($value / 2);
            }
        }
        return $value;
    }
    
    /* returns the short country code eg 'NZ' */
    function getCountryCode($ip=false)
    {
        static $_cache;
        if (!$ip) $ip = Jojo::getIp(); //detect IP from request
        
        /* use a static variable to cache IP lookups */
        if (isset($_cache[$ip])) return $_cache[$ip];
        $cache = array();
        
        foreach (Jojo::listPlugins('external/maxmind_geolite_country/geoip.inc') as $include) {
            require_once($include);
            break;
        }
        
        foreach (Jojo::listPlugins('external/maxmind_geolite_country/GeoIP.dat') as $pluginfile) {
            $datafile = $pluginfile;
            break;
        }
        if (empty($datafile)) return false;
        
        $gi = geoip_open($datafile, GEOIP_STANDARD);
        
        $_cache[$ip] = geoip_country_code_by_addr($gi, $ip);
        return $_cache[$ip];
    }
    
    /* returns the long country name eg 'New Zealand' */
    function getCountryName($ip=false)
    {
        foreach (Jojo::listPlugins('external/maxmind_geolite_country/geoip.inc') as $include) {
            require_once($include);
            break;
        }
        
        if (!$ip) $ip = Jojo::getIp(); //detect IP from request
        
        foreach (Jojo::listPlugins('external/maxmind_geolite_country/GeoIP.dat') as $pluginfile) {
            $datafile = $pluginfile;
            break;
        }
        if (empty($datafile)) return false;
        
        return geoip_country_name_by_addr($gi, $ip);
    }
    
    /* filter for jojo_cart plugin which uses Geo-IP to default the billing / shipping country to the detected country */
    function populate_fields($fields)
    {
        if (empty($fields['billing_country'])) {
            $fields['billing_country'] = self::getCountryCode();
        }
        if (empty($fields['shipping_country'])) {
            $fields['shipping_country'] = self::getCountryCode();
        }
        return $fields;
    }
}