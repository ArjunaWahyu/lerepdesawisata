<?php $this->load->view($header); ?>
  
  <div id="home-slider" class="home-slider">
      <div class="flexslider loading home-slider-gallery">
        <ul class="slides"> 
       <?php 
       $data = array();
        $CI = get_instance();
        $result = $CI->slider_model->get_by_all();
        foreach ($result as $key) {
          echo'<li><img src="'.$key->path.'" alt="Screenshoot 1" /></li>';
          $data[].='<h3>'.$key->name.'</h3><p>By '.$key->fullname.'</p>';
        }
       ?>
        </ul>
      </div> <!-- End Home-Slider-Gallery -->
		<div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
		<div class="table-header">
		 "Paket Pariwisata"
			<div class="widget-toolbar">
				<!-- <button class="btn btn-white btn-info btn-sm">
					<i class="ace-icon fa  fa-check-square-o bigger-120 blue"></i>
					<a href="<?=site_url('paketwisata/create');?>"> Add new data</a>
				</button>  -->
			</div>
		</div>
		<!-- div.dataTables_borderWrap -->
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Nama Paket</th>
						<th class="hidden-480">Harga</th>
						<th>
							<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
							Keterangan
						</th>
						
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					<?php
			            $start = 0;
			            foreach ($paketwisata_data as $paketwisata)
			            {
		            ?>
					<tr>
						<td><?php  echo $paketwisata->nama ?></td>
						<td><?php 
								echo $paketwisata->nama_paket 
						?>
						<td><?php  echo $paketwisata->harga ?></td>
						<td><?php echo $paketwisata->keterangan ?></td>
						<td>
							<div class="hidden-sm hidden-xs action-buttons">
								

								<a class="green" href="<?=site_url('paketwisatan/pesan/'.$paketwisata->id);?>">
									<i class="ace-icon fa fa-upload bigger-130"></i>
								</a>

								<!-- <a class="red" href="<?=site_url('paketwisata/delete/');?>" onclick="javasciprt: return confirm('Are You Sure ?')">
									<i class="ace-icon fa fa-trash-o bigger-130"></i>
								</a> -->
							</div>

							<div class="hidden-md hidden-lg">
								<div class="inline pos-rel">
									<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
										<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
									</button>

									<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
										

										<li>
											<a href="<?=site_url('paketwisatan/update/');?>" class="tooltip-success" data-rel="tooltip" title="Edit">
												<span class="green">
													<i class="ace-icon fa fa-upload-square-o bigger-120"></i>
												</span>
											</a>
										</li>

										<!-- <li>
											<a href="<?=site_url('paketwisata/delete/');?>" onclick="javasciprt: return confirm('Are You Sure ?')" class="tooltip-error" data-rel="tooltip" title="Delete">
												<span class="red">
													<i class="ace-icon fa fa-trash-o bigger-120"></i>
												</span>
											</a>
										</li> -->
									</ul>
								</div>
							</div>
						</td>
					</tr>
					<?php
			           }
			        ?>
				</tbody>
			</table>
		</div>
		"@Harga Perpengunjung"