<?php
/**
* @package		Cachingcron
* @copyright	Copyright (C) 2009 DT Design Inc. All rights reserved.
* @license		GNU GPLv2 <http://www.gnu.org/licenses/old-licenses/gpl-2.0.html>
* @link 		http://www.dioscouri.com
*/


// no direct access
defined('_JEXEC') or die('Restricted access');


class Cachingcron extends DSC
{
	protected $_name = 'cachingcron';	
	protected $_version 		= '1.0';
    protected $_build          = 'r100';
    protected $_versiontype    = 'community';
    protected $_copyrightyear 	= '2012';
    protected $_min_php		= '5.3';

    public $show_linkback = '1';
    public $amigosid = '';
    public $page_tooltip_dashboard_disabled = '0';
    public $page_tooltip_config_disabled = '0';
    public $page_tooltip_tools_disabled = '0';
	public $cachingcron_can_edit = '0';
	/**
	 * Returns the query
	 * @return string The query to be used to retrieve the rows from the database
	 */
	function _buildQuery()
	{
		$query = "SELECT * FROM #__cachingcron_config";
		return $query;
	}

	
	

	/**
	 * Get component config
	 *
	 * @acces	public
	 * @return	object
	 */
	public static function getInstance() {
		static $instance;

		if (!is_object($instance)) {
			$instance = new Cachingcron();
		}

		return $instance;
	}
	
	
	 /**
     * Intelligently loads instances of classes in framework
     *
     * Usage: $object = Mediamanager::getClass( 'MediamanagerHelperCarts', 'helpers.carts' );
     * Usage: $suffix = Mediamanager::getClass( 'MediamanagerHelperCarts', 'helpers.carts' )->getSuffix();
     * Usage: $categories = Mediamanager::getClass( 'MediamanagerSelect', 'select' )->category( $selected );
     *
     * @param string $classname   The class name
     * @param string $filepath    The filepath ( dot notation )
     * @param array  $options
     * @return object of requested class (if possible), else a new JObject
     */
    public static function getClass( $classname, $filepath='controller', $options=array( 'site'=>'admin', 'type'=>'components', 'ext'=>'com_cachingcron' )  )
    {
        return parent::getClass( $classname, $filepath, $options  );
    }
    
    /**
     * Method to intelligently load class files in the framework
     *
     * @param string $classname   The class name
     * @param string $filepath    The filepath ( dot notation )
     * @param array  $options
     * @return boolean
     */
    public static function load( $classname, $filepath='controller', $options=array( 'site'=>'admin', 'type'=>'components', 'ext'=>'com_cachingcron' ) )
    {
        return parent::load( $classname, $filepath, $options  );
    }
 	
}