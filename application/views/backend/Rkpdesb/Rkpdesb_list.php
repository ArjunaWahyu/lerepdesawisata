		<div style="margin-top: 4px" id="message">
			<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
		</div>
		<div class="table-header">
			Results for " Rkpdesb"
			<!-- <div class="widget-toolbar">
				<button class="btn btn-white btn-info btn-sm">
					<i class="ace-icon fa  fa-check-square-o bigger-120 blue"></i>
					<a href="<?= site_url('visimisi/create'); ?>"> Add new data</a>
				</button> 
			</div> -->
		</div>
		<!-- div.dataTables_borderWrap -->
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Title</th>
						<th class="hidden-480">Status</th>
						<th>
							<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
							Created
						</th>
						<th>
							<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
							Updated
						</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$start = 0;
					foreach ($Rkpdesb_data as $visimisi) {
					?>
						<tr>
							<td><?php echo $visimisi->name ?></td>
							<td class="hidden-480">

								<?php
								$key = array('Y' => 'Published', 'N' => 'No Published');
								foreach ($key as $key => $value) {
									if ($visimisi->published == $key) {
										if ($key == 'Y') {
											echo "<span class=\"label label-success arrowed\">" . $value . "</span>";
										} else {
											echo "<span class=\"label label-danger arrowed-in\">" . $value . "</span>";
										}
									}
								} ?>

							</td>
							<td><?php echo $visimisi->create_at ?></td>
							<td><?php echo $visimisi->update_at ?></td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<!-- <a class="blue" href="<?= site_url('visimisi/read/' . $visimisi->id); ?>">
									<i class="ace-icon fa fa-search-plus bigger-130"></i>
								</a> -->

									<a class="green" href="<?= site_url('Rkpdesb/update/' . $visimisi->id); ?>">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>

									<!-- <a class="red" href="<?= site_url('visimisi/delete/' . $visimisi->id); ?>" onclick="javasciprt: return confirm('Are You Sure ?')">
									<i class="ace-icon fa fa-trash-o bigger-130"></i>
								</a> -->
								</div>

								<div class="hidden-md hidden-lg">
									<div class="inline pos-rel">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>

										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											<!-- <li>
											<a href="<?= site_url('visimisi/read/' . $visimisi->id); ?>" class="tooltip-info" data-rel="tooltip" title="View">
												<span class="blue">
													<i class="ace-icon fa fa-search-plus bigger-120"></i>
												</span>
											</a>
										</li> -->

											<li>
												<a href="<?= site_url('Rkpdesb/update/' . $visimisi->id); ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
													<span class="green">
														<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
													</span>
												</a>
											</li>

											<!-- <li>
											<a href="<?= site_url('visimisi/delete/' . $visimisi->id); ?>" onclick="javasciprt: return confirm('Are You Sure ?')" class="tooltip-error" data-rel="tooltip" title="Delete">
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