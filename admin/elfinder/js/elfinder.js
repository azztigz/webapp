$(document).ready(function() {
		elFinder.prototype._options.commands.push('editimage')
	    //elFinder.prototype._options.contextmenu.files.push('editimage')
	    elFinder.prototype.commands.editimage = function() {
	        this.exec = function(hashes) {
	            var file = this.files(hashes);
		        var hash = file[0].hash;
		        var fm = this.fm;
		        var url = fm.url(hash);

	            console.log(fm);
	        }
	        this.getstate = function() {
	            //return 0 to enable, -1 to disable icon access
	            return 0;
	        }
	    }

	    elFinder.prototype._options.commands.push('editname')
	    elFinder.prototype.commands.editname = function() {
	        this.exec = function(hashes) {
	            var file = this.files(hashes);
		        var hash = file[0].hash;
		        var fm = this.fm;
		        var url = fm.url(hash);

	            console.log(file[0]);
	        }
	        this.getstate = function() {
	            //return 0 to enable, -1 to disable icon access
	            return 0;
	        }
	    }

		var elf = $('#elfinder').elfinder({
			url : '<?php echo base_url("filemanager/elfinder_init"); ?>',  // connector URL (REQUIRED)
			lang: 'en',             // language (OPTIONAL)
			height: '600',
			handlers : {
		        upload : function(event, elfinderInstance) {
		            console.log(event.data.added);
		            //console.log(event.data.added.length);
		            //onsole.log(event.data.selected); // selected files hashes list
		        }
		    },
		    uiOptions : {
	        	toolbar : [
			        ['back', 'forward'],
			        ['reload'],
			        ['home', 'up'],
			        ['mkdir', 'mkfile', 'upload'],
			        ['open', 'download', 'getfile'],
			        ['info'],
			        ['quicklook'],
			        ['copy', 'cut', 'paste'],
			        ['rm'],
			        ['duplicate', 'rename', 'edit', 'resize'],
			        ['extract', 'archive'],
			        ['search'],
			        ['view'],
			        /*['help']*/
			    ],    
	        },
			contextmenu : {
			    navbar : ['open', '|', 'copy', 'cut', 'paste', 'duplicate', '|', 'rm', '|', 'info'],

			    cwd    : ['reload', 'back', '|', 'upload', 'mkdir', 'mkfile', 'paste', '|', 'info'],

			    files  : [
			        'open', 'getfile', '|', 'quicklook', '|', 'download', '|', 'copy', 'cut', 'paste', 'duplicate', '|',
			        'rm', '|', 'edit', 'rename', 'resize', '|', 'archive', 'extract', '|', 'info', '|', 'editimage', '|', 'editname'
			    ]
			}
		}).elfinder('instance');
	});