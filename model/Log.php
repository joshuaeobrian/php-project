<?php

/**
 * Class Log
 */
	class Log{
		public $ip;
		public $date;
		public $time;
		public $requestType;
		public $httpResponse;
		public $url;
		public $browser;
		/**
		* constructor to build Log Object
		*@param $ip
		*@param $date
		*@param $time
		*@param $requestType
         *@param $httpResponse
		*@param $url
		*@param $browser
		*/
		public function __construct($ip, $date, $time, $requestType, $httpResponse, $url, $browser){
			$this->ip = $ip;
			$this->date = $date;
			$this->time = $time;
			$this->requestType = $requestType;
			$this->httpResponse = $httpResponse;
			$this->url = $url;
			$this->browser = $browser;
		}

	}

?>