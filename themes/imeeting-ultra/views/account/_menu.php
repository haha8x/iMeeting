<ul class="actions">
<?php 
	if (count($list)) {
		foreach ($list as $item)
			echo "<li>".$item."</li>";
	}
?>
	<!--<li><?php echo CHtml::link(UserModule::t('List User'),array('/account')); ?></li>-->
	<li><?php echo CHtml::link(UserModule::t('Manage User'),array('admin')); ?></li>
	
</ul><!-- actions -->