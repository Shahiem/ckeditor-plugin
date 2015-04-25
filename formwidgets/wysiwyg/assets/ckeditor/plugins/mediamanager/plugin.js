(function() 
{
	CKEDITOR.plugins.add('mediamanager', 
	{
	    icons: 'mediamanager',
	    init: function( editor ) {
	        var pluginName = 'mediamanager';

			// Register the toolbar button.
			editor.ui.addButton && editor.ui.addButton('MediaManager', 
			{
				command: pluginName,
				toolbar: 'insert,10'
			});

			// Ad command
		   	editor.addCommand(pluginName, { exec: function(editor) { }});

			editor.on( 'afterCommandExec', function(event)
			{
				var commandName = event.data.name;

				if (commandName == 'mediamanager')
				{
					new $.oc.mediaManager.popup({
				        alias: 'ocmediamanager',
				        cropAndInsertButton: true,
				        onInsert: function(items) {
				        	if (!items.length) 
							{
			                    alert('Please select image(s) to insert.')
			                    return;
			                }

				            for (var i=0, len=items.length; i<len; i++) {
				            	if (items[i].documentType !== 'image') {
		                            alert('The file "'+items[i].title+'" is not an image.')
		                            continue
		                        }

				                editor.insertHtml('<img src="' + items[i].publicUrl + '" />', 'unfiltered_html');
				            }

				        	this.hide();
				        }
				    });
				}
			});
   		}
	});
})();