<form class="form-horizontal" role="form" action="<?php echo $action; ?>" name="users" id="users" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> slider Name </label>
		<div class="col-sm-9">
			<?php echo form_error('name') ?>			
			<input type="text" name="name" id="name" placeholder="slider name" class="col-xs-10 col-sm-8" value="<?php echo $name; ?>"/>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> slider Path  </label>
		<div class="col-sm-9">
			<?php echo form_error('date') ?>
			<div class="input-group">
				<span class="input-group-btn">
						<button type="button" class="btn btn-purple btn-sm">
							<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
							<a href="<?=site_url('assets/filemanager/dialog.php?type=1&amp;field_id=fieldID');?>" class="iframe-btn">Select</a>
						</button>
					</span>
				<input class="col-xs-10 col-sm-10" id="fieldID" type="text" name="path" value="<?php echo $path; ?>" />					
			</div>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Published </label>
		<div class="col-sm-9">
			<select class="form-control col-xs-10 col-sm-10" name="published" id="published">
				<?php echo form_error('published') ?>
				<option value="">Please Choice</option>
				<?php 
					$key=array('Y'=>'Yes','N'=>'No');
					foreach ($key as $key => $value) {
						if($published==$key)
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
			<a href="<?php echo site_url('petab') ?>" class="btn btn-warning">Cancel</a>
		</div>
	</div>

	<div class="hr hr-24"></div>
</form>