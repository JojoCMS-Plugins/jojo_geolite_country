A Jojo implementation of Maxmind's free IP -> Country database. The free version is supposedly slightly less accurate than the paid version. This code should work with the paid version - simply replace the free .dat file with the paid .dat file.

This product includes GeoLite data created by MaxMind, available from http://www.maxmind.com/

This plugin does 2 things only - Firstly it provides 2 new functions for getting Country information. You will need to use these functions in your custom code to do whatever you need.
The other small change this plugin makes is auto-populating the billing / shipping country in the shopping cart based on the Geo-IP detected country (assuming you have the jojo_cart plugins installed).

Usage is simple:

Install the plugin, then...

$countrycode = Jojo_Plugin_jojo_geolite_country::getCountryCode();
$countryname = Jojo_Plugin_jojo_geolite_country::getCountryName();

By default, the lookup is done on the browser's current IP address. To use a specific IP address, supply this as an argument...

$countrycode = Jojo_Plugin_jojo_geolite_country::getCountryCode('11.22.33.44');
$countryname = Jojo_Plugin_jojo_geolite_country::getCountryName('11.22.33.44');

It is reommended you check for updates every so often at http://www.maxmind.com/app/geolitecountry - replace the .dat file with the updated version.

LICENSE
=======

The GeoLite Country database is LGPL Licensed. The License also includes the following condition:

Under the license agreement, all advertising materials and documentation mentioning features or use of this database must display the following acknowledgment: "This product includes GeoLite data created by MaxMind, available from http://www.maxmind.com/."

Please see http://www.maxmind.com/app/geolitecountry for full details.

OPEN DATA LICENSE
=================

Copyright (c) 2008 MaxMind, Inc.  All Rights Reserved.

All advertising materials and documentation mentioning features or use of
this database must display the following acknowledgment:
"This product includes GeoLite data created by MaxMind, available from
http://maxmind.com/"

Redistribution and use with or without modification, are permitted provided
that the following conditions are met:
1. Redistributions must retain the above copyright notice, this list of
conditions and the following disclaimer in the documentation and/or other
materials provided with the distribution. 
2. All advertising materials and documentation mentioning features or use of
this database must display the following acknowledgement:
"This product includes GeoLite data created by MaxMind, available from
http://maxmind.com/"
3. "MaxMind" may not be used to endorse or promote products derived from this
database without specific prior written permission.

THIS DATABASE IS PROVIDED BY MAXMIND, INC ``AS IS'' AND ANY 
EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED 
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE 
DISCLAIMED. IN NO EVENT SHALL MAXMIND BE LIABLE FOR ANY 
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES 
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; 
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT 
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS 
DATABASE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

