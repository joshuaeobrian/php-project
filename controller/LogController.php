<?php 
	class LogController{
        /**
         * displays log page
         */
		public function index(){

		    //Gets Array of Log objects
			$logs = LogRepository::loadLogs();

			//Gets An Array of just IPs
			$ipAddresses = LocationRepository::listAllIPs();

			//Gets the Array of Related Objects to load into browser
            $locationAndLogs = CompareRepository::getList($ipAddresses,$logs);

            //Loads the data to the Http Response section
			$countOf200 = LogRepository::getRequestCount($logs,'2');
			$countOf300 = LogRepository::getRequestCount($logs,'3');
			$countOf400 = LogRepository::getRequestCount($logs,'4');
			$countOf500 = LogRepository::getRequestCount($logs,'5');

			//loads log component
			require_once('view/logs/index.php');
		}
	}


?>