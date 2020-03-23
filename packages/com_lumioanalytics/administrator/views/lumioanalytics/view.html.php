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

jimport('joomla.application.component.view');

/**
 * View to edit
 *
 * @since 1.6
 */
class LumioanalyticsViewLumioanalytics extends JViewLegacy
{
    protected $state;

    protected $item;

    protected $form;

    protected $plugin;

    /**
     * Display the view
     *
     * @param string $tpl Template name
     *
     * @return void
     *
     * @throws Exception
     */
    public function display($tpl = null)
    {
        //$this->state = $this->get('State');
        //$this->item  = $this->get('Item');
        $this->form  = $this->get('Form');
        $key = '';
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        $this->addToolbar();
        $this->plugin = JPluginHelper::getPlugin('system', 'lumioanalytics');
        if ($this->plugin) {
            $params = new JRegistry($this->plugin->params);
            $key = $params->get('la_key', '');
        }
        if (!LumioanalyticsHelper::is_valid_key($key)) {
            $tpl = 'edit';
        }
        parent::display($tpl);
    }

    /**
     * Add the page title and toolbar.
     *
     * @return void
     *
     * @throws Exception
     */
    protected function addToolbar()
    {
        JFactory::getApplication()->input->set('hidemainmenu', false);

        $user  = JFactory::getUser();
        
        $canDo = LumioanalyticsHelper::getActions();

        JToolBarHelper::title(JText::_('COM_LUMIOANALYTICS'), 'lumioanalytic.png');
    }
}
