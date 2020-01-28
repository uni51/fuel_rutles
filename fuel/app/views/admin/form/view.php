<h2>Viewing #<?php echo $form->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Name</dt>
	<dd><?php echo $form->name; ?></dd>
	<br>
	<dt>Email</dt>
	<dd><?php echo $form->email; ?></dd>
	<br>
	<dt>Comment</dt>
	<dd><?php echo $form->comment; ?></dd>
	<br>
	<dt>Ip address</dt>
	<dd><?php echo $form->ip_address; ?></dd>
	<br>
	<dt>User agent</dt>
	<dd><?php echo $form->user_agent; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/form/edit/'.$form->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/form', 'Back', array('class' => 'btn btn-default')); ?>
</div>
