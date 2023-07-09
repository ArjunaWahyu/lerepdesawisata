		<div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
		<div class="table-header">
			Results for events
			<div class="widget-toolbar">
				<button class="btn btn-white btn-info btn-sm">
					<i class="ace-icon fa  fa-check-square-o bigger-120 blue"></i>
					<a href="<?=site_url('events/create');?>"> Add new data</a>
				</button> 				
			</div>
		</div>
		<!-- div.dataTables_borderWrap -->
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Date Events</th>
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
			            foreach ($events_data as $events)
			            {
		            ?>
					<tr>
						<td><?php echo $events->event ?></td>
						<td><i class="ace-icon fa fa-calendar bigger-110 hidden-480"> &nbsp;</i><?php echo $events->event_date ?></td>
						<td class="hidden-480">
							
								<?php 
								$key=array('Y'=>'Published','N'=>'No Published');
								foreach ($key as $key => $value) {
									if($events->published == $key)
									{
										if($key=='Y'){
											echo "<span class=\"label label-success arrowed\">".$value."</span>";
										}else
										{
											echo "<span class=\"label label-danger arrowed-in\">".$value."</span>";
										}
									}
								} ?>
							
						</td>
						<td><?php echo $events->create_at ?></td>
						<td><?php echo $events->update_at ?></td>
						<td>
							<div class="hidden-sm hidden-xs action-buttons">

								<a class="red" href="<?=site_url('events/delete/'.$events->idevent);?>" onclick="javasciprt: return confirm('Are You Sure ?')">
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
											<a href="<?=site_url('events/delete/'.$events->idevent);?>" onclick="javasciprt: return confirm('Are You Sure ?')" class="tooltip-error" data-rel="tooltip" title="Delete">
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