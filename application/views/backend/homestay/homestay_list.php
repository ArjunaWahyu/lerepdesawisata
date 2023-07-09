		<style type="text/css">
			img {
				height: 100px;
				width: 90%;
				margin-left: auto;
				margin-right: auto; 
			}
		</style>
		<div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
		<div class="table-header">
			Results for homestay
			<div class="widget-toolbar">
				<button class="btn btn-white btn-info btn-sm">
					<i class="ace-icon fa  fa-check-square-o bigger-120 blue"></i>
					<a href="<?=site_url('homestay/create');?>"> Add new data</a>
				</button> 			
			</div>
		</div>
		<!-- div.dataTables_borderWrap -->
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Nama homestay</th>
						<th>Katerangan</th>
						
						<th>
							<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
							Gambar
						</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					<?php
			            $start = 0;
			            foreach ($homestay_data as $homestay)
			            {
		            ?>
					<tr>
						<td><?php echo $homestay->name ?></td>
						<td><?php echo $homestay->dest ?></td>
						
						<td><?php     echo'
               <img src="'.$homestay->path.'" alt="'.$homestay->name.'" /> 
      
              
             ';
						 //echo '<li class="hidden-480"><img src="'.$homestay->path.'" /></li>';
          
       ?></td>
						<td>
							<div class="hidden-sm hidden-xs action-buttons">
								<!-- <a class="blue" href="<?=site_url('homestay/read/'.$homestay->id);?>">
									<i class="ace-icon fa fa-search-plus bigger-130"></i>
								</a> -->

								<a class="green" href="<?=site_url('homestay_b/update/'.$homestay->id);?>">
									<i class="ace-icon fa fa-pencil bigger-130"></i>
								</a>

								<a class="red" href="<?=site_url('homestay_b/delete/'.$homestay->id);?>" onclick="javasciprt: return confirm('Are You Sure ?')">
									<i class="ace-icon fa fa-trash-o bigger-130"></i>
								</a>
							</div>

							<div class="hidden-md hidden-lg">
								<div class="inline pos-rel">
									<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
										<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
									</button>

									<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
										<li>
											<a href="<?=site_url('homestay/read/'.$homestay->id);?>" class="tooltip-info" data-rel="tooltip" title="View">
												<span class="blue">
													<i class="ace-icon fa fa-search-plus bigger-120"></i>
												</span>
											</a>
										</li>

										<li>
											<a href="<?=site_url('homestay_b/update/'.$homestay->id);?>" class="tooltip-success" data-rel="tooltip" title="Edit">
												<span class="green">
													<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
												</span>
											</a>
										</li>

										<li>
											<a href="<?=site_url('homestay/delete/'.$homestay->id);?>" onclick="javasciprt: return confirm('Are You Sure ?')" class="tooltip-error" data-rel="tooltip" title="Delete">
												<span class="red">
													<i class="ace-icon fa fa-trash-o bigger-120"></i>
												</span>
											</a>
										</li>
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