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
        element = document.getElementById('la_frame');
        yPosition = (element.offsetTop - element.scrollTop + element.clientTop);

        var body = document.body,
            html = document.documentElement;

        var height = Math.max( body.scrollHeight, body.offsetHeight,
            html.clientHeight, html.scrollHeight, html.offsetHeight ) - yPosition;
        document.getElementById('la_frame').style.height = height+'px';
    });
</script>
<style>.container-fluid {padding: 0px !important;margin: 0px !important;}</style>
<iframe id="la_frame" src="https://mod.lumio.page/dasb.html"  style="width:100%;height: auto" frameborder="no"></iframe>
    