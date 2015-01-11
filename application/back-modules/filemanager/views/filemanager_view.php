<?php $this->load->view('assets/elfinder'); ?>
<?php //phpinfo(); ?>
<div id="page-wrapper">
	<div class="row">
		<div class="clearfix" style="height:20px;"></div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-users"></i> File Manager</h3>
			</div>
			<div class="panel-body">
				<div class="col-md-12">
					<?php //pr($this->session->all_userdata()); ?>
					<div id="elfinder"></div>
				</div>
			</div>
		</div>
	</div>
</div>

