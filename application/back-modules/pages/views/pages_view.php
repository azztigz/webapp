<style type="text/css">
	.alert-danger{
		padding: 5px !important;
	}

	.bootstrap-switch.bootstrap-switch-small {
		min-width: 135px;
		height: 26px;
	}
</style>
<div id="page-wrapper">
<div class="row">
	<div class="clearfix" style="height:20px;"></div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				<i class="fa fa-file-text"></i> Pages <span class="pull-right">
				<button class="btn btn-primary btn-xs" onclick="createnew()"><i class="fa fa-file-text"></i> Create New</button></span>
			</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<!-- <div class="col-md-12">
					<button class="btn btn-primary btn-xs" onclick="createnew()"><i class="fa fa-file-text"></i> Create New</button>
				</div> -->
				<div class="clearfix" style="height:10px;"></div>
				<div class="col-md-12">
					
					<div class="col-md-3">
					    <!-- <div class="list-group">
					      <?php /*if($pages){ 
					      	 foreach($pages as $page){ 
					      		$active =  $page->page_idPK == $this->uri->segment(3) ? "active": ""; ?>
					      		<a href="<?php echo base_url('pages/editpage/'.$page->page_idPK); ?>" class="list-group-item <?php echo $active; ?>"><i class="fa fa-file-text"></i> <?php echo ucfirst(strtolower($page->page_title)); ?></a>
					      	<?php } 
					      	 }*/ ?>
						</div> -->
						<div class="dd" id="nestable3">
		                    <ol class="dd-list">
		                    	 <?php if($total_pages > 0){ 
							      	 foreach($pages as $page){ 
							      		$active =  $page->page_idPK == $this->uri->segment(3) ? "active": ""; ?>
							      		
							      		<li class="dd-item dd3-item" data-id="13">
				                            <div class="dd-handle dd3-handle"></div>
				                            <div class="dd3-content <?php echo $active; ?>">
				                            	<a href="<?php echo base_url('pages/editpage/'.$page->page_idPK); ?>"> <?php echo ucfirst(strtolower($page->page_title)); ?></a>
				                            </div>
				                        </li>
							      	<?php } 
							      	 } ?>
		                    </ol>
		                </div>
					</div>
					<div class="col-md-9">
						<?php $disp = isset($pageinfo) ? 'style="display:none;"': ''; ?>
						<div class="createnew" <?php echo $disp; ?>>
							<div class="panel panel-default">
							  <div class="panel-heading"><i class="fa fa-file-text"></i> Create new page</div>
							  <div class="panel-body">
								<form role="form" action="" method="post" id="form-create-page" enctype="multipart/form-data">
									<div class="form-group">
										<label>Slug</label>
										<input type="text" name="page_slug" class="form-control" id="InputSlug" placeholder="Slug">
										<div id="page_slug" style="display:none;"></div>
									</div>
									<div class="form-group">
										<label>Title</label>
										<input type="text" name="page_title" class="form-control" id="InputTitle" placeholder="Title">
										<div id="page_title" style="display:none;"></div>
									</div>
									<div class="form-group">
										<label>Content</label>
										<textarea class="ckeditor" id="page_content" cols="80" name="page_content" rows="10" placeholder="Content"></textarea>
										<div id="page_content_error" style="display:none;"></div>
									</div>
									<div class="form-group">
										<label>Meta Title</label>
										<textarea name="page_meta_title" class="form-control" id="InputMeta" placeholder="Meta Title" rows="3"></textarea>
									</div>
									<div class="form-group">
										<label>Meta Keywords</label>
										<textarea name="page_meta_keyword" class="form-control" id="InputMeta" placeholder="Meta Keywords" rows="3"></textarea>
									</div>
									<div class="form-group">
										<label>Meta Description</label>
										<textarea name="page_meta_desc" class="form-control" id="InputMeta" placeholder="Meta Description" rows="3"></textarea>
									</div>
									<div class="form-group">
										<label>Status</label>
										<br>
										<input type="checkbox" name="page_active" checked data-size="small" data-on-text="Published" data-off-text="Draft" value="0">
									</div>
									<hr/>
									<button type="button" class="btn btn-success btn-xs" onclick="savePage()"><i class="fa fa-save"></i> Save</button>
								</form>
							</div>
							</div>
						</div>
						<?php if(isset($pageinfo)){ ?>
						<div class="editpage">
							<div class="panel panel-default">
							<div class="panel-heading"><i class="fa fa-file-text"></i> <?php echo ucfirst(strtolower($pageinfo->page_title)); ?></div>
							  <div class="panel-body">
								<form role="form" action="" method="post" id="form-edit-page" enctype="multipart/form-data">
									<input type="hidden" name="page_idPK" value="<?php echo $pageinfo->page_idPK; ?>">
									<div class="form-group">
										<label>Slug</label>
										<input type="text" name="edit_page_slug" class="form-control" id="edit_InputSlug" placeholder="Slug" value="<?php echo $pageinfo->page_slug; ?>">
										<div id="edit_page_slug" style="display:none;"></div>
									</div>
									<div class="form-group">
										<label>Title</label>
										<input type="text" name="edit_page_title" class="form-control" id="InputTitle" placeholder="Title" value="<?php echo $pageinfo->page_title; ?>">
										<div id="edit_page_title" style="display:none;"></div>
									</div>
									<div class="form-group">
										<label>Content</label>
										<textarea class="ckeditor" id="edit_page_content" cols="80" name="edit_page_content" rows="10" placeholder="Content"><?php echo $pageinfo->page_content; ?></textarea>
										<div id="edit_page_content_error" style="display:none;"></div>
									</div>
									<div class="form-group">
										<label>Meta Title</label>
										<textarea name="edit_page_meta_title" class="form-control" id="InputMeta" placeholder="Meta Title" rows="3"><?php echo $pageinfo->page_meta_title; ?></textarea>
									</div>
									<div class="form-group">
										<label>Meta Keywords</label>
										<textarea name="edit_page_meta_keyword" class="form-control" id="InputMeta" placeholder="Meta Keywords" rows="3"><?php echo $pageinfo->page_meta_keyword; ?></textarea>
									</div>
									<div class="form-group">
										<label>Meta Description</label>
										<textarea name="edit_page_meta_desc" class="form-control" id="InputMeta" placeholder="Meta Description" rows="3"><?php echo $pageinfo->page_meta_desc; ?></textarea>
									</div>
									<div class="form-group">
										<label>Status</label>
										<input type="checkbox" name="edit_page_active" checked data-size="small" data-on-text="Published" data-off-text="Draft" value="<?php echo $pageinfo->page_active; ?>">
									</div>
									<hr/>
									<button type="button" class="btn btn-success btn-xs" onclick="updatePage()"><i class="fa fa-save"></i> Save Page</button>
									<span class="pull-right"><button type="button" class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#deletePage"><span class="glyphicon glyphicon-remove"></span> Delete Page</button></span>
								</form>
							</div>
							</div>

							<div class="modal fade" id="deletePage" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							        <h4 class="modal-title" id="deleteLabel"><i class="fa fa-file-text"></i> <?php echo ucfirst(strtolower($pageinfo->page_title)); ?></h4>
							      </div>
							      <div class="modal-body">
							        Are you sure you want to delete this page?
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Cancel</button>
							        <button type="button" class="btn btn-primary btn-xs" onclick="deletePage('<?php echo $pageinfo->page_idPK; ?>')">Yes</button>
							      </div>
							    </div>
							  </div>
							</div>

						</div>
						<?php } ?>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>
</div>



<script type="text/javascript">
	$(function() {
    	//$('input[type="checkbox"],[type="radio"]').not('#create-switch').not('#events-switch').bootstrapSwitch();
		$("[name='page_active']").bootstrapSwitch('state',false);
		$('input[name="page_active"]').on('switchChange.bootstrapSwitch', function(event, state) {
		  //console.log(this); // DOM element
		  //console.log(event); // jQuery event
		  //console.log(state); // true | false
		  if(state == true){
		  	$("[name='page_active']").val(1);
		  }else{
		  	$("[name='page_active']").val(0);
		  }
		});

		<?php if(isset($pageinfo) && $pageinfo->page_active == 1){ ?>
			$("[name='edit_page_active']").bootstrapSwitch('state',true);
		<?php }else{ ?>
			$("[name='edit_page_active']").bootstrapSwitch('state',false);
		<?php } ?>

		
		$('input[name="edit_page_active"]').on('switchChange.bootstrapSwitch', function(event, state) {
		  if(state == true){
		  	$("[name='edit_page_active']").val(1);
		  }else{
		  	$("[name='edit_page_active']").val(0);
		  }
		});
	
	});


	function createnew(){
		$('.createnew').fadeIn('slow');
		$('.editpage').hide();
	}


	function savePage(){
		var body = CKEDITOR.instances['page_content'].getData();
		$('#page_content').val(body);

	    $.ajax({
	      url : '<?php echo base_url("pages/savePage"); ?>',
	      type : 'post',
	      data : $("#form-create-page").serialize(),
	      dataType : 'json',
	      success : function(json) {
	        if(json.stats == 1){
	          if(json.page_slug != ""){
	            $("#page_slug").html(json.page_slug).fadeIn();
	          }else{
	            $("#page_slug").empty().fadeOut();
	          }
	          if(json.page_title != ""){
	            $("#page_title").html(json.page_title).fadeIn();
	          }else{
	            $("#page_title").empty().fadeOut();
	          }
	          if(json.page_content != ""){
	            $("#page_content_error").html(json.page_content).fadeIn();
	          }else{
	            $("#page_content_error").empty().fadeOut();
	          }
	        }else{
	          window.location = "<?php echo base_url("pages"); ?>";
	        }
	      }
	    });    
	}

	function updatePage(){
		var body = CKEDITOR.instances['edit_page_content'].getData();
		$('#edit_page_content').val(body);

	    $.ajax({
	      url : '<?php echo base_url("pages/updatePage"); ?>',
	      type : 'post',
	      data : $("#form-edit-page").serialize(),
	      dataType : 'json',
	      success : function(json) {
	        if(json.stats == 1){
	          if(json.page_slug != ""){
	            $("#edit_page_slug").html(json.page_slug).fadeIn();
	          }else{
	            $("#edit_page_slug").empty().fadeOut();
	          }
	          if(json.page_title != ""){
	            $("#edit_page_title").html(json.page_title).fadeIn();
	          }else{
	            $("#edit_page_title").empty().fadeOut();
	          }
	          if(json.page_content != ""){
	            $("#edit_page_content_error").html(json.page_content).fadeIn();
	          }else{
	            $("#edit_page_content_error").empty().fadeOut();
	          }
	        }else{
	          window.location = json.page;
	        }
	      }
	    });    
	}

	function deletePage(id){
	    $.ajax({
	      url : '<?php echo base_url("pages/deletePage"); ?>',
	      type : 'post',
	      data : 'page_idPK='+id,
	      dataType : 'json',
	      success : function(json) {
	          window.location = '<?php echo base_url('pages'); ?>';
	      }
	    });    
	}

	$(document).ready(function(){
		$('#InputSlug, #edit_InputSlug').bind("cut copy paste",function(e) {
		  e.preventDefault();
		}).keypress(function (e) {
		    var regex = new RegExp("^[a-zA-Z0-9-_]+$");
		    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		    if (regex.test(str)) {
		        return true;
		    }

		    e.preventDefault();
		    return false;
		});
	});

</script>
