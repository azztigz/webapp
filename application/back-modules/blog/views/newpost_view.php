<style type="text/css">
	.alert-danger{
		padding: 5px !important;
	}
</style>
<div id="page-wrapper">
<div class="row">
	<div class="clearfix" style="height:20px;"></div>
	<?php $this->load->view('blog_menu_view'); ?>
	<div class="clearfix" style="height:20px;"></div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-envelope fa-fw"></i> New Post</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					
					
					  <!-- Create -->
					  <div class="tab-pane" id="create">
					  	<div class="clearfix" style="height:30px;"></div>
						<div class="col-md-12">
							<?php //echo form_error('<p class="alert alert-danger">', '</p>'); ?>
							<form role="form" action="<?php echo base_url('blog/newPost'); ?>" method="post" id="UploadForm" enctype="multipart/form-data">
								<div class="form-group">
									<label>Upload Image</label>
				                    <input id="file-3" type="file" name="post_image" class="file">
				                    <!-- <div id="progressbox"><div id="progressbar"></div ><div id="statustxt">0%</div ></div>
									<div id="output"></div> -->
									<!-- <div id="progress">
							            <div class="progress progress-striped">
										  <div id="bar" class="progress-bar progress-bar-success" style="width:0%">
										    <span class="sr-only">40% Complete (success)</span>
										  </div>
										</div>
										<div id="percent"></div >
									</div> -->
				                </div>
								<div class="form-group">
									<label>Title</label>
									<input type="text" name="post_title" class="form-control" id="InputTitle" placeholder="Title">
									<?php echo form_error('post_title', '<p class="alert alert-danger">', '</p>'); ?>
								</div>
								<div class="form-group">
									<label>Introduction</label>
									<textarea name="post_intro" class="form-control" id="InputTags" rows="2" Placeholder="Introduction"></textarea>
									<?php echo form_error('post_intro', '<p class="alert alert-danger">', '</p>'); ?>
								</div>
								<div class="form-group">
									<label>Content</label>
									<textarea class="ckeditor" cols="80" name="post_content" rows="10" placeholder="Content"></textarea>
									<?php echo form_error('post_content', '<p class="alert alert-danger">', '</p>'); ?>
								</div>
								<div class="form-group">
									<textarea name="post_tags" class="form-control" id="InputTags" placeholder="Tags (separate by comma's)" rows="3"></textarea>
								</div>
								<hr/>
								<button type="submit" class="btn btn-success btn-xs">Save</button>
							</form>
						</div>	
					  </div>
					  

				</div>
			</div>
		</div>
	</div>
</div>
</div>
		
<script>
    /*$("#file-1").fileinput({
        initialPreview: ["<img src='Desert.jpg' class='file-preview-image'>", "<img src='Jellyfish.jpg' class='file-preview-image'>"]
	});*/
	$("#file-3").fileinput({
		showCaption: false,
		browseClass: "btn btn-primary btn-xs",
		removeClass: "btn btn-default btn-xs",
		//fileType: "any"
		showUpload:false
	});
    /*$(".btn-warning").on('click', function() {
        $("#file-4").attr('disabled', 'disabled');
        $('#file-4').fileinput('refresh', {browseLabel: 'Kartik'});
    });*/

		var body = CKEDITOR.instances['post_content'].getData();
		$('.ckeditor').val(body);

	

</script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script> 
        $(document).ready(function() { 
		//elements
		var progressbox 	= $('#progressbox');
		var progressbar 	= $('#progressbar');
		var statustxt 		= $('#statustxt');
		var submitbutton 	= $("#SubmitButton");
		var myform 			= $("#UploadForm");
		var output 			= $("#output");
		var completed 		= '0%';
		
				$(myform).ajaxForm({
					beforeSend: function() { //brfore sending form
						submitbutton.attr('disabled', ''); // disable upload button
						statustxt.empty();
						progressbox.show(); //show progressbar
						progressbar.width(completed); //initial value 0% of progressbar
						statustxt.html(completed); //set status text
						statustxt.css('color','#000'); //initial color of status text
					},
					uploadProgress: function(event, position, total, percentComplete) { //on progress
						progressbar.width(percentComplete + '%') //update progressbar percent complete
						statustxt.html(percentComplete + '%'); //update status text
						$("#bar").width(percentComplete+'%');
						if(percentComplete>50)
							{
								statustxt.css('color','#fff'); //change status text to white after 50%
							}
						},
					complete: function(response) { // on complete
						output.html(response.responseText); //update element with received data
						myform.resetForm();  // reset form
						submitbutton.removeAttr('disabled'); //enable submit button
						progressbox.hide(); // hide progressbar
					}
			});
        }); 

    </script>  -->