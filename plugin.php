<?php
/*
Plugin Name: Advanced Reserved URLs
Plugin URI: http://github.com/josheby/yourls-advanced-reserved-urls
Description: Keyword Filter For YOURLS
Version: 1.0
Author: Josh Eby
Author URI: http://josheby.com/

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
*/

if( !defined( 'YOURLS_ABSPATH' ) ) die();

function advanced_reserved_urls($reserved, $keyword) {
	global $yourls_reserved_URL;
	
	// Check to see if the keyword has already been flagged as reserved.  If so, return and exit to
	// save processing time.
	if ( $reserved === true ) {
		return $reserved;
	}
	
	// Generate the terms list by merging the Advanced Reserved URLs list along with any custom
	// terms that might have been included in the core variable defined in config.php.
	$terms = array_merge( advanced_reserved_urls_terms(), $yourls_reserved_URL );
		
	// In order to filter upper, lower, and mixed case variations, force the keyword to lowercase.
	// This enforces filtering even when including uppercase letters in the charset.
	$keyword = strtolower( $keyword );
	
	// Replace common leet speak number/letter substitutions. This reduces the size of the $terms
	// array because variations including numbers do not have to be included as well.
	$keyword = preg_replace( '/[0]/', 'o', $keyword );
	$keyword = preg_replace( '/[1]/', 'i', $keyword );	// 1 could also be L, but I is more common
	$keyword = preg_replace( '/[2]/', 'z', $keyword );
	$keyword = preg_replace( '/[3]/', 'e', $keyword );
	$keyword = preg_replace( '/[4]/', 'a', $keyword );
	$keyword = preg_replace( '/[5]/', 's', $keyword );
	$keyword = preg_replace( '/[6]/', 'b', $keyword );
	$keyword = preg_replace( '/[7]/', 't', $keyword );
	$keyword = preg_replace( '/[8]/', 'b', $keyword );
	$keyword = preg_replace( '/[9]/', 'g', $keyword );
	
	// Search keyword for each term.  If a term is found, flag the keyword as reserved and break
	// the loop as there is no reason to finish searching the list of terms.
	foreach ( $terms as $term ) {
		$search = strpos( $keyword, $term );
		if ( false !== $search ) {
			$reserved = true;
			break;
		}
	}

	return $reserved;
}
yourls_add_filter( 'keyword_is_reserved', 'advanced_reserved_urls');

function advanced_reserved_urls_terms() {
	return array(
		'666',
		'69',
		'abortion',
		'anal',
		'anus',
		'areola',
		'areoli',
		'ass',
		'balls',
		'bastard',
		'basterd',
		'beaner',
		'bitch',
		'blowjob',
		'blumpkin',
		'boner',
		'boob',
		'butt',
		'christ',
		'clit',
		'crap',
		'cum',
		'cunt',
		'dick',
		'fag',
		'fart',
		'fuck',
		'gay',
		'god',
		'jesus',
		'lmao',
		'lmfao',
		'nigger',
		'omg',
		'penis',
		'poop',
		'porn',
		'pussy',
		'satan',
		'sex',
		'shat',
		'shit',
		'tit',
		'twat',
		'vagina',
		'vulva',
		'xxx',
		'wtf',
	);
}