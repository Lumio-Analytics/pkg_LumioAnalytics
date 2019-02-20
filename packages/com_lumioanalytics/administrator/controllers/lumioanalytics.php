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

jimport('joomla.application.component.controllerform');

/**
 * Lumioanalytic controller class.
 *
 * @since 1.6
 */
class LumioanalyticsControllerLumioanalytics extends JControllerForm
{
    /**
     * Constructor
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->view_list = 'lumioanalytics';
        parent::__construct();
    }
}