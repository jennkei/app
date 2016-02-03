/*!
 * VisualEditor user interface WikiaVideoInsertDialog class.
 */

/**
 * Dialog for inserting MediaWiki media objects.
 *
 * @class
 * @extends ve.ui.FragmentDialog
 *
 * @constructor
 * @param {Object} [config] Config options
 */
ve.ui.WikiaVideoInsertDialog = function VeUiMWMediaInsertDialog( config ) {
	// Parent constructor
	ve.ui.WikiaVideoInsertDialog.super.call( this, config );
};

/* Inheritance */

OO.inheritClass( ve.ui.WikiaVideoInsertDialog, ve.ui.WikiaMediaInsertDialog );

/* Static Properties */

ve.ui.WikiaVideoInsertDialog.static.name = 'wikiaVideoInsert';

ve.ui.WikiaVideoInsertDialog.static.title = OO.ui.deferMsg( 'visualeditor-dialog-video-insert-title' );

ve.ui.WikiaVideoInsertDialog.static.trackingLabel = 'dialog-video-insert';

/* Methods */

/**
 * @inheritdoc
 */
ve.ui.WikiaVideoInsertDialog.prototype.initialize = function () {
	console.log('ve.ui.WikiaVideoInsertDialog.prototype.initialize');

	// Parent method
	ve.ui.WikiaVideoInsertDialog.super.prototype.initialize.call( this );

	this.pages.removePages( [ this.mainPage ] );
	$('.ve-ui-wikiaMediaQueryWidget-uploadWrapper').addClass('ve-ui-wikiaMediaQueryWidget-uploadWrapper-video');
};

ve.ui.windowFactory.register( ve.ui.WikiaVideoInsertDialog );
