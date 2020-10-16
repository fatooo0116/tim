/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */



CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';	
	CKEDITOR.config.extraPlugins += (CKEDITOR.config.extraPlugins ? ',lineheight' : 'lineheight');
	CKEDITOR.config.fontSize_sizes ='8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;26/26px;28/28px;32/32px;36/36px;48/48px;72/72px'
	CKEDITOR.config.font_names = 'noto_sansregular;noto_sansbold;noto_sansitalic;noto_sansbold_italic;Arial;Times New Roman;Verdana';
	config.font_defaultLabel = 'noto_sansregular';
};
