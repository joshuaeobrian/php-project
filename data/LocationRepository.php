<?php

/**
 * Class LocationRepository
 */
	class LocationRepository{


		/**
		* selects all visited locations from
		* database
		*@return array - returns an array of Location Objects
		*/
		public static function listAllLocations(){
            $db = DbConnection::getInstance();
			$list = [];
			$req = $db->query('SELECT * FROM geo_ip;');

			foreach ($req->fetchAll() as $location) {
				$list[] = new Location(
					$location['ip'],
					$location['country_code'],
					$location['country_name'],
					$location['region_code'],
					$location['region_name'],
					$location['city'],
					$location['zip_code'],
					$location['time_zone'],
					$location['latitude'],
					$location['longitude'],
					$location['metro_code']);
			}
			return $list;
		}


        /**
         * selects all visited locations from
         * database
         *@return array - returns an array of Location Objects
         */
        public static function listAllIPs(){
            $db = DbConnection::getInstance();
            $list = [];
            $req = $db->query('SELECT ip FROM geo_ip;');

            foreach ($req->fetchAll() as $location) {
                $list[] = $location['ip'];

            }
            return $list;
        }

		/**
		* creates a Location Object from the database where it has that IP address
		*@param $ipAddress 
		*@return object- returns a Location;
		*/
		public static function getGeoIpByIP($ipAddress){
            $db = DbConnection::getInstance();
			$req = $db->prepare('SELECT * FROM geo_ip where ip LIKE :ip;');
			$req->execute(array('ip'=>$ipAddress.'%'));

			$location = $req->fetch();

			return new Location(
					$location['ip'],
					$location['country_code'],
					$location['country_name'],
					$location['region_code'],
					$location['region_name'],
					$location['city'],
					$location['zip_code'],
					$location['time_zone'],
					$location['latitude'],
					$location['longitude'],
					$location['metro_code']); 
		}

	}





?>