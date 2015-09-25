describe('ImportScriptHelper', function(){
	'use strict';

	var importScriptHelper = modules['wikia.importScriptHelper']();

	it('check if given resource is js page', function(){
		// only js pages are acceptable
		expect(importScriptHelper.isJsPage('external:gta:MyScript.css')).toBe(false);
		// name should contains page name and "js" extension
		expect(importScriptHelper.isJsPage('js')).toBe(false);
		// js extension should be lower case
		expect(importScriptHelper.isJsPage('MyScript.Js')).toBe(false);
		// dot is missing between page name and extension
		expect(importScriptHelper.isJsPage('MyScriptjs')).toBe(false);

		expect(importScriptHelper.isJsPage('MyScript.js')).toBe(true);
		expect(importScriptHelper.isJsPage('external:gta:MyScript.js')).toBe(true);

	});

	it('check if given resource is external', function(){
		// "u" prefix is not supported
		expect(importScriptHelper.isExternal('u:muppet:MyScript.js')).toBe(false);
		// "e" prefix is not supported
		expect(importScriptHelper.isExternal('e:muppet:MyScript.js')).toBe(false);
		// wrong domain
		expect(importScriptHelper.isExternal('url:hack.wikia.co:MyScript.js')).toBe(false);
		// url should ends with wikia.com
		expect(importScriptHelper.isExternal('url:muppet.wikia.com/:MyScript.js')).toBe(false);
		// just prefix, url or subdomain ane page name is expected
		expect(importScriptHelper.isExternal('url:muppet:MediaWiki:MyScript.js')).toBe(false);
		// page name is expected
		expect(importScriptHelper.isExternal('external:muppet')).toBe(false);
		// prefix and domain or db name are expected
		expect(importScriptHelper.isExternal('MyScript.js')).toBe(false);

		expect(importScriptHelper.isExternal('url:muppet:MyScript.js')).toBe(true);
		expect(importScriptHelper.isExternal('url:muppet.wikia.com:MyScript.js')).toBe(true);
		expect(importScriptHelper.isExternal('external:muppetdb:MyScript.js')).toBe(true);
	});

});