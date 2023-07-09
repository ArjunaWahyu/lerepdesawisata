<form class="form-horizontal" role="form" action="<?php echo $action; ?>" name="users" id="users" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="idevent" value="<?php echo $idevent; ?>" /> 
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Events Name </label>
		<div class="col-sm-9">
			<?php echo form_error('event') ?>			
			<input type="text" name="event" id="event" placeholder="Events name" class="col-xs-10 col-sm-8" value="<?php echo $event; ?>"/>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Events Date  </label>
		<div class="col-sm-9">
			<?php echo form_error('event_date') ?>
			<div class="input-group">
				<span class="input-icon">
					<input class="col-xs-10 col-sm-10 date-picker" id="id-date-picker-1" type="text" name="event_date" data-date-format="yyyy-mm-dd" value="<?php echo $event_date; ?>" />
					<i class="ace-icon fa fa-calendar blue"></i>
				</span>
			</div>
		</div>
	</div>

	<div class="space-4"></div>

	<?php 
	 $h = '<select name="hour" id="hour">';
	 $m = '<select name="minute" id="minute">';
	 for($i = 0; $i< 60; $i++){
	  if($i < 24){
	   $h .= '<option value="'.(($i > 9)? $i : "0$i").'">'.(($i > 9)? $i : "0$i").'</option>';
	  }
	  $m .= '<option value="'.(($i > 9)? $i : "0$i").'">'.(($i > 9)? $i : "0$i").'</option>';
	 }
	 $h .= '</select>';
	 $m .= '</select>';
	?>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Events Time  </label>
		<div class="col-sm-9">
			<?php echo form_error('hour') ?>
			<?php echo form_error('minute') ?>
			<div class="input-group">
				<span class="input-icon">
					<?php echo "$h&nbsp;:&nbsp;$m";?>&nbsp;:&nbsp;<select name="second" disabled><option value="00">00</option></select>
				</span>
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
			<a href="<?php echo site_url('events') ?>" class="btn btn-warning">Cancel</a>
		</div>
	</div>

	<div class="hr hr-24"></div>
</form>