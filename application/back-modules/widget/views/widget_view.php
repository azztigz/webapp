
<div id="page-wrapper">
<div class="row">
	<div class="clearfix" style="height:20px;"></div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Widget</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#createNew">Create New</button>
				</div>
				<div class="clearfix" style="height:10px;"></div>
				<div class="col-md-12">
					
					<!-- <textarea class="ckeditor" cols="80" name="content" rows="10"></textarea> -->
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<div class="modal fade" id="createNew" tabindex="-1" role="dialog" aria-labelledby="createNewLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="createNewLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <form role="form">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputFile">File input</label>
		    <input type="file" id="exampleInputFile">
		    <p class="help-block">Example block-level help text here.</p>
		  </div>
		  <div class="checkbox">
		    <label>
		      <input type="checkbox"> Check me out
		    </label>
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
		