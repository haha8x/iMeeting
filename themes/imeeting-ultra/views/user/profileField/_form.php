<div class="form_wrapper">

<?php echo CHtml::beginForm('','',array('class'=>'search_form general_form')); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo CHtml::errorSummary($model); ?>
	
	<div class="row varname">
		<?php echo CHtml::activeLabelEx($model,'varname'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php echo (($model->id)?CHtml::activeTextField($model,'varname',array('size'=>60,'maxlength'=>50,'readonly'=>true)):CHtml::activeTextField($model,'varname',array('size'=>60,'maxlength'=>50))); ?>
			</span>
		<?php echo CHtml::error($model,'varname'); ?>
	</div>
		
		<br /><p class="hint"><?php echo UserModule::t("Allowed lowercase letters and digits."); ?></p>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'title'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php echo CHtml::activeTextField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
			</span>
			<?php echo CHtml::error($model,'title'); ?>
		</div>
		<br /><p class="hint"><?php echo UserModule::t('Field name on the language of "sourceLanguage".'); ?></p>
	</div>

	<div class="row field_type">
		<?php echo CHtml::activeLabelEx($model,'field_type'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php echo (($model->id)?CHtml::activeTextField($model,'field_type',array('size'=>60,'maxlength'=>50,'readonly'=>true,'id'=>'field_type')):CHtml::activeDropDownList($model,'field_type',ProfileField::itemAlias('field_type'),array('id'=>'field_type'))); ?>
			</span>
			<?php echo CHtml::error($model,'field_type'); ?>
		</div>
		<br /><p class="hint"><?php echo UserModule::t('Field type column in the database.'); ?></p>
	</div>

	<div class="row field_size">
		<?php echo CHtml::activeLabelEx($model,'field_size'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php echo (($model->id)?CHtml::activeTextField($model,'field_size',array('readonly'=>true)):CHtml::activeTextField($model,'field_size')); ?>
			</span>
		<?php echo CHtml::error($model,'field_size'); ?>
		</div>
		<br /><p class="hint"><?php echo UserModule::t('Field size column in the database.'); ?></p>
	</div>

	<div class="row field_size_min">
		<?php echo CHtml::activeLabelEx($model,'field_size_min'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php echo CHtml::activeTextField($model,'field_size_min'); ?>
		</span>
		<?php echo CHtml::error($model,'field_size_min'); ?>
		</div>
		<br /><p class="hint"><?php echo UserModule::t('The minimum value of the field (form validator).'); ?></p>
	</div>

	<div class="row required">
		<?php echo CHtml::activeLabelEx($model,'required'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php echo CHtml::activeDropDownList($model,'required',ProfileField::itemAlias('required')); ?>
		</span>
			<?php echo CHtml::error($model,'required'); ?>
		</div>
		<br /><p class="hint"><?php echo UserModule::t('Required field (form validator).'); ?></p>
	</div>

	<div class="row match">
		<?php echo CHtml::activeLabelEx($model,'match'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php echo CHtml::activeTextField($model,'match',array('size'=>60,'maxlength'=>255)); ?>
		</span>
		<?php echo CHtml::error($model,'match'); ?>
		</div>
		<br /><p class="hint"><?php echo UserModule::t("Regular expression (example: '/^[A-Za-z0-9\s,]+$/u')."); ?></p>
	</div>

	<div class="row range">
		<?php echo CHtml::activeLabelEx($model,'range'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php echo CHtml::activeTextField($model,'range',array('size'=>60,'maxlength'=>5000)); ?>
		</span>
			<?php echo CHtml::error($model,'range'); ?>
		</div>
		<br /><p class="hint"><?php echo UserModule::t('Predefined values (example: 1;2;3;4;5 or 1==One;2==Two;3==Three;4==Four;5==Five).'); ?></p>
	</div>

	<div class="row error_message">
		<?php echo CHtml::activeLabelEx($model,'error_message'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php echo CHtml::activeTextField($model,'error_message',array('size'=>60,'maxlength'=>255)); ?>
		</span>
			<?php echo CHtml::error($model,'error_message'); ?>
		</div>
		<br /><p class="hint"><?php echo UserModule::t('Error message when you validate the form.'); ?></p>
	</div>

	<div class="row other_validator">
		<?php echo CHtml::activeLabelEx($model,'other_validator'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left"><?php echo CHtml::activeTextField($model,'other_validator',array('size'=>60,'maxlength'=>255)); ?>
			</span>
			<?php echo CHtml::error($model,'other_validator'); ?>
		</div>
		<br /><p class="hint"><?php echo UserModule::t('JSON string (example: {example}).',array('{example}'=>CJavaScript::jsonEncode(array('file'=>array('types'=>'jpg, gif, png'))))); ?></p>
	</div>

	<div class="row default">
		<?php echo CHtml::activeLabelEx($model,'default'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php echo (($model->id)?CHtml::activeTextField($model,'default',array('size'=>60,'maxlength'=>255,'readonly'=>true)):CHtml::activeTextField($model,'default',array('size'=>60,'maxlength'=>255))); ?>
			</span>
			<?php echo CHtml::error($model,'default'); ?>
		</div>
		<br /><p class="hint"><?php echo UserModule::t('The value of the default field (database).'); ?></p>
	</div>

	<div class="row widget">
		<?php echo CHtml::activeLabelEx($model,'widget'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
		<?php 
		list($widgetsList) = ProfileFieldController::getWidgets($model->field_type);
		echo CHtml::activeDropDownList($model,'widget',$widgetsList,array('id'=>'widgetlist'));
		//echo CHtml::activeTextField($model,'widget',array('size'=>60,'maxlength'=>255)); ?>
		</span>
		<?php echo CHtml::error($model,'widget'); ?>
		</div>
		<br /><p class="hint"><?php echo UserModule::t('Widget name.'); ?></p>
	</div>

	<div class="row widgetparams">
		<?php echo CHtml::activeLabelEx($model,'widgetparams'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php echo CHtml::activeTextField($model,'widgetparams',array('size'=>60,'maxlength'=>5000,'id'=>'widgetparams')); ?>
		</span>
			<?php echo CHtml::error($model,'widgetparams'); ?>
		</div>
		<br /><p class="hint"><?php echo UserModule::t('JSON string (example: {example}).',array('{example}'=>CJavaScript::jsonEncode(array('param1'=>array('val1','val2'),'param2'=>array('k1'=>'v1','k2'=>'v2'))))); ?></p>
	</div>

	<div class="row position">
		<?php echo CHtml::activeLabelEx($model,'position'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php echo CHtml::activeTextField($model,'position'); ?>
		</span>
			<?php echo CHtml::error($model,'position'); ?>
		</div>
		<br /><p class="hint"><?php echo UserModule::t('Display order of fields.'); ?></p>
	</div>

	<div class="row visible">
		<?php echo CHtml::activeLabelEx($model,'visible'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php echo CHtml::activeDropDownList($model,'visible',ProfileField::itemAlias('visible')); ?>
		</span>
			<?php echo CHtml::error($model,'visible'); ?>
		</div>
	</div>

	<div class="row buttons">
		<div style='float:left; width:115px'>&nbsp</div>
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->
<div id="dialog-form" title="<?php echo UserModule::t('Widget parametrs'); ?>">
	<form>
	<fieldset>
		<label for="name">Name</label>
		<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
		<label for="value">Value</label>
		<input type="text" name="value" id="value" value="" class="text ui-widget-content ui-corner-all" />
	</fieldset>
	</form>
</div>
