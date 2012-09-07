<?php
/**
 * @version	1.5
 * @package	Cachingcron
 * @author 	Dioscouri Design
 * @link 	http://www.dioscouri.com
 * @copyright Copyright (C) 2007 Dioscouri Design. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');

Cachingcron::load('CachingcronModelBase','models.base');

class CachingcronModelDashboard extends CachingcronModelBase 
{
	function getTable($name='Config', $prefix='CachingcronTable', $options = array())
	{
		return parent::getTable($name, $prefix, $options);
	}
}