 $(document).render(function () {
	 $('[data-control="wysiwyg"] textarea').ckeditor({
		width:    '' + $('[data-control="wysiwyg"]').data("width") + '',
		height:   '' + $('[data-control="wysiwyg"]').data("height") + '',
		toolbar:  '' + $('[data-control="wysiwyg"]').data("toolbar") + '',
		skin:     '' + $('[data-control="wysiwyg"]').data("theme") + '',
		language: '' + $('[data-control="wysiwyg"]').data("lang") + ''
	}).ckeditor(function() {
		this.addCommand('saveForm', {
			exec: function(editor) {
				jQuery(editor.element.$).closest('FORM').find('[data-hotkey]').filter(function() {
					return $(this).data('hotkey') == 'ctrl+s';
				}).eq(0).trigger('click');
			}
		});
		this.keystrokeHandler.keystrokes[CKEDITOR.CTRL + 83 /* S */] = 'saveForm';
	});
});