<div id="page-wrapper">
<div class="row">
	<div class="clearfix" style="height:20px;"></div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				<span class="glyphicon glyphicon-tasks"></span> 
					Navigations 
				<span class="pull-right">
					<a href="<?php echo base_url('navigations'); ?>">
					<button class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-tasks"></span> 
							Create New
					</button>
					</a>
				</span>
			</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="clearfix" style="height:10px;"></div>
				<div class="col-md-12">
					<div class="col-md-3">
						<div class="dd" id="nestable3">
							<ol class="dd-list">
							<?php 								
								foreach($menu as $key=>$nav){ 
									if(isset($nav->children)){
	                        ?>
	                            	<li class="dd-item dd3-item" data-info="" data-id="<?php echo $nav->info->nav_idPK; ?>" id="nav_<?php echo $nav->info->nav_idPK; ?>">
										<div class="dd-handle dd3-handle"></div>
										<div class="dd3-content"><a href="<?php echo base_url('navigations/editnav/'.$nav->info->nav_idPK); ?>"><?php echo $nav->info->nav_title; ?></a></div>
											<ol class="dd-list">
												<?php foreach($nav->children as $key=>$child){ ?>
	                                            <li class="dd-item dd3-item" data-info="" data-id="<?php echo $child->info->nav_idPK; ?>" id="nav_<?php echo $child->info->nav_idPK; ?>">
													<div class="dd-handle dd3-handle"></div>
													<div class="dd3-content"><a href="<?php echo base_url('navigations/editnav/'.$child->info->nav_idPK); ?>"><?php echo $child->info->nav_title; ?></a></div>
												</li>
	                                        	<?php } ?>
											</ol>
									</li>
	                        <?php    
	                            	}else{
	                        ?>
	                                <li class="dd-item dd3-item" data-info="" data-id="<?php echo $nav->info->nav_idPK; ?>" id="nav_<?php echo $nav->info->nav_idPK; ?>">
											<div class="dd-handle dd3-handle"></div>
											<div class="dd3-content"><a href="<?php echo base_url('navigations/editnav/'.$nav->info->nav_idPK); ?>"><?php echo $nav->info->nav_title; ?></a></div>
									</li>
	                        <?php 
	                            	} 
								} 
							?>

							</ol>
							<hr/>
							<button type="button" onclick="saveMenu(0,'save')" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Save</button>
						</div>
					</div>
					<div class="col-md-9">

					

					<?php if($navs){ ?>
						<!-- Edit Nav -->

						<div class="editnav">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
										<span class="glyphicon glyphicon-tasks"></span> <?php echo ucwords(strtolower($navs->nav_title)); ?></h3>
								</div>
								<div class="panel-body">

									<form role="form" action="" method="post" id="form-edit-nav">
										<input type="hidden" name="edit_nav_id" id="edit_nav_id" value="<?php echo $navs->nav_idPK; ?>">
										<div class="form-group">
											<label>Title</label>
											<input type="text" name="edit_nav_title" class="form-control" id="edit_InputTitle" placeholder="Title" value="<?php echo $navs->nav_title; ?>">
											<div id="edit_nav_title" style="display:none;"></div>
										</div>
										<div class="form-group">
											<label>Slug</label>
											<input type="text" name="edit_nav_slug" class="form-control" id="edit_InputSlug" placeholder="Slug" value="<?php echo $navs->nav_slug; ?>">
											<div id="edit_nav_slug" style="display:none;"></div>
										</div>
										<div class="form-group">
											<label>Pages</label>
											<select class="form-control" name="edit_nav_page">
												<option value=""></option>
												<?php 
													if($pages){ 
														foreach($pages as $page){
															$selected = $navs->page_idFK == $page->page_idPK ? 'selected': '';
															?>
																<option value="<?php echo $page->page_idPK; ?>" <?php echo $selected; ?>>
																	<?php echo $page->page_title; ?>
																</option>
															<?php 
														}
													} 
												?>
											</select>
											<div id="edit_nav_page" style="display:none;"></div>
										</div>
										<div class="form-group">
											<label>Status</label>
											<br>
											<input type="checkbox" name="edit_nav_active" checked data-size="small" data-on-text="On" data-off-text="Off" value="<?php echo $navs->nav_active; ?>">
										</div>
										<hr/>
										<button type="button" onclick="updateNavigation()" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Update</button>
										<button type="button" onclick="delNavigation('<?php echo $navs->nav_idPK; ?>','delete')" class="btn btn-danger btn-xs pull-right"><i class="fa fa-save"></i> Delete</button>
									</form>
								</div>
							</div>
						</div>
						
					<?php }else{ ?>
						<!-- Create Nav -->

						<div class="createnav">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">
										<span class="glyphicon glyphicon-tasks"></span> Create new navigation</h3>
								</div>
								<div class="panel-body">

									<form role="form" action="" method="post" id="form-create-nav">
										<div class="form-group">
											<label>Title</label>
											<input type="text" name="nav_title" class="form-control" id="InputTitle" placeholder="Title">
											<div id="nav_title" style="display:none;"></div>
										</div>
										<div class="form-group">
											<label>Slug</label>
											<input type="text" name="nav_slug" class="form-control" id="InputSlug" placeholder="Slug">
											<div id="nav_slug" style="display:none;"></div>
										</div>
										<div class="form-group">
											<label>Pages</label>
											<select class="form-control" name="nav_page">
												<option value=""></option>
												<?php 
												if($pages){ 
													foreach($pages as $page){
														?>
														<option value="<?php echo $page->page_idPK; ?>"><?php echo $page->page_title; ?></option>
														<?php 
													}
												} 
												?>
											</select>
											<div id="nav_page" style="display:none;"></div>
										</div>
										<div class="form-group">
											<label>Status</label>
											<br>
											<input type="checkbox" name="nav_active" checked data-size="small" data-on-text="On" data-off-text="Off" value="0">
										</div>
										<hr/>
										<button type="button" onclick="saveNavigation()" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Create</button>
									</form>
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
<textarea id="nestable-output" style="display:none;"></textarea>


<script type="text/javascript">

	$(function() {
		//$('input[type="checkbox"],[type="radio"]').not('#create-switch').not('#events-switch').bootstrapSwitch();
		$("[name='nav_active']").bootstrapSwitch('state',false);
		$('input[name="nav_active"]').on('switchChange.bootstrapSwitch', function(event, state) {
			if(state == true){
				$("[name='nav_active']").val(1);
			}else{
				$("[name='nav_active']").val(0);
			}
		});

		<?php if($navs && $navs->nav_active == 1){ ?>
			$("[name='edit_nav_active']").bootstrapSwitch('state',true);
		<?php }else{ ?>
			$("[name='edit_nav_active']").bootstrapSwitch('state',false);
		<?php } ?>
		
		$('input[name="edit_nav_active"]').on('switchChange.bootstrapSwitch', function(event, state) {
		  if(state == true){
		  	$("[name='edit_nav_active']").val(1);
		  }else{
		  	$("[name='edit_nav_active']").val(0);
		  }
		});

	});

	function saveNavigation(){
		$.ajax({
			url : '<?php echo base_url("navigations/saveNavigation"); ?>',
			type : 'post',
			data : $("#form-create-nav").serialize(),
			dataType : 'json',
			success : function(json) {
				if(json.stats == 1){
					if(json.nav_title != ""){
						$("#nav_title").html(json.nav_title).fadeIn();
					}else{
						$("#nav_title").empty().fadeOut();
					}
					if(json.nav_slug != ""){
						$("#nav_slug").html(json.nav_slug).fadeIn();
					}else{
						$("#nav_slug").empty().fadeOut();
					}
					if(json.nav_page != ""){
						$("#nav_page").html(json.nav_page).fadeIn();
					}else{
						$("#nav_page").empty().fadeOut();
					}
				}else{
					saveMenu(json.id, 'create');
				}
			}
		});    
	}

	function updateNavigation(){
		$.ajax({
			url : '<?php echo base_url("navigations/updateNavigation"); ?>',
			type : 'post',
			data : $("#form-edit-nav").serialize(),
			dataType : 'json',
			success : function(json) {
				if(json.stats == 1){
					if(json.edit_nav_title != ""){
						$("#edit_nav_title").html(json.edit_nav_title).fadeIn();
					}else{
						$("#edit_nav_title").empty().fadeOut();
					}
					if(json.nav_slug != ""){
						$("#edit_nav_slug").html(json.edit_nav_slug).fadeIn();
					}else{
						$("#edit_nav_slug").empty().fadeOut();
					}
					if(json.nav_page != ""){
						$("#edit_nav_page").html(json.edit_nav_page).fadeIn();
					}else{
						$("#edit_nav_page").empty().fadeOut();
					}
				}else{
					window.location = json.link;
				}
			}
		});    
	}

	$(function () {
		$('#datetimepicker1').datetimepicker({
				pickTime: false
		});
	});

	function saveMenu(id, type){
		//alert($('.dd-list').html());
		$.ajax({
			url : '<?php echo base_url("navigations/sort"); ?>',
			type : 'post',
			data : {string:$('#nestable-output').val(),nav_id:id,type:type},
			dataType : 'html',
			success : function(json) {
				//$('#serialize_output3').html(json);
				window.location = "<?php echo base_url("navigations"); ?>";
			}
		});
	}

	function delNavigation(id,type){
		$('#nav_'+id).remove();
		saveMenu(id,type);
	}

	/*function disableChar(){
		$('#addvenues input').keypress(function (e) {
		    var regex = new RegExp("^[a-zA-Z0-9 -\"\'()=?/@#$%&*+_]+$");
		    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		    if (regex.test(str)) {
		        return true;
		    }

		    e.preventDefault();
		    return false;
		}).bind("cut copy paste",function(e) {
		   e.preventDefault();
		});
	}*/

	$(document).ready(function(){
		var updateOutput = function(e){
				var list   = e.length ? e : $(e.target),
						output = list.data('output');
				if (window.JSON) {
						output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
				} else {
						output.val('JSON browser support required for this demo.');
				}
		};

		$('#nestable3').nestable({
			group: 1

		}).on('change', updateOutput);

		updateOutput($('#nestable3').data('output', $('#nestable-output')));

		$('#InputSlug').keydown(function(event) {
		  if (event.keyCode == '32') {
			 event.preventDefault();
		   }
		});

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