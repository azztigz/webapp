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
			<h3 class="panel-title"><i class="fa fa-users"></i> Customers <span class="pull-right"><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#createNew"><i class="fa fa-user"></i> Create New</button></span></h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<!-- <div class="col-md-12">
					<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#createNew"><i class="fa fa-user"></i> Create New</button>
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
  							if($customers){
	  							foreach($customers as $key=>$ad){ ?>
	  								<?php $name = html_escape($ad->name); ?>
	  								<tr>
	  									<td><?php echo $f.'.'; ?></td>
	  									<td><?php echo $ad->user_id; ?></td>
	  									<td><?php echo ucfirst(strtolower($name)); ?></td>
	  									<td><?php echo html_escape($ad->user_email); ?></td>
	  									<td><?php echo $ad->user_date_added; ?></td>
	  									<td>
	  										<button type="button" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#editCustomer" onclick="editCustomer('<?php echo $ad->user_id;?>','<?php echo ucfirst(strtolower($name)); ?>')"><span class="glyphicon glyphicon-edit"></span></button>
	  										<button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#removeCustomer" onclick="getCustomer('<?php echo $ad->user_id;?>','<?php echo ucfirst(strtolower($name)); ?>')"><span class="fa fa-times"></span></button>
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
	<form role="form" action="post" id="form-create-customer">
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
			<div class="form-group">
				<label>Birthday</label>
                <div class='input-group date' id='datetimepicker1' data-date-format="YYYY-MM-DD">
                    <input type='text' class="form-control" name="bdate" placeholder="Birthdate"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
				<div id="bdate" style="display:none;"></div>
			</div>
			<div class="form-group">
				<label>Phone Number</label>
				<input type="text" name="phone" class="form-control" id="InputPhone" placeholder="Phone Number" value="">
				<div id="phone" style="display:none;"></div>
			</div>
			<div class="form-group">
				<label>Address</label>
				<textarea name="address" class="form-control" id="InputTextarea" placeholder="Address" rows="3" Placeholder="Address"></textarea>
				<div id="address" style="display:none;"></div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
	        <button type="button" onclick="saveCustomer()" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Create</button>
	      </div>
	    </div>
	  </div>
  	</form>
</div>

<div class="modal fade" id="editCustomer" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
	<form role="form" action="post" id="form-edit-customer">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="editLabel"></h4>
	      </div>
	      <div class="modal-body editcustomer">
	      	
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
	        <button type="button" onclick="updateCustomer()" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Update</button>
	      </div>
	    </div>
	  </div>
  	</form>
</div>

<div class="modal fade" id="removeCustomer" tabindex="-1" role="dialog" aria-labelledby="removeLabel" aria-hidden="true">
	<form role="form" action="post" id="form-remove-customer">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="removeTitle"></h4>
	      </div>
	      <div class="modal-body removecustomer">
	      	<input type="hidden" value="" id="deluser_id">
	      	Are you sure?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
	        <button type="button" onclick="removeCustomer()" class="btn btn-danger btn-xs"><i class="fa fa-times-circle"></i> Remove</button>
	      </div>
	    </div>
	  </div>
  	</form>
</div>
		

<script type ="text/javascript">

    $(function () {
        $('#datetimepicker1').datetimepicker({
            pickTime: false
        });
    });
        

	function saveCustomer(){
	    $.ajax({
	      url : '<?php echo base_url("customers/saveCustomer"); ?>',
	      type : 'post',
	      data : $("#form-create-customer").serialize(),
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
	          window.location = "<?php echo base_url("customers"); ?>";
	        }
	      }
	    });    
	}

	function editCustomer(id,name){
		$('.editcustomer').empty();
		$('#editLabel').text(name);
	    $.ajax({
	      url : '<?php echo base_url("customers/editCustomer"); ?>',
	      type : 'post',
	      data : 'id='+id,
	      dataType : 'html',
	      success : function(json) {
	        $('.editcustomer').append(json);
	      }
	    });    
	}  

	function updateCustomer(){
	    $.ajax({
	      url : '<?php echo base_url("customers/updateCustomer"); ?>',
	      type : 'post',
	      data : $("#form-edit-customer").serialize(),
	      dataType : 'json',
	      success : function(json) {
	        if(json.stats == 1){
	          /*if(json.email != ""){
	            $("#eemail").html(json.email).fadeIn();
	          }else{
	            $("#eemail").empty().fadeOut();
	          }*/
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
	          window.location = "<?php echo base_url("customers"); ?>";
	        }
	      }
	    });    
	}

	function getCustomer(id,name){
		$('#deluser_id').val(id);
		$('#removeTitle').text(name);
	}

	function removeCustomer(){
		$('#removeLabel').text(name);
	    $.ajax({
	      url : '<?php echo base_url("customers/removeCustomer"); ?>',
	      type : 'post',
	      data : 'id='+$('#deluser_id').val(),
	      dataType : 'html',
	      success : function(json) {
	        window.location = "<?php echo base_url("customers"); ?>";
	      }
	    });    
	}  

</script>