/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	CKEDITOR.config.toolbar_Basic = [
		['Bold','Italic','Underline','Strike','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','-','Outdent','Indent','-','Print'],
   		['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
   		['Styles','Format','Font','FontSize'],
   		['Image','Table','-','Link','Flash','Youtube','Smiley','TextColor','BGColor']
	];
	CKEDITOR.config.extraPlugins = 'youtube';
};
