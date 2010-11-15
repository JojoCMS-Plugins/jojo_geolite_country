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
 
 Jojo::addFilter('jojo_cart_checkout:populate_fields', 'populate_fields', 'jojo_geolite_country');
 Jojo::addFilter('get_option',                         'get_option',      'jojo_geolite_country');
 
 $_options[] = array(
    'id'          => 'captcha_trusted_countries',
    'category'    => 'Config',
    'label'       => 'CAPTCHA trusted countries',
    'description' => 'A comma separated list of country codes to trust more with the captcha. Visitors from trusted countries enter a half-length CAPTCHA. Eg if you expect most genuine form submissions to come from New Zealand, Australia or USA, enter NZ,AU,US',
    'type'        => 'text',
    'default'     => '',
    'options'     => '',
);