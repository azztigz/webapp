<style type="text/css">
	.alert-danger{
		padding: 5px !important;
	}
</style>

<div id="page-wrapper">
<div class="row">
	<div class="clearfix" style="height:20px;"></div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Administrator <span class="pull-right"><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#createNew" onclick="getCreate()"><i class="fa fa-user"></i> Create New</button></span></h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<!-- <div class="col-md-12">
					<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#createNew" onclick="getCreate()"><i class="fa fa-user"></i> Create New</button>
				</div> -->
				<div class="clearfix" style="height:10px;"></div>
				<div class="col-md-12">
					<table class="table table-striped table-responsive table-hover table-condensed">
						<thead>
							<tr class="active">
								<th>#</th>
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Date Added</th>
								<th>Options</th>
							</tr>
						</thead>
  						<?php 
  							$f = $from;
  							if($admins){
	  							foreach($admins as $key=>$ad){ ?>
	  								<?php $name = html_escape($ad->name); ?>
	  								<tr>
	  									<td><?php echo $f.'.'; ?></td>
	  									<td><?php echo $ad->admin_idPK; ?></td>
	  									<td><?php echo ucfirst(strtolower($name)); ?></td>
	  									<td><?php echo html_escape($ad->admin_email); ?></td>
	  									<td><?php echo $ad->admin_date_added; ?></td>
	  									<td>
	  										<button type="button" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#editAdmin" onclick="editAdmin('<?php echo $ad->admin_idPK;?>','<?php echo ucfirst(strtolower($name)); ?>')"><span class="glyphicon glyphicon-edit"></span></button>
	  										<button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#removeAdmin" onclick="getAdmin('<?php echo $ad->admin_idPK;?>','<?php echo ucfirst(strtolower($name)); ?>')"><span class="fa fa-times"></span></button>
	  									</td>
	  								</tr>
  							
  						<?php 
  								$f++;
  								} 
  							}
  						?>
					</table>
					<hr/>
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


<div class="modal fade" id="createNew" tabindex="-1" role="dialog" aria-labelledby="createNewLabel" aria-hidden="true">
	<form role="form" action="post" id="form-create-admin">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="createNewLabel">Create New</h4>
	      </div>
	      <div class="modal-body">
	      	<div class="form-group">
	      		<label>Email</label>
				<input type="email" name="email" class="form-control" id="InputEmail1" placeholder="Email">
				<div id="email" style="display:none;"></div>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password">
				<div id="password" style="display:none;"></div>
			</div>
			<div class="form-group">
				<label>Firstname</label>
				<input type="text" name="fname" class="form-control" id="InputFname" placeholder="Firstname">
				<div id="fname" style="display:none;"></div>
			</div>
			<div class="form-group">
				<label>Lastname</label>
				<input type="text" name="lname" class="form-control" id="InputLname" placeholder="Lastname">
				<div id="lname" style="display:none;"></div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
	        <button type="button" onclick="saveAdmin()" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Create</button>
	      </div>
	    </div>
	  </div>
  	</form>
</div>

<div class="modal fade" id="editAdmin" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
	<form role="form" action="post" id="form-edit-admin">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="editLabel"></h4>
	      </div>
	      <div class="modal-body editadmin">
	      	
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
	        <button type="button" onclick="updateAdmin()" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Update</button>
	      </div>
	    </div>
	  </div>
  	</form>
</div>

<div class="modal fade" id="removeAdmin" tabindex="-1" role="dialog" aria-labelledby="removeLabel" aria-hidden="true">
	<form role="form" action="post" id="form-remove-admin">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="removeTitle"></h4>
	      </div>
	      <div class="modal-body removeadmin">
	      	<input type="hidden" value="" id="deladmin_id">
	      	Are you sure?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
	        <button type="button" onclick="removeAdmin()" class="btn btn-danger btn-xs"><i class="fa fa-times-circle"></i> Remove</button>
	      </div>
	    </div>
	  </div>
  	</form>
</div>
		

<script type ="text/javascript">
	function saveAdmin(){
	    $.ajax({
	      url : '<?php echo base_url("administrator/saveAdmin"); ?>',
	      type : 'post',
	      data : $("#form-create-admin").serialize(),
	      dataType : 'json',
	      success : function(json) {
	        if(json.stats == 1){
	          if(json.email != ""){
	            $("#email").html(json.email).fadeIn();
	          }else{
	            $("#email").empty().fadeOut();
	          }
	          if(json.password != ""){
	            $("#password").html(json.password).fadeIn();
	          }else{
	            $("#password").empty().fadeOut();
	          }
	          if(json.fname != ""){
	            $("#fname").html(json.fname).fadeIn();
	          }else{
	            $("#fname").empty().fadeOut();
	          }
	          if(json.lname != ""){
	            $("#lname").html(json.lname).fadeIn();
	          }else{
	            $("#lname").empty().fadeOut();
	          }
	        }else{
	          window.location = "<?php echo base_url("administrator"); ?>";
	        }
	      }
	    });    
	}

	function editAdmin(id,name){
		$('.editadmin').empty();
		$('#editLabel').text(name);
	    $.ajax({
	      url : '<?php echo base_url("administrator/editAdmin"); ?>',
	      type : 'post',
	      data : 'id='+id,
	      dataType : 'html',
	      success : function(json) {
	        $('.editadmin').append(json);
	      }
	    });    
	}  

	function updateAdmin(){
	    $.ajax({
	      url : '<?php echo base_url("administrator/updateAdmin"); ?>',
	      type : 'post',
	      data : $("#form-edit-admin").serialize(),
	      dataType : 'json',
	      success : function(json) {
	        if(json.stats == 1){
	          if(json.email != ""){
	            $("#eemail").html(json.email).fadeIn();
	          }else{
	            $("#eemail").empty().fadeOut();
	          }
	          if(json.password != ""){
	            $("#epassword").html(json.password).fadeIn();
	          }else{
	            $("#epassword").empty().fadeOut();
	          }
	          if(json.fname != ""){
	            $("#efname").html(json.fname).fadeIn();
	          }else{
	            $("#efname").empty().fadeOut();
	          }
	          if(json.lname != ""){
	            $("#elname").html(json.lname).fadeIn();
	          }else{
	            $("#elname").empty().fadeOut();
	          }
	        }else{
	          window.location = "<?php echo base_url("administrator"); ?>";
	        }
	      }
	    });    
	}

	function getAdmin(id,name){
		$('#deladmin_id').val(id);
		$('#removeTitle').text(name);
	}

	function removeAdmin(){
		$('#removeLabel').text(name);
	    $.ajax({
	      url : '<?php echo base_url("administrator/removeAdmin"); ?>',
	      type : 'post',
	      data : 'id='+$('#deladmin_id').val(),
	      dataType : 'html',
	      success : function(json) {
	        window.location = "<?php echo base_url("administrator"); ?>";
	      }
	    });    
	}  

</script>