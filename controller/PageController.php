<?php

/**
 * Class PageController
 */
		class PageController{


		/*
		* if bad request displays 
		* error page
		*/
		public function error(){
			require_once('view/pages/error.php');
		}
	}
	
?>