<?php
/**
 * @version    $version 1.0.0 Mikel Martin  $
 * @package    Plg_Lumioanalytics
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

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

require_once __DIR__ . '/vendor/autoload.php';
JLoader::register('LumioanalyticsHelper', JPATH_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_lumioanalytics' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'lumioanalytics.php');

class plgSystemLumioAnalytics extends JPlugin
{
    function plgLumioAnalytics(&$subject, $config)
    {
        parent::__construct($subject, $config);
        $this->_plugin = JPluginHelper::getPlugin('system', 'LumioAnalytics');
        $this->_params = new JParameter($this->_plugin->params);
    }

    function onAfterInitialise()
    {
        if ($this->params->get('registered', 0) !== "1" &&
            LumioanalyticsHelper::is_valid_key($this->params->get('la_key', ''))) {
            if ($this->registerLumioIntegration()) {
                LumioanalyticsHelper::setAsRegistered();
            }
        }
    }

    protected function loadPluginDetails()
    {
        $xml = __DIR__ .'/lumioanalytics.xml';
        $doc = simplexml_load_file($xml);
        return array(
            'name'   =>  (string) $doc->name,
            'version' => (string) $doc->version
        );
    }

    protected function registerLumioIntegration($isActive = true)
    {
        $data = $this->loadPluginDetails();
        $client      = new \Lumio\IntegrationAPI\Client();
        $integration = new \Lumio\IntegrationAPI\Model\Integration(
            array(
                'key'              => $this->params->get('la_key', ''),
                'url'              => JURI::root(),
                'platform'         => 'Joomla',
                'platform_version' => JVERSION,
                'plugin'           => $data['name'],
                'plugin_version'   => $data['version'],
                'status'           => $isActive,
            )
        );

        try {
            $result = $client->registerIntegration($integration);
        } catch (Exception $e) {
            echo 'Exception when calling AdminsApi->getAll: ', $e->getMessage(), PHP_EOL;
        }
        return $client->succeeded();
    }

    function onAfterRender()
    {
        $key = $this->params->get('la_key', '');
        $javascript = '';
        $app = JFactory::getApplication();

        if ($app->isAdmin()) {
            return;
        }

        $buffer = JResponse::getBody();

        if (LumioanalyticsHelper::is_valid_key($key)) {
            $javascript =
            '<script
				type="text/javascript"
				async key="' . $key .'"
				src="https://app.lumio-analytics.com/widgets/lumio-analytics.js">
			</script>';
        }

        $buffer = preg_replace("/<\/head>/", "\n\n" . $javascript . "\n\n</head>", $buffer);

        JResponse::setBody($buffer);

        return true;
    }
}
?>
