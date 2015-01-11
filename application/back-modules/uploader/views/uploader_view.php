<link rel="stylesheet" href="<?php echo assets_url(); ?>fileupload/css/blueimp-gallery.min.css">
<link rel="stylesheet" href="<?php echo assets_url(); ?>fileupload/css/jquery.fileupload.css">
<link rel="stylesheet" href="<?php echo assets_url(); ?>fileupload/css/jquery.fileupload-ui.css">
<noscript><link rel="stylesheet" href="<?php echo assets_url(); ?>fileupload/css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="<?php echo assets_url(); ?>fileupload/css/jquery.fileupload-ui-noscript.css"></noscript>

<script src="<?php echo assets_url(); ?>fileupload/js/vendor/jquery.ui.widget.js"></script>
<script src="<?php echo assets_url(); ?>fileupload/js/tmpl.min.js"></script>
<script src="<?php echo assets_url(); ?>fileupload/js/load-image.min.js"></script>
<script src="<?php echo assets_url(); ?>fileupload/js/canvas-to-blob.min.js"></script>
<script src="<?php echo assets_url(); ?>fileupload/js/jquery.blueimp-gallery.min.js"></script>
<script src="<?php echo assets_url(); ?>fileupload/js/jquery.iframe-transport.js"></script>
<script src="<?php echo assets_url(); ?>fileupload/js/jquery.fileupload.js"></script>
<script src="<?php echo assets_url(); ?>fileupload/js/jquery.fileupload-process.js"></script>
<script src="<?php echo assets_url(); ?>fileupload/js/jquery.fileupload-image.js"></script>
<script src="<?php echo assets_url(); ?>fileupload/js/jquery.fileupload-audio.js"></script>
<script src="<?php echo assets_url(); ?>fileupload/js/jquery.fileupload-video.js"></script>
<script src="<?php echo assets_url(); ?>fileupload/js/jquery.fileupload-validate.js"></script>
<script src="<?php echo assets_url(); ?>fileupload/js/jquery.fileupload-ui.js"></script>
<script src="<?php echo assets_url(); ?>fileupload/js/main.js"></script>

<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#createNew"><span class="glyphicon glyphicon-picture"></span> Upload Image</button>

<div class="modal fade" id="createNew" tabindex="-1" role="dialog" aria-labelledby="createNewLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="createNewLabel">Upload Image</h4>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <form id="fileupload" action="" method="POST" enctype="multipart/form-data">
                <!-- Redirect browsers with JavaScript disabled to the origin page -->
                <noscript><input type="hidden" name="redirect" value="http://blueimp.github.io/jQuery-File-Upload/"></noscript>
                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                <div class="row fileupload-buttonbar">
                    <div class="col-lg-12">
                        <!-- The fileinput-button span is used to style the file input field as button -->
                        <span class="btn btn-success btn-xs fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Add files...</span>
                            <input type="file" name="files[]" multiple>
                        </span>
                        <button type="submit" class="btn btn-primary btn-xs start">
                            <i class="glyphicon glyphicon-upload"></i>
                            <span>Start upload</span>
                        </button>
                        <button type="reset" class="btn btn-warning btn-xs cancel">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            <span>Cancel upload</span>
                        </button>
                        <button type="button" class="btn btn-danger btn-xs delete">
                            <i class="glyphicon glyphicon-trash"></i>
                            <span>Delete</span>
                        </button>
                        <input type="checkbox" class="toggle">
                        <!-- The global file processing state -->
                        <span class="fileupload-process"></span>
                    </div>
                    <!-- The global progress state -->
                    <div class="col-lg-5 fileupload-progress fade">
                        <!-- The global progress bar -->
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                        </div>
                        <!-- The extended global progress state -->
                        <div class="progress-extended">&nbsp;</div>
                    </div>
                </div>
                <!-- The table listing the files available for upload/download -->
                <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
            </form>
        </div>
            

            <!-- <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                <div class="slides"></div>
                <h3 class="title"></h3>
                <a class="prev">‹</a>
                <a class="next">›</a>
                <a class="close">×</a>
                <a class="play-pause"></a>
                <ol class="indicator"></ol>
            </div> -->
            <!-- The template to display files available for upload -->
            <script id="template-upload" type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
                <tr class="template-upload fade">
                    <td>
                        <span class="preview"></span>
                    </td>
                    <td>
                        <p class="name" style="font-size:10px;">{%=file.name%}</p>
                        <strong class="error text-danger"></strong>
                    </td>
                    <td>
                        <p class="size">Processing...</p>
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                    </td>
                    <td>
                        {% if (!i && !o.options.autoUpload) { %}
                            <button class="btn btn-primary btn-xs start" disabled>
                                <i class="glyphicon glyphicon-upload"></i>
                                
                            </button>
                        {% } %}
                        {% if (!i) { %}
                            <button class="btn btn-warning btn-xs cancel">
                                <i class="glyphicon glyphicon-ban-circle"></i>
                                
                            </button>
                        {% } %}
                    </td>
                </tr>
            {% } %}
            </script>
            <!-- The template to display files available for download -->
            <script id="template-download" type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
                <tr class="template-download fade">
                    <td>
                        <span class="preview">
                            {% if (file.thumbnailUrl) { %}
                                <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                            {% } %}
                        </span>
                    </td>
                    <td>
                        <p class="name">
                            {% if (file.url) { %}
                                <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}  style="font-size:10px;">{%=file.name%}</a>
                            {% } else { %}
                                <span style="font-size:10px;">{%=file.name%}</span>
                            {% } %}
                        </p>
                        {% if (file.error) { %}
                            <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                        {% } %}
                    </td>
                    <td>
                        <span class="size">{%=o.formatFileSize(file.size)%}</span>
                    </td>
                    <td>
                        {% if (file.deleteUrl) { %}
                            <button class="btn btn-danger btn-xs delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                                <i class="glyphicon glyphicon-trash"></i>
                                
                            </button>
                            <input type="checkbox" name="delete" value="1" class="toggle">
                        {% } else { %}
                            <button class="btn btn-warning btn-xs cancel">
                                <i class="glyphicon glyphicon-ban-circle"></i>
                               
                            </button>
                        {% } %}
                    </td>
                </tr>
            {% } %}
            </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
				
		