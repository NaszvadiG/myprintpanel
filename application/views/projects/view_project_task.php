 <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><span class="mdi mdi-close"></span></button>
            <h3 class="modal-title"><?= $project_task_name; ?></h3>
          </div>
          <div class="modal-body">
			<p><?= $project_task_description; ?></p>
			<h4 title="Discussion"><strong>Discussion</strong></h4>
			<hr/>
			<div class="add_project_discussion_console"></div>
			<form id="add_project_discussion">
			<div class="col-sm-2">
				<img src="http://via.placeholder.com/40x40/ff0000/ffffff?text=GD" alt="Placeholder" class="img-circle xs-mr-10">
			</div>
			<div class="col-sm-8">
				<input name="project_discussion_content" class="form-control"/>
			</div>
			<span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Select files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
			</form>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default md-close">Cancel</button>
            <button type="button" id="add_project_task" class="btn btn-primary"><span class="mdi mdi-plus-square"></span> Add task</button>
          </div>

		  
		<script type="text/javascript" src="<?= base_url('public/vendor/jquery-file-upload/js/vendor/jquery.ui.widget.js'); ?>"></script>
		<script type="text/javascript" src="<?= base_url('public/vendor/jquery-file-upload/js/jquery.iframe-transport.js'); ?>"></script>
		<script type="text/javascript" src="<?= base_url('public/vendor/jquery-file-upload/js/jquery.fileupload.js'); ?>"></script>
		<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'server/php/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
	
		// function form_submit {
			// $('form#add_project_discussion').submit(function(event) {
			// event.preventDefault();
			// $.ajax(
		// {
			// type: 'POST',
			// url: '<?= base_url('projects/add_project_discussion'); ?>',
			// data: $('form#add_project_discussion').serialize(),
			// success: function(data, status, xhr)
			// {
				// try {
				// var response = $.parseJSON(JSON.stringify(data));
					// console.log(response);
				  // if(response.status==200)
				  // {
					  // window.location.replace(response['url']);
					  // console.log(response['url']);
				  // }
				  // else
				  // {
					// $('div#add_project_discussion_console').html(data);
				  // }
				// } catch(e) {
				// }
				
			// }
		// });
		// });
		// }
		
		function form_submit() {
			$('form#add_project_discussion').submit(function(event) {
				event.preventDefault();
				alert('test');
			});
		}
		
		$(document).keypress(function(e) {
			
			if(e.which == 13) {
				form_submit();
			}
		});
});
</script>