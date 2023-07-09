<form class="form-horizontal" role="form" action="<?php echo $action; ?>" name="users" id="users" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name </label>
		<div class="col-sm-9">
			<?php echo form_error('fullname') ?>			
			<input type="text" name="name" id="name" placeholder="Full name" class="col-xs-10 col-sm-10" value="<?php echo $fullname; ?>"/>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username </label>
		<div class="col-sm-9">
			<?php echo form_error('username') ?>			
			<input type="text" name="username" id="usernmae" placeholder="Username" class="col-xs-10 col-sm-10" value="<?php echo $username; ?>"/>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password </label>
		<div class="col-sm-9">
			<?php echo form_error('password') ?>			
			<input type="text" name="password" id="password" placeholder="**********" class="col-xs-10 col-sm-10" value="<?php echo $password; ?>"/>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Active </label>
		<div class="col-sm-9">
			<select class="form-control col-xs-10 col-sm-10" name="is_active" id="is_active">
				<?php echo form_error('is_active') ?>
				<option value="">Please Choice</option>
				<?php 
					$key=array('Y'=>'Yes','N'=>'No');
					foreach ($key as $key => $value) {
						if($is_active==$key)
						{
							echo "<option value=".$key." selected>".$value."</option>";
						}else{
							echo "<option value=".$key.">".$value."</option>";
						}
					}
				?>
			</select>
		</div>
	</div>

	<div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<button class="btn btn-info" type="submit">
				<i class="ace-icon fa fa-check bigger-110"></i>
				Submit
			</button>

			&nbsp; &nbsp; &nbsp;
			<button class="btn" type="reset">
				<i class="ace-icon fa fa-undo bigger-110"></i>
				Reset
			</button>
			&nbsp; &nbsp; &nbsp;
			<a href="<?php echo site_url('users') ?>" class="btn btn-warning">Cancel</a>
		</div>
	</div>

	<div class="hr hr-24"></div>
</form>