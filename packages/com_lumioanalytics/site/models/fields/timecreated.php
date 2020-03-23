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
// no direct access
defined('_JEXEC') or die('Restricted access');

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

/**
 * Supports an HTML select list of categories
 *
 * @since  1.6
 */
class JFormFieldTimecreated extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var        string
	 * @since    1.6
	 */
	protected $type = 'timecreated';

	/**
	 * Method to get the field input markup.
	 *
	 * @return   string  The field input markup.
	 *
	 * @since    1.6
	 */
	protected function getInput()
	{
		// Initialize variables.
		$html = array();

		$time_created = $this->value;

		if (!strtotime($time_created))
		{
			$time_created = JFactory::getDate()->toSql();
			$html[]       = '<input type="hidden" name="' . $this->name . '" value="' . $time_created . '" />';
		}

		$hidden = (boolean) $this->element['hidden'];

		if ($hidden == null || !$hidden)
		{
			$jdate       = new JDate($time_created);
			$pretty_date = $jdate->format(JText::_('DATE_FORMAT_LC2'));
			$html[]      = "<div>" . $pretty_date . "</div>";
		}

		return implode($html);
	}
}
