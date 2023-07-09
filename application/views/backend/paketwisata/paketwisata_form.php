<form class="form-horizontal" role="form" action="<?php echo $action; ?>" name="paketwisata" id="paketwisata" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>
		<div class="col-sm-9">
			 <?php echo form_error('nama') ?>
			
			<input type="text" name="nama" id="nama" placeholder="Nama " class="col-xs-10 col-sm-10" value="<?php echo $nama; ?>"/>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Paket </label>
		<div class="col-sm-9">
				
			<input type="text" name="nama_paket" id="nama_paket" placeholder="Nama Paket" class="col-xs-10 col-sm-10" value="<?php echo $nama_paket; ?>"/>
		</div>
	</div>
	<div class="space-4"></div>
<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Harga Paket </label>
		<div class="col-sm-9">
				
			<input type="text" name="harga" id="harga" placeholder="Harga" class="col-xs-10 col-sm-10" value="<?php echo $harga; ?>"/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Published Media </label>
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
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Media Path (800*450)  </label>
		<div class="col-sm-9">
			<?php echo form_error('path') ?>
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
		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Keterangan </label>
		<div class="col-sm-9">
			<?php echo form_error('keterangan') ?>
			<textarea rows="2" name="keterangan" cols="20" id="mytextarea"><?php echo $keterangan; ?></textarea>
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
			<textarea class="form-control limited" maxlength="255" rows="7" name="metakey" id="metakey"><?php  echo $metakey; ?></textarea>
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
			<a href="<?php echo site_url('paketwisata') ?>" class="btn btn-warning">Cancel</a>
		</div>
	</div>

	<div class="hr hr-24"></div>
</form>