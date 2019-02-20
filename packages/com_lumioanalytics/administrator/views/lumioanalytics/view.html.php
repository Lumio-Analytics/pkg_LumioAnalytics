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
