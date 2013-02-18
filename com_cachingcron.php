<?php
/**
 * @package		Joomla.Cli
 *
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// Make sure we're being called from the command line, not a web interface
if (array_key_exists('REQUEST_METHOD', $_SERVER)) die();

/**
 * This is a CRON script which should be called from the command-line, not the
 * web. For example something like:
 * /usr/bin/php /path/to/site/cli/cachingcron.php
 */

// Set flag that this is a parent file.
define('_JEXEC', 1);
define('DS', DIRECTORY_SEPARATOR);

error_reporting(E_ALL | E_NOTICE);
ini_set('display_errors', 1);

// Load system defines
if (file_exists(dirname(dirname(__FILE__)) . '/defines.php'))
{
	require_once dirname(dirname(__FILE__)) . '/defines.php';
}

if (!defined('_JDEFINES'))
{
	define('JPATH_BASE', dirname(dirname(__FILE__)));
	require_once JPATH_BASE . '/includes/defines.php';
}

require_once JPATH_LIBRARIES . '/import.php';
require_once JPATH_LIBRARIES . '/cms.php';

// Force library to be in JError legacy mode
JError::$legacy = true;

// Load the configuration
require_once JPATH_CONFIGURATION . '/configuration.php';

/**
 * 
 * This script is simple it visiting the pages with Wget, but since we have full access we can also clear the cache and do other things
 *
 * @package  Joomla.CLI
 * @since    2.5
 */
class CachingCron extends JApplicationCli
{
	/**
	 * Entry point for the script
	 *
	 * @return  void
	 *
	 * @since   2.5
	 */
	public function execute()
	{
		// Purge all old records
	jimport('joomla.database.database');
		jimport('joomla.utilities.date');
		$db = JFactory::getDBO();
       $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__cachingcron_links AS tbl');
        $query->where("tbl.enabled = '1'" );
		
  
		
        $db->setQuery($query);
		
		$items = $db->loadObjectList();

		
		//$links = array("0" => array('link' => 'http://dev.jalc.org/'), "1" => array('link' => 'http://dev.jalc.org/events'), "2" => array('link' => 'http://dev.jalc.org/events'));
		//$links = (object) $alinks;
		
		$this->out('Retreving the pages');
		
	foreach ($items as $link) {
		$this->out('getting page' . $link->url);
		exec('wget -q -O /dev/null '. $link->url );
	}
		
		$this->out('Finished fetching updates');
	}
}

JApplicationCli::getInstance('CachingCron')->execute();