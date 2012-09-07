<?php
/**
 * @package Cachingcron
 * @author  Dioscouri Design
 * @link    http://www.dioscouri.com
 * @copyright Copyright (C) 2007 Dioscouri Design. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');

if ( !class_exists('Cachingcron') ) {
    JLoader::register( "Cachingcron", JPATH_ADMINISTRATOR.DS."components".DS."com_cachingcron".DS."defines.php" );
}

Cachingcron::load( "CachingcronHelperRoute", 'helpers.route' );

/**
 * Build the route
 * Is just a wrapper for CachingcronHelperRoute::build()
 * 
 * @param unknown_type $query
 * @return unknown_type
 */
function CachingcronBuildRoute(&$query)
{
    return CachingcronHelperRoute::build($query);
}

/**
 * Parse the url segments
 * Is just a wrapper for CachingcronHelperRoute::parse()
 * 
 * @param unknown_type $segments
 * @return unknown_type
 */
function CachingcronParseRoute($segments)
{
    return CachingcronHelperRoute::parse($segments);
}