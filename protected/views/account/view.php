<?php
	$isMod = false;
	
	$role[] =  Yii::t('conference',Rights::module()->authenticatedName);
	if(Yii::app()->user->isGuest){
		$isGuest = true;
	}else{
		$isUser = true;
		$rights = Rights::getAssignedRoles(Yii::app()->user->id);
		foreach($rights as $r){
			if($r->name == Rights::module()->moderatorName){
				$isMod = true;
	
			}
			
		
		}
	}
	
	$rights = Rights::getAssignedRoles($model->id);
		foreach($rights as $r){
			if($r->name == Rights::module()->moderatorName){

				$role[] =  Yii::t('conference',Rights::module()->moderatorName);
			}
			if($r->name == Rights::module()->presenterName){

				$role[] =  Yii::t('conference',Rights::module()->presenterName);
			}
		
	}

	$userRole = implode(', ', $role);
	$isAdmin = Yii::app()->getModule('user')->isAdmin()	;
	$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	$model->username,
);
?>
<?php $this->widget('ext.imeeting-toolbars.ImeetingToolbarsWidget',
						array('model'=>isset($model)?$model:null, 'controller'=>'account', 'mod'=>$isMod || $isAdmin, 'index' =>FALSE)
); ?>
<h1><?php echo UserModule::t('View User').' "'.$model->username.'"'; ?></h1>

<?php 
/*
echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(UserModule::t('Create User'),array('create')),
			CHtml::link(UserModule::t('Update User'),array('update','id'=>$model->id)),
			CHtml::linkButton(UserModule::t('Delete User'),array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?'))),
		),
	));
 * 
 */ 


	$attributes = array(
	//	'id',
		'email',
	);
	
	$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
	if ($profileFields) {
		foreach($profileFields as $field) {
			array_push($attributes,array(
					'label' => UserModule::t($field->title),
					'name' => $field->varname,
					'type'=>'raw',
					'value' => (($field->widgetView($model->profile))?$field->widgetView($model->profile):(($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname))),
				));
		}
	}
	
	array_push($attributes,
	//	'password',
	//	'email',
	//	'activkey',
		array(
			'name' => 'createtime',
			'value' => date("d.m.Y H:i:s",$model->createtime),
		),
		array(
			'name' => 'lastvisit',
			'value' => (($model->lastvisit)?date("d.m.Y H:i:s",$model->lastvisit):UserModule::t("Not visited")),
		),

		array(
			'name' => 'status',
			'value' => User::itemAlias("UserStatus",$model->status),
		),
		array(
			'name' => 'Room\'s role',
			'value' => $userRole
		)
	);
	
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>$attributes,
		'cssFile' => false,
		
	));
	

?>
