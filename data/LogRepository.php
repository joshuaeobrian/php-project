<?php

/**
 * Class LogRepository
 */
	class LogRepository{

		/**
		* loops through array list and to check if section of a string exists
		*@param $array - takes an array to sift through
		*@param $phrase - takes a partial of a String
		*@return array - if string exists in array it returns the index. if it doesnt it returns false
		*/
		private function find_indexOf($array,$phrase){
			foreach($array as $item){
				//if item in array contains phrase then return index of item
				if(strpos($item,$phrase) !== false ){
					return array_search($item, $array);
				}
			}
			//else returns false
			return false;
		}

		/**
		* opens log file and loops through it line by line parsing the data to
		* make a list of Log objects
		*@return array- returns a list of Log objects
		*/
		public static function loadLogs(){
			//creates new instance of LogRepository to access find_indexOf function
			$repo = new LogRepository();
			//creates array for scope
			$list = [];
            /**
             * this is the path to the log file
             */
			$array = file('C:/wamp64/www/etailinsights/logs/access_log.txt');
			//loops through the lines in the log file
			foreach($array as $line){

	       		//removes comments at the top of the log file
	       		if(strpos($line, '#') === false){
	           // Splits the line into a array. Splitting by "
	       			$item = explode('"', $line);
	       				
	           			//if array size if bigger than two
	       				if(count($item) > 2){
	       					//Parses the IP address from the log
	       					$ip = substr($item[0], 0,strpos($item[0], " "));
	       					//Parses the date from the log
	       					$date = substr($item[0], strpos($item[0], "[")+1,-(strlen($item[0])-strpos($item[0], ":")));
	       					//Parses the time from the log
	       					$time = substr($item[0], strpos($item[0], ":")+1,-(strlen($item[0])-strrpos($item[0], "-")+1));
	       					//Parses the request method with the extention
	       					$request = $item[1];
	       					//Parses the Http Response code
	       					$httpResponse = trim(str_replace('-', '', $item[2]));
	       					//executes function find_indexOf to find where the url is in the array
	       					$url = $item[$repo->find_indexOf($item,'http://')];
	       					//executes function find_indexOf to find where the browse type is in the array if it exists else sets it to N/A
	       					$browser = $repo->find_indexOf($item,'Mozilla');
	       					if($browser !== false){
	       				 		$browser = $item[$browser];
	       					}else{
	       						$browser = 'N/A';
	       					}
	       					//Builds an array of new Log entries and sets it to the value of $list
	       					$list[] = new Log($ip,$date,$time,$request,$httpResponse,$url,$browser);
	       				}
	       		}
	       }

			return $list;
		}

        /** count the responds with the starting number and sends back count
         * @param $logs - array of Log Objects
         * @param $responseCodeStartNum - number
         * @return int
         */
		public static function getRequestCount($logs,$responseCodeStartNum){

			$count = 0;
			foreach ($logs as $log) {
                //if the first number is that same as starting num the add 1
				if(substr($log->httpResponse,0,1) === $responseCodeStartNum){
					$count++;
				}
				//if response length is great than 3 then grab next response number
				if(strlen($log->httpResponse) > 3){
					//Grabs the starting index number of the second response
					if(substr($log->httpResponse,strpos($log->httpResponse, " ")+1,-2) === $responseCodeStartNum){
						$count++;
				}
			}
		}
			return $count;
		}
	
	}

?>