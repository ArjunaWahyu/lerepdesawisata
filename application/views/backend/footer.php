
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Administrator</span>
							Application &copy; 2020
						</span>

						&nbsp; &nbsp;
						<!-- <span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span> -->
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		

		<!-- <![endif]-->

		<!--[if IE]>
		<script src="<?=base_url();?>assets/js/jquery.1.11.1.min.js"></script>
		<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?=base_url();?>assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='<?=base_url();?>assets/js/jquery1x.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?=base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="<?=base_url('assets/js/jquery.dataTables.min.js');?>"></script>
		<script src="<?=base_url('assets/js/jquery.dataTables.bootstrap.min.js');?>"></script>
		<script src="<?=base_url('assets/js/dataTables.tableTools.min.js');?>"></script>
		<script src="<?=base_url('assets/js/dataTables.colVis.min.js');?>"></script>
		<script src="<?=base_url();?>assets/tinymce/js/tinymce/tinymce.min.js" type="text/javascript" ></script>
		<script src="<?=base_url('assets/fancybox/jquery.fancybox.pack.js');?>" type="text/javascript" ></script>
		<script src="<?=base_url('assets/js/bootstrap-datepicker.min.js');?>"></script>

		<!--[if lte IE 8]>
		  <script src="<?=base_url();?>assets/js/excanvas.min.js"></script>
		<![endif]-->
		
		<!-- ace scripts -->
		<script src="<?=base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?=base_url();?>assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">

			jQuery(function($) {
				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});

				$('.iframe-btn').fancybox({
					  'width'	: 880,
					  'height'	: 570,
					  'type'	: 'iframe',
					  'autoScale'   : false
		      	});
		      	
				//initiate dataTables plugin
				var oTable1 = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aaSorting": [],
			    } );
				//oTable1.fnAdjustColumnSizing();

		        tinymce.init({
				    selector: "#mytextarea",theme: "modern",width: 680,height: 300,
				    plugins: [
				         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
				         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
				         "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
				   ],
				   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
				   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
				   image_advtab: true ,
				   
				   external_filemanager_path:"<?=base_url();?>assets/filemanager/",
				   filemanager_title:"Responsive Filemanager" ,
				   external_plugins: { "filemanager" : "<?=base_url();?>assets/filemanager/plugin.min.js"}
				 });
			});
		</script>
	</body>
</html>
