<form class="form-horizontal" role="form" action="<?php echo $action; ?>" name="kategori" id="kategori" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="kode" value="<?php echo $kode; ?>" /> 
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>
		<div class="col-sm-9">
			<?php echo form_error('nama') ?>
			
			<input type="text" name="name" id="name" placeholder="Title articles" class="col-xs-10 col-sm-10" value="<?php echo $nama; ?>"/>
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
			<a href="<?php echo site_url('kategori') ?>" class="btn btn-warning">Cancel</a>
		</div>
	</div>

	<div class="hr hr-24"></div>
</form>