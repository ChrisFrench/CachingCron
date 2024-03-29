<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php $form = @$this -> form; ?>
<?php $row = @$this -> row; ?>
<?php JHTML::_('behavior.calendar');
	JHtml::_('behavior.formvalidation');
?>

<form action="<?php echo JRoute::_( @$form['action'] ) ?>" method="post" class="adminform" name="adminForm" id="adminForm" enctype="multipart/form-data" >

	<fieldset>
		<legend>
			<?php echo JText::_("BASIC INFORMATION"); ?>
		</legend>

		<table class="admintable">
			<tr>
				<td class="key"> <?php echo JText::_('id'); ?>: </td>
				<td> <?php echo @$row -> id; ?> </td>
			</tr>

			<tr>
				<td class="key"> <?php echo JText::_('Name'); ?>: </td>
				<td>
				<input name="name" value="<?php echo @$row -> name; ?>" size="50" maxlength="250" type="text" style="font-size: 20px;" />
				</td>
			</tr>
			<tr>
				<td class="key"> <?php echo JText::_('URL'); ?>: </td>
				<td>
				<input name="url" value="<?php echo @$row -> url; ?>" size="50" maxlength="250" type="text" style="font-size: 20px;" />
				</td>
			</tr>
			
			<tr>
				<td class="key"> <?php echo JText::_('Date Created'); ?>: </td>
				<td> <?php echo JHTML::calendar(@$row -> datecreated, 'datecreated', 'datecreated', ''); ?> </td>
			</tr>
			<tr>
				<td class="key"> <?php echo JText::_('Last Modified'); ?>: </td>
				<td> <?php echo JHTML::calendar(@$row -> lastmodified, 'lastmodified', 'lastmodified', ''); ?> </td>
			</tr>
		</table>
	</fieldset>
	<div>
		<input type="hidden" name="id" id="id" value="<?php echo @$row -> id; ?>" />
		<input type="hidden" name="params" id="params" value="" />
		<input type="hidden" name="task" value="" />
	</div>
</form>
