<?php
/**
 * Internationalisation file for VideoPageTool extension.
 *
 * @addtogroup Languages
 */

$messages = [];

$messages['en'] = [
	'videopagetool-desc' => 'Wikia\'s Video Tool',
	'videopagetool-page-title' => 'Wikia Video Tool',
	'right-videopagetool' => 'Access Wikia\'s Video Tool',
	'videopagetool-error-permission' => 'You cannot access this tool.',
	'videopagetool-error-invalid-language' => 'Invalid language',
	'videopagetool-error-invalid-date' => 'Invalid date',
	'videopagetool-error-missing-parameter' => 'Required parameter is missing',
	'videopagetool-error-invalid-module' => 'Invalid module',
	'videopagetool-error-invalid-description' => 'The description is too long (200 characters limit)',
	'videopagetool-error-invalid-category' => 'Invalid category',
	'videopagetool-error-unknown-category' => 'Unknown category',
	'videopagetool-error-empty-category' => 'The category is empty',
	'videopagetool-error-image-not-exist' => 'Image does not exist',
	'videopagetool-error-image-invalid-size' => 'Invalid image size',
	'videopagetool-error-unknown-program' => 'Unknown program',
	'videopagetool-error-program-not-ready' => 'Please save all sections first',
	'videopagetool-section-featured' => 'Featured',
	'videopagetool-section-category' => 'Latest Video',
	'videopagetool-section-fan' => 'Wikia Fan Media',
	'videopagetool-publish-button' => 'Publish',
	'videopagetool-button-add-video' => 'Add a video',
	'videopagetool-button-add-thumbnail' => 'Add Image',
	'videopagetool-video-title-default-text' => 'Video name',
	'videopagetool-image-title-default-text' => 'Image name',
	'videopagetool-label-display-title' => 'Display Title',
	'videopagetool-label-video-description' => 'Description',
	'videopagetool-placeholder-video-description' => 'About this video',
	'videopagetool-html-text-tip' => "'''Tip:''' to add a link copy the following and replace the italicized text with your own: <a href=\"''your_url_here''\">''Your Text Here''</a>",
	'videopagetool-button-save' => 'Save',
	'videopagetool-button-search' => 'Search',
	'videopagetool-button-clear' => 'Clear all',
	'videopagetool-confirm-clear-title' => 'Clear form',
	'videopagetool-confirm-clear-message' => 'Are you sure you want to clear the entire contents of the form?',
	'videopagetool-description-maxlength-error' => 'Oops! Your text can be no longer than $1 characters. Please remove $2 characters.',
	'videopagetool-language-title' => 'Language',
	'videopagetool-language-select-default-value' => 'Choose your language',
	'videopagetool-date-title' => 'Date',
	'videopagetool-tooltip-calendar-placeholder' => 'Choose a language to show calendar',
	'videopagetool-tooltip-current-date' => 'Current Date',
	'videopagetool-tooltip-published' => 'Published',
	'videopagetool-tooltip-in-progress' => 'In Progress',
	'videopagetool-header-dashboard' => 'Dashboard',
	'videopagetool-success-save' => 'Your changes have been saved',
	'videopagetool-success-publish' => 'Your changes have been published',
	'videopagetool-hint-description-maxlength' => '$1 characters max',
	'videopagetool-see-more-label' => 'See more videos',

	// Latest Video (category) form
	'videopagetool-category-label-name' => 'Category',
	'videopagetool-category-label-display-title' => 'Title',
	'videopagetool-category-name-placeholder' => 'Type in words to bring in videos',
	'videopagetool-category-display-title-placeholder' => 'Category title',
	'videopagetool-category-preview' => 'Preview',
	'videopagetool-category-instructions' => 'Note: A minimum of three modules must be programmed in order to save or publish this page.',

	'videopagetool-hint-required-dimensions' => 'Image dimensions must be 1024 x 461',
	'videopagetool-formerror-videokey' => 'Please add a video',
	'videopagetool-formerror-altthumb' => 'Please add an image',
	'videopagetool-formerror-category-name' => 'At least 3 categories must be chosen',
	'videopagetool-date-header' => 'Editing for date: $1',

	// Home Page Section: Header
	'videohomepage-header-dropdown-name' => 'Discover',
	'videohomepage-header-search-placeholder' => 'Search for Wikia videos',
	'videohomepage-header-browse' => 'Browse',
	'videopagetool-header-last-saved' => "'''Last saved:''' $1",
	'videopagetool-header-publish-date' => "'''Publish date:''' $1",
	'videopagetool-header-not-published' => "'''Not published'''",
	'videopagetool-header-saved-by' => "'''Saved by:''' $1",
	'videopagetool-header-published-by' => "'''Published by:''' $1",

	// Home Page Section: Partners
	'videohomepage-partner-section-title' => 'Our Partners',
	'videohomepage-partner-name-anyclip' => 'Anyclip',
	'videohomepage-partner-name-ign' => 'IGN',
	'videohomepage-partner-name-iva' => 'IVA',
	'videohomepage-partner-name-ooyala' => 'Ooyala',
	'videohomepage-partner-name-screenplay' => 'Screenplay',
];

$messages['qqq'] = [
	'videopagetool-desc' => '{{desc}}',
	'videopagetool-page-title' => 'This is the page header/title (h1 tag) that is displayed at the top of the page.',
	'videopagetool-error-permission' => 'This text appears if user does not have permission to access the tool.',
	'videopagetool-error-invalid-language' => 'This text appears if the language is invalid.',
	'videopagetool-error-invalid-date' => 'This text appears if the date is invalid.',
	'videopagetool-error-missing-parameter' => 'This text appears if the required parameter is missing',
	'videopagetool-error-invalid-module' => 'Error text when code requests a Video Page module that does not exist',
	'videopagetool-error-invalid-description' => 'This text appears if the description is too long.',
	'videopagetool-error-invalid-category' => 'This text appears if the category is invalid',
	'videopagetool-error-unknown-category' => 'This text appears if the category is unknown',
	'videopagetool-error-empty-category' => 'This text appears if the category is empty',
	'videopagetool-error-image-not-exist' => 'This text appears if the image does not exist',
	'videopagetool-error-unknown-program' => 'This text appears if the program is unknown',
	'videopagetool-error-program-not-ready' => 'This text appears if the program is not ready to be published',
	'videopagetool-error-image-invalid-size' => 'This text appears if the image size is invalid',
	'videopagetool-section-featured' => 'Link title for the left menu item',
	'videopagetool-section-category' => 'Link title for the left menu item',
	'videopagetool-section-fan' => 'Link title for the left menu item',
	'videopagetool-publish-button' => 'Button text - click the button to publish the page based on what\'s been inputted into the form.',
	'videopagetool-button-add-video' => 'Button text - click the button to open the add video modal',
	'videopagetool-button-add-thumbnail' => 'Button text - click the button to open the upload image modal',
	'videopagetool-video-title-default-text' => 'Placeholder text to be replace with the title of the video the user has chosen.',
	'videopagetool-image-title-default-text' => 'Placeholder text to be replace with the title of the thumbnail the user has chosen.',
	'videopagetool-label-display-title' => 'Label text for an input to enter the title to display next to the video',
	'videopagetool-label-video-description' => 'Label text for the video description textarea',
	'videopagetool-placeholder-video-description' => 'Placeholder text inside a textarea for entering a description of a video',
	'videopagetool-html-text-tip' => "Tip advising how to add html anchor tags to their content.",
	'videopagetool-button-save' => 'button text for saving a form',
	'videopagetool-button-search' => 'button text for searching for category',
	'videopagetool-button-clear' => 'button text for clearing the entire contents of a form',
	'videopagetool-confirm-clear-title' => 'Title text that appears in a confirmation modal after the reset form button is clicked.',
	'videopagetool-confirm-clear-message' => 'message text that appears in a confirmation modal after the reset form button is clicked.',
	'videopagetool-description-minlength-error' => 'error message for a form entry that is not long enough',
	'videopagetool-language-title' => 'Title for language selection dropdown',
	'videopagetool-language-select-default-value' => 'Default value for language select dropdown',
	'videopagetool-date-title' => 'Title for date picker calendar',
	'videopagetool-tooltip-calendar-placeholder' => 'Choose a language to show calendar',
	'videopagetool-tooltip-current-date' => 'Current Date',
	'videopagetool-tooltip-published' => 'Published',
	'videopagetool-tooltip-in-progress' => 'In Progress',
	'videopagetool-header-dashboard' => 'Title for dashboard page',
	'videopagetool-success-save' => 'This text appears if your changes have been saved successfully',
	'videopagetool-see-more-label' => 'Link text to a page of all videos in the category being displayed',

	// Latest Video (category) form
	'videopagetool-category-label-name' => 'label for the form input to enter a category',
	'videopagetool-category-label-display-title' => 'label for the form input to enter a display title for a given video',
	'videopagetool-category-name-placeholder' => 'form input placeholder text to enter a category',
	'videopagetool-category-preview' => 'link to view a preview of the different videos in a category',
	'videopagetool-category-display-title-placeholder' => 'form input placeholder text to enter the title that will be displayed for a given video',

	'videopagetool-success-publish' => 'This text appears if your changes have been published successfully',
	'videopagetool-hint-required-dimensions' => 'Message describing exact dimensions required for custom image upload (1024 x 461)',
	'videopagetool-formerror-videokey' => 'Error message for required video to be added',
	'videopagetool-formerror-altthumb' => 'Error message for required custom image to be added',
	'videopagetool-date-header' => 'Shows the date that you\'re programming for at the top of the form.',

	// Home Page Section: Header
	'videohomepage-header-dropdown-name' => 'Name of the dropdown that allows users to explore Wikia Video\'s sections',
	'videohomepage-header-search-placeholder' => 'Placeholder text for Wikia Video search box',
	'videopagetool-header-last-saved' => 'This text is the date and time the page was last saved',
	'videopagetool-header-publish-date' => 'This text is the date the page was published',
	'videopagetool-header-not-published' => 'This text is displayed if the page has not yet been published',
	'videopagetool-header-saved-by' => 'Name of last person to save this page',
	'videopagetool-header-published-by' => 'Name of person to publish this page',

	// Home Page Section: Partners
	'videohomepage-partner-section-title' => 'Title for section that links to videos from our content partners',
	'videohomepage-partner-name-anyclip' => 'This text is the name of a partner: anyclip',
	'videohomepage-partner-name-ign' => 'This text is the name of a partner: IGN',
	'videohomepage-partner-name-iva' => 'This text is the name of a partner: IVA',
	'videohomepage-partner-name-ooyala' => 'This text is the name of a partner: Ooyala',
	'videohomepage-partner-name-screenplay' => 'This text is the name of a partner: Screenplay',
];
