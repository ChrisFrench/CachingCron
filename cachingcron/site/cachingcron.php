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

// Check the registry to see if our Cachingcron class has been overridden
if ( !class_exists('Cachingcron') ) 
    JLoader::register( "Cachingcron", JPATH_ADMINISTRATOR.DS."components".DS."com_cachingcron".DS."defines.php" );

// before executing any tasks, check the integrity of the installation
Cachingcron::getClass( 'CachingcronHelperDiagnostics', 'helpers.diagnostics' )->checkInstallation();

// set the options array
$options = array( 'site'=>'site', 'type'=>'components', 'ext'=>'com_cachingcron' );

// Require the base controller
Cachingcron::load( 'CachingcronController', 'controller', $options );

// Require specific controller if requested
$controller = JRequest::getWord('controller', JRequest::getVar( 'view' ) );
if (!Cachingcron::load( 'CachingcronController'.$controller, "controllers.$controller", $options ))
    $controller = '';

if (empty($controller))
{
    // redirect to default
    $default_controller = new CachingcronController();
    $redirect = "index.php?option=com_cachingcron&view=" . $default_controller->default_view;
    $redirect = JRoute::_( $redirect, false );
    JFactory::getApplication()->redirect( $redirect );
}

$doc = JFactory::getDocument();
$uri = JURI::getInstance();
$js = "var com_cachingcron = {};\n";
$js.= "com_cachingcron.jbase = '".$uri->root()."';\n";
$doc->addScriptDeclaration($js);

$parentPath = JPATH_ADMINISTRATOR . '/components/com_cachingcron/helpers';
DSCLoader::discover('CachingcronHelper', $parentPath, true);

$parentPath = JPATH_ADMINISTRATOR . '/components/com_cachingcron/library';
DSCLoader::discover('Cachingcron', $parentPath, true);

// load the plugins
JPluginHelper::importPlugin( 'cachingcron' );

// Create the controller
$classname = 'CachingcronController'.$controller;
$controller = Cachingcron::getClass( $classname );

// ensure a valid task exists
$task = JRequest::getVar('task');
if (empty($task))
{
    $task = 'display';
    JRequest::setVar( 'layout', 'default' );
}
JRequest::setVar( 'task', $task );

// Perform the requested task
$controller->execute( $task );

// Redirect if set by the controller
$controller->redirect();

?>