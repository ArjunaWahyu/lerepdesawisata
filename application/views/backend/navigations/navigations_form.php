<form class="form-horizontal" role="form" action="<?php echo $action; ?>" name="contents" id="contents" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name Navigations </label>
		<div class="col-sm-9">
			<?php echo form_error('name') ?>
			
			<input type="text" name="name" id="name" placeholder="Name Navigations" class="col-xs-10 col-sm-10" value="<?php echo $name; ?>"/>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Link Navigations </label>
		<div class="col-sm-9">
			<?php echo form_error('link') ?>
			
			<input type="text" name="link" id="link" placeholder="example/dashboard" class="col-xs-10 col-sm-10" value="<?php echo $link; ?>"/>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Icon Navigations </label>
		<div class="col-sm-9">
			<?php echo form_error('icon') ?>
			<select class="form-control col-xs-10 col-sm-10" name="icon" id="icon">
				<option value="">Please Choice</option>
				<?php
					$select = array( '#','fa-adjust' ,'fa-asterisk' ,'fa-ban' ,'fa-bar-chart-o' ,'fa-barcode' ,'fa-flask' ,'fa-beer' ,'fa-bell-o' ,'fa-bell' ,'fa-bolt' ,'fa-book' ,'fa-bookmark' ,'fa-bookmark-o' ,'fa-briefcase' ,'fa-bullhorn' ,'fa-calendar' ,'fa-camera' ,'fa-camera-retro' ,'fa-certificate' ,'fa-check-square-o' ,'fa-square-o' ,'fa-circle' ,'fa-circle-o' ,'fa-cloud' ,'fa-cloud-download' ,'fa-cloud-upload'
 ,'fa-coffee' ,'fa-cog' ,'fa-cogs' ,'fa-comment' ,'fa-comment-o' ,'fa-comments' ,'fa-comments-o' ,'fa-credit-card' ,'fa-tachometer'
 ,'fa-desktop' ,'fa-arrow-circle-o-down' ,'fa-download' ,'fa-pencil-square-o' ,'fa-envelope' ,'fa-envelope-o' ,'fa-exchange' ,'fa-exclamation-circle' ,'fa-external-link' ,'fa-eye-slash' ,'fa-eye' ,'fa-video-camera' ,'fa-fighter-jet' ,'fa-film' ,'fa-filter' ,'fa-fire' ,'fa-flag' ,'fa-folder' ,'fa-folder-open' ,'fa-folder-o' ,'fa-folder-open-o' ,'fa-cutlery' ,'fa-gift' ,'fa-glass' ,'fa-globe' ,'fa-users' ,'fa-hdd-o' ,'fa-headphones' ,'fa-heart' ,'fa-heart-o' ,'fa-home' ,'fa-inbox' ,'fa-info-circle' ,'fa-key' ,'fa-leaf' ,'fa-laptop' ,'fa-gavel' ,'fa-lemon-o' ,'fa-lightbulb-o' ,'fa-lock' ,'fa-unlock');
					foreach ($select as $selected){
						if($icon==$selected)
						{
							echo "<option value=".$selected." selected>".$selected."</option>";
						}else{
							echo "<option value=".$selected.">".$selected."</option>";
						}
					}
				?>
			</select>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Published Navigations </label>
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
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Type Navigations </label>
		<div class="col-sm-9">
			<select class="form-control col-xs-10 col-sm-10" name="type" id="type">
				<?php echo form_error('type') ?>
				<option value="">Please Choice</option>
				<?php 
					$key=array('B'=>'BackEnd','F'=>'FrontEnd');
					foreach ($key as $key => $value) {
						if($type==$key)
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
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Parent Navigations </label>
		<div class="col-sm-9">
			<?php echo dropdown('parent', 'navigations', 'name', 'id',array('parent'=>0),$parent,array('Parent'=>0))?>
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
			<a href="<?php echo site_url('navigations') ?>" class="btn btn-warning">Cancel</a>
		</div>
	</div>

	<div class="hr hr-24"></div>
</form>