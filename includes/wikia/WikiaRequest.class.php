<?php

abstract class WikiaRequest {

	private $isDispatched = false;
	protected $params = array();


	public function __construct( Array $params ) {
		$this->params = $params;
	}

	public function getVal( $key, $default = null ) {
		if( isset($this->params[$key]) ) {
			return $this->params[$key];
		}

		return $default;
	}

	public function setVal( $key, $value ) {
		$this->params[$key] = $value;
	}

	public function isDispatched() {
		return $this->isDispatched;
	}

	public function setDispatched($value) {
		$this->isDispatched = (bool) $value;
	}

}