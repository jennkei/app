<?php

class JSSnippetsTest extends PHPUnit_Framework_TestCase {
	public function testAppBuild() {
		F::unsetInstance('JSSnippets');
		$instance = F::build('JSSnippets');
		$this->assertInstanceOf('JSSnippets', $instance);
	}

	public function testAddToStack() {
		F::unsetInstance('JSSnippets');
		$instance = F::build('JSSnippets');

		$snippet = $instance->addToStack(
			array(
				'/extensions/wikia/Feature/js/Feature.js',
				'/extensions/wikia/Feature/css/Feature.css',
			)
		);

		$this->assertEquals(
			'<script>JSSnippetsStack.push({dependencies:["/extensions/wikia/Feature/js/Feature.js","/extensions/wikia/Feature/css/Feature.css"]})</script>',
			$snippet);

		$snippet = $instance->addToStack(
			array('/extensions/wikia/Feature/js/Feature.js'),
			array('$.loadJQueryUI'),
			'Feature.init',
			array(
				'foo' => 'bar',
			)
		);

		$this->assertEquals(
			'<script>JSSnippetsStack.push({dependencies:["/extensions/wikia/Feature/js/Feature.js"],getLoaders:function(){return [$.loadJQueryUI]},callback:function(json){Feature.init(json)},id:"Feature.init",options:{"foo":"bar"}})</script>',
			$snippet);
	}
}