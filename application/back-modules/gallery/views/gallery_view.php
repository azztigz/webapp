
<div id="page-wrapper">
<div class="row">
	<div class="clearfix" style="height:20px;"></div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-picture"></span> Gallery
			<span class="pull-right"><?php echo Modules::run('uploader'); ?></span>
			</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="clearfix" style="height:10px;"></div>
				<div class="col-md-12">

					<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
					    <div class="slides"></div>
					    <!-- <h3 class="title"></h3> -->
					    <a class="prev">‹</a>
					    <a class="next">›</a>
					    <a class="close">×</a>
					    <a class="play-pause"></a>
					    <ol class="indicator"></ol>
					</div>

					<table class="table table-striped table-responsive table-hover table-condensed">
						<thead>
							<tr class="active">
								<th>#</th>
								<th>Preview</th>
								<th>Name</th>
								<th>Size</th>
								<th>Type</th>
								<th>Options</th>
							</tr>
						</thead>
  						<?php 
  							$f = $from;
  							if($gallery){
	  							foreach($gallery as $key=>$ad){ ?>
	  								<tr>
	  									<td><?php echo $f.'.'; ?></td>
	  									
									        <td>
									            <span class="preview">
									                <a href="<?php echo $ad->url; ?>" title="<?php echo $ad->name; ?>" download="<?php echo $ad->url; ?>" data-gallery>
									                	<img src="<?php echo $ad->thumbnail; ?>">
									                </a>
									            </span>
									        </td>
									   
	  									<td>
	  										<p class="name">
	  											<a href="<?php echo $ad->url; ?>" title="<?php echo $ad->name; ?>" download="<?php echo $ad->url; ?>">
	  												<?php echo ucfirst(strtolower($ad->name)); ?>
	  											</a>
	  										</p>
	  									</td>
	  									<td><?php echo $ad->size; ?></td>
	  									<td><?php echo $ad->type; ?></td>
	  									<td>
	  										<button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#removeImage" onclick="getImage('<?php echo $ad->id;?>','<?php echo ucfirst(strtolower($ad->name)); ?>')"><span class="fa fa-times"></span></button>
	  									</td>
	  								</tr>
  							
  						<?php 
  								$f++;
  								} 
  							}
  						?>
					</table>
					<div class="clearfix">
						<div class="pull-left">
							<?php echo 'Showing&nbsp;&nbsp;<span class="badge">' . $from . '</span>&nbsp;&nbsp;to&nbsp;&nbsp;<span class="badge">' . $to . '</span>&nbsp;&nbsp;of&nbsp;&nbsp;<span class="badge badge-warning">' . $total . '</span> administrator(s)'?>
						</div>
						<div id="pagination-wrap" class="text-right pull-right" style="margin: 0;">
							<?php echo $this->pagination->create_links(); ?> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<div class="modal fade" id="removeImage" tabindex="-1" role="dialog" aria-labelledby="removeLabel" aria-hidden="true">
	<form role="form" action="post" id="form-remove-image">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="removeTitle"></h4>
	      </div>
	      <div class="modal-body removeimage">
	      	<input type="hidden" value="" id="image_id">
	      	Are you sure?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Cancel</button>
	        <button type="button" onclick="removeImage()" class="btn btn-danger btn-xs">Remove</button>
	      </div>
	    </div>
	  </div>
  	</form>
</div>

<script type="text/javascript">
	function getImage(id,name){
		$('#image_id').val(id);
		$('#removeTitle').text(name);
	}

	function removeImage(){
		$('#removeLabel').text(name);
	    $.ajax({
	      url : '<?php echo base_url("gallery/removeImage"); ?>',
	      type : 'post',
	      data : 'id='+$('#image_id').val(),
	      dataType : 'html',
	      success : function(json) {
	        window.location = "<?php echo base_url("gallery"); ?>";
	      }
	    });    
	}  
</script>