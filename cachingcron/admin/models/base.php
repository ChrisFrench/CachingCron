<?php
/**
 * @version 1.5
 * @package Cachingcron
 * @author  Dioscouri Design
 * @link    http://www.dioscouri.com
 * @copyright Copyright (C) 2007 Dioscouri Design. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');

class CachingcronModelBase extends DSCModel
{
	 /**
     * Method to get a table object, load it if necessary.
     *
     * @access  public
     * @param   string The table name. Optional.
     * @param   string The class prefix. Optional.
     * @param   array   Configuration array for model. Optional.
     * @return  object  The table
     * @since   1.5
     */
    public function getTable($name='', $prefix='CachingcronTable', $options = array())
    {
        JTable::addIncludePath( JPATH_ADMINISTRATOR . '/components/com_cachingcron/tables' );
        return parent::getTable($name, $prefix, $options);
    }

}