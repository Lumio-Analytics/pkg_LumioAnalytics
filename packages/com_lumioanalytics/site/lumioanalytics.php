<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Lumioanalytics
 * @author     Mikel <info@lumio-analytics.com >
 * @copyright  2019 Lumio Analytics
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Lumioanalytics', JPATH_COMPONENT);
JLoader::register('LumioanalyticsController', JPATH_COMPONENT . '/controller.php');


// Execute the task.
$controller = JControllerLegacy::getInstance('Lumioanalytics');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
