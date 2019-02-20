<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Lumioanalytics
 * @author     Mikel <info@lumio-analytics.com >
 * @copyright  2019 Lumio Analytics
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_lumioanalytics'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Lumioanalytics', JPATH_COMPONENT_ADMINISTRATOR);
JLoader::register('LumioanalyticsHelper', JPATH_COMPONENT_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'lumioanalytics.php');

$controller = JControllerLegacy::getInstance('Lumioanalytics');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
