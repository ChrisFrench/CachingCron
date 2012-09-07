<?php
/**
 * @package	Cachingcron
 * @author 	Dioscouri Design
 * @link 	http://www.dioscouri.com
 * @copyright Copyright (C) 2007 Dioscouri Design. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/
 
/** ensure this file is being included by a parent file */
defined( '_JEXEC' ) or die( 'Restricted access' );


Cachingcron::load('CachingcronTable','tables.base');

class CachingcronTableItems extends CachingcronTable 
{

	function CachingcronTableItems( &$db ) 
	{
		$tbl_key 	= 'id';
		$tbl_suffix = 'links';
		$this->set( '_suffix', $tbl_suffix );
		$name 		= "cachingcron";
		
		parent::__construct( "#__{$name}_{$tbl_suffix}", $tbl_key, $db );	
	}
	
	
	
}