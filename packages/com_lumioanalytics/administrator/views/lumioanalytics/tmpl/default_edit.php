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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root() . 'media/com_lumioanalytics/css/form.css');
?>
<script type="text/javascript">
	js = jQuery.noConflict();
	js(document).ready(function () {
		
	});
</script>

<form
	action="<?php echo JRoute::_('index.php?option=com_lumioanalytics&layout=edit'); ?>"
	method="post" enctype="multipart/form-data" name="adminForm" id="lumioanalytic-form" class="form-validate">

	<div class="form-horizontal">
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_LUMIOANALYTICS_TITLE_NO_KEY', true)); ?>
		<div class="row-fluid">
			<div class="span10 form-horizontal">
				<fieldset class="adminform">
					<div class="control-group">
						<?php echo sprintf(
							JText::_('COM_LUMIOANALYTICS_NO_KEY', true),
							JRoute::_('index.php?option=com_plugins&view=plugin&layout=edit&extension_id=' . LumioanalyticsHelper::getPluginId(), false)
						);
						?>
					</div>
				</fieldset>
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>

		

		<?php echo JHtml::_('bootstrap.endTabSet'); ?>

		<input type="hidden" name="task" value=""/>
		<?php echo JHtml::_('form.token'); ?>

	</div>
</form>
