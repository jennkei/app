define('pageShare', ['wikia.window', 'wikia.tracker', 'jquery'], function (win, tracker, $) {
	'use strict';

	/**
	 * @desc Share click handler
	 *
	 * @param {Event} event
	 */
	function shareLinkClick(event) {
		event.stopPropagation();
		event.preventDefault();

		var service = $(event.target).closest('a'),
			url = service.prop('href'),
			title = service.prop('title'),
			h = (win.innerHeight / 2 | 0), // round down
			w = (win.innerWidth / 2 | 0),  // round down
			trackFunc = tracker.buildTrackingFunction({
				action: win.Wikia.Tracker.ACTIONS.CLICK,
				category: 'social-share',
				trackingMethod: 'analytics'
			});

		trackFunc({label: service.data('share-service')});

		win.open(url, title, 'width=' + w + ',height=' + h);
	}

	function appendShareIcons(data) {
		var $container = $('#PageShareContainer'),
			url = encodeURIComponent(win.location.origin + win.location.pathname),
			title = encodeURIComponent(win.document.title),
			result;
		if (data.socialIcons) {
			result = data.socialIcons.replace(/\$url/g, url).replace(/\$title/g, title);
			$container.html(result)
				.on('click', '.page-share a', shareLinkClick);
		}
	}

	function loadShareIcons() {
		var mCacheQueryStringParam = $.getUrlVar('mcache'),
			requestData,
			shareLang = getShareLang($.getUrlVar('uselang'));

		requestData = {
			shareLang: shareLang,
			isTouchScreen: win.Wikia.isTouchScreen() ? 1 : 0
		};

		if (mCacheQueryStringParam) {
			requestData.mcache = mCacheQueryStringParam;
		}

		$.nirvana.sendRequest({
			type: 'GET',
			controller: 'PageShare',
			method: 'getShareIcons',
			data: requestData,
			callback: appendShareIcons
		});
	}

	function getShareLang(useLangQueryStringParam) {
		var browserLang;

		if (useLangQueryStringParam) {
			return useLangQueryStringParam;
		} else if (win.wgUserName) {
			return win.wgUserLanguage;
		} else {
			// Chrome and Firefox : Internet Explorer
			browserLang = win.navigator.languages ? win.navigator.languages[0] : win.navigator.browserLanguage;

			if (browserLang) {
				return browserLang.substr(0, 2);
			} else {
				return null;
			}
		}
	}

	// bind events to links
	$(function () {
		loadShareIcons();
	});

	return {
		getShareLang: getShareLang
	};
});
