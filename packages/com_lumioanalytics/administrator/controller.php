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
// No direct access
defined('_JEXEC') or die;

/**
 * Class LumioanalyticsController
 *
 * @since 1.6
 */
class LumioanalyticsController extends JControllerLegacy
{
    /**
     * Method to display a view.
     *
     * @param boolean $cachable  If true, the view output will be cached
     * @param mixed   $urlparams An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
     *
     * @return JController This object to support chaining.
     *
     * @since 1.5
     */
    public function display($cachable = false, $urlparams = false)
    {
        $view = JFactory::getApplication()->input->getCmd('view', 'lumioanalytics');
        JFactory::getApplication()->input->set('view', $view);

        parent::display($cachable, $urlparams);

        return $this;
    }
}
