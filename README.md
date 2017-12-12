Advanced Reserved URLs for YOURLS
====================

Plugin for [YOURLS](http://yourls.org) `1.7`. 

Description
-----------
This plugin extends the reserved word functionality that is provided in the core of YOURLS.  Advanced
Reserved URLs not only blocks an exact match of a reserved word, but any shorturl that contains the
reserved word as well, even if it is mixed case or in leet speak!

For example, adding the word "sample" to the list of reserved words would prevent any of the following
shorturls:

- http://sho.rt/sample
- http://sho.rt/Sample
- http://sho.rt/1sample34
- http://sho.rt/sampl3

Because Advanced Reserved URLs will match terms in the middle of a shorturl there is no need to include
multiple variations in the blocked list such as ass, asshole, assholes, etc.  Advanced Reserved URLs also
forces the shorturl to lowercase before the comparison is made there for catching mixed case results
so feel free to set YOURLS_URL_CONVERT to 62 and include uppercase letters!

Installation
------------
1. In `/user/plugins`, create a new folder named `advanced-reserved-urls`.
2. Drop these files in that directory.
3. Go to the Plugins administration page ( *eg* `http://sho.rt/admin/plugins.php` ) and activate the plugin.
4. Have fun!

Reserving Additional Words
--------------
Advanced Reserved URLs observes the $yourls_reserved_URL variable that is configured in config.php.
Therefore, if you wish to add a word you feel we missed, you may add it to this list in the config.php
and Advanced Reserved URLs will automatically include it when filtering future submissions.  Please
keep in mind that the $yourls_reserved_URL is an array so if you modify the list of words, make sure
it remains an array.

License
-------
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
