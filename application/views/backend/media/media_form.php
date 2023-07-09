<form class="form-horizontal" role="form" action="<?php echo $action; ?>" name="users" id="users" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Media Name </label>
		<div class="col-sm-9">
			<?php echo form_error('name') ?>			
			<input type="text" name="name" id="name" placeholder="Media name" class="col-xs-10 col-sm-8" value="<?php echo $name; ?>"/>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Type Media </label>
		<div class="col-sm-9">
			<?php echo form_error('type') ?>
			<select class="form-control col-xs-10 col-sm-10" name="type" id="type">
				<option value="">Please Choice</option>
				<?php 
					$key=array('1'=>'Galery','2'=>'Video','3'=>'Music' );
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
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Category Media </label>
		<div class="col-sm-9">

			<select name="idcmedia" id="category" class="form-control col-xs-10 col-sm-10">
                <option value="">Selection</option>
                <?php $CI =& get_instance();
			echo $CI->get_cmedia($type,$idcmedia); ?>
            </select>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Media Path  (800*450)</label>
		<div class="col-sm-9">
			<?php echo form_error('date') ?>
			<div class="input-group">
				<span class="input-group-btn">
						<button type="button" class="btn btn-purple btn-sm">
							<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
							<a href="<?=site_url('assets/filemanager/dialog.php?type=0&amp;field_id=fieldID');?>" class="iframe-btn">Select</a>
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
			<a href="<?php echo site_url('media') ?>" class="btn btn-warning">Cancel</a>
		</div>
	</div>

	<div class="hr hr-24"></div>
</form>
		<script language="javascript">
        $(document).ready(function(){  
			$('#type').change(function(){
			            $.post("<?php echo base_url();?>media/get_category/"+$('#type').val(),{},function(obj){
			                $('#category').html(obj);
			            });
			        });
        });
        </script>