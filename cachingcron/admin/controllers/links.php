<?php
/**
* @package		Cachingcron
* @copyright	Copyright (C) 2009 DT Design Inc. All rights reserved.
* @license		GNU GPLv2 <http://www.gnu.org/licenses/old-licenses/gpl-2.0.html>
* @link 		http://www.dioscouri.com
*/

/** ensure this file is being included by a parent file */
defined( '_JEXEC' ) or die( 'Restricted access' );

class CachingcronControllerLinks extends CachingcronController 
{
	
	
	/**
	 * constructor
	 */
	function __construct() 
	{
		parent::__construct();
		
		$this->set('suffix', 'links');
	    $this->registerTask( 'enabled.enable', 'boolean' );
        $this->registerTask( 'enabled.disable', 'boolean' );
		

	}
	
	function _setModelState()
    {
    	$state = parent::_setModelState();   	
		$app = JFactory::getApplication();
		$model = $this->getModel( $this->get('suffix') );
    	$ns = $this->getNamespace();

    	$state['filter_name']   = $app->getUserStateFromRequest($ns.'name', 'filter_name', '', '');
		$state['filter_id_from']   = $app->getUserStateFromRequest($ns.'name', 'filter_id_from', '', '');
		$state['filter_id_to']   = $app->getUserStateFromRequest($ns.'name', 'filter_id_to', '', '');
		$state['filter_url'] = $app->getUserStateFromRequest($ns.'url', 'filter_url', '', '');
      	$state['filter_datecreated'] = $app->getUserStateFromRequest($ns.'datecreated', 'filter_datecreated', '', '');
      	$state['filter_lastmodified'] = $app->getUserStateFromRequest($ns.'lastmodified', 'filter_lastmodified', '', '');
		$state['filter_lastcron'] = $app->getUserStateFromRequest($ns.'lastcron', 'filter_lastcron', '', '');
		$state['filter_enabled'] 	= $app->getUserStateFromRequest($ns.'enabled', 'filter_enabled', '', '');
		
      	
    	foreach (@$state as $key=>$value)
		{
			$model->setState( $key, $value );	
		}
  		return $state;
    }
	
	
	
}