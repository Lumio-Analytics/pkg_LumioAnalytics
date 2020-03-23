<?php
/**
 * @version    $version 1.0.0 Mikel Martin  $
 * @package    Com_Lumioanalytics
 * @author     Mikel <info@lumio-analytics.com >
 * @copyright    Copyright (C) 2020 Lumio Analytics. All rights reserved.
 * @license    GNU/GPL, see license.html
 *
 * Lumio Analytics , Discover who is visiting your site.<
 * Copyright 2019-2020 Lumio Analytics
 *
 * Lumio Analytics is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Lumio Analytics is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
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
