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

/**
 * Lumioanalytics helper.
 *
 * @since  1.6
 */
class LumioanalyticsHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param   string  $vName  string
	 *
	 * @return void
	 */
	public static function addSubmenu($vName = '')
	{
		
	}

	/**
	 * Gets the files attached to an item
	 *
	 * @param   int     $pk     The item's id
	 *
	 * @param   string  $table  The table's name
	 *
	 * @param   string  $field  The field's name
	 *
	 * @return  array  The files
	 */
	public static function getFiles($pk, $table, $field)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query
			->select($field)
			->from($table)
			->where('id = ' . (int) $pk);

		$db->setQuery($query);

		return explode(',', $db->loadResult());
	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return    JObject
	 *
	 * @since    1.6
	 */
	public static function getActions()
	{
		$user   = JFactory::getUser();
		$result = new JObject;

		$assetName = 'com_lumioanalytics';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action)
		{
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}

	public static function getPluginId() {
		// Get a db connection.
		$db = JFactory::getDbo();

		// Create a new query object.
		$query = $db->getQuery(true);

		// Select all records from the user profile table where key begins with "custom.".
		// Order it by the ordering field.
		$query->select($db->quoteName(array('extension_id')));
		$query->from($db->quoteName('#__extensions'));
		$query->where($db->quoteName('element') . ' = "lumioanalytics"');
		$query->order('ordering ASC');

		// Reset the query using our newly populated query object.
		$db->setQuery($query);

		return $db->loadResult();
	}

	public static function setAsRegistered($registered = true) {
		// Get a db connection.
		$db = JFactory::getDbo();

		// Create a new query object.
		$query = $db->getQuery(true);

		// Select all records from the user profile table where key begins with "custom.".
		// Order it by the ordering field.
		$query->select($db->quoteName(array('params')));
		$query->from($db->quoteName('#__extensions'));
		$query->where($db->quoteName('element') . ' = "lumioanalytics"');
		$query->order('ordering ASC');

		// Reset the query using our newly populated query object.
		$db->setQuery($query);
		$params = json_decode($db->loadResult(), true);
		$params['registered'] = $registered?"1":"0";
		// Update
		$db->setQuery(
			$db->getQuery(true)
				->update('#__extensions')
				->set('params = ' . $db->quote(json_encode($params)))
				->where($db->quoteName('element') . ' = "lumioanalytics"')
		)->execute();
	}

	public static function is_valid_key( $key ) 
    {
        return preg_match('/^\w{40}$/', $key);
    }
}

