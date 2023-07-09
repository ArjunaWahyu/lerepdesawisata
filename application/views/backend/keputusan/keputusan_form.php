<form class="form-horizontal" role="form" action="<?php echo $action; ?>" name="setting" id="setting" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Judul Keputusan </label>
		<div class="col-sm-9">
			<?php echo form_error('name') ?>
			
			<input type="text" name="name" id="name" placeholder="Title articles" class="col-xs-10 col-sm-10" value="<?php echo $name; ?>"/>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Published Contents </label>
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

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> isi keputusan </label>
		<div class="col-sm-9">
			<?php echo form_error('dest') ?>
			<textarea rows="2" name="dest" cols="20" id="mytextarea"><?php echo $dest; ?></textarea>
		</div>
	</div>

	<div class="space-4"></div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> </label>
		<div class="col-sm-9">
			<h4 class="header green">Search Engine Optimization</h4>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Meta Title Field </label>
		<div class="col-sm-9">
			<?php echo form_error('metatittle') ?>
			<textarea class="form-control limited" maxlength="255" rows="7" name="metatittle" id="metatittle"><?php echo $metatittle; ?></textarea>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Meta Desc Field </label>
		<div class="col-sm-9">
			<?php echo form_error('metadest') ?>
			<textarea class="form-control limited" maxlength="255" rows="7" name="metadest" id="metadest"><?php echo $metadest; ?></textarea>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Meta Keyword Field </label>
		<div class="col-sm-9">
			<?php echo form_error('metakey') ?>
			<textarea class="form-control limited" maxlength="255" rows="7" name="metakey" id="metakey"><?php echo $metakey; ?></textarea>
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
			<a href="<?php echo site_url('setting') ?>" class="btn btn-warning">Cancel</a>
		</div>
	</div>

	<div class="hr hr-24"></div>
</form>