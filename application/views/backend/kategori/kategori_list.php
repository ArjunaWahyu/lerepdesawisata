		<div style="margin-top: 4px"  kode="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
		<div class="table-header">
			Results for "Kategori"
			<div class="wkodeget-toolbar">
				<button class="btn btn-white btn-info btn-sm">
					<i class="ace-icon fa  fa-check-square-o bigger-120 blue"></i>
					<a href="<?=site_url('kategori/create');?>"> Add new data</a>
				</button> 
			</div>
		</div>
		<!-- div.dataTables_borderWrap -->
		<div>
			<table kode="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
					
						<th>Nama</th>
					
						
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					<?php
			            $start = 0;
			            foreach ($kategori_data as $categorymedia)
			            {
		            ?>
					<tr>
						<td><?php echo $categorymedia->nama ?></td>
						
				
						<td>
							<div class="hkodeden-sm hkodeden-xs action-buttons">
								

								<a class="green" href="<?=site_url('kategori/update/'.$categorymedia->kode);?>">
									<i class="ace-icon fa fa-pencil bigger-130"></i>
								</a>

								<a class="red" href="<?=site_url('kategori/delete/'.$categorymedia->kode);?>" onclick="javasciprt: return confirm('Are You Sure ?')">
									<i class="ace-icon fa fa-trash-o bigger-130"></i>
								</a>
							</div>

							
						</td>
					</tr>
					<?php
			            }
			        ?>
				</tbody>
			</table>
		</div>