<?php

/**
 * Class Location
 */
	class Location
    {
        public $ip;
        public $country_code;
        public $country_name;
        public $region_code;
        public $region_name;
        public $city;
        public $zip_code;
        public $time_zone;
        public $latitude;
        public $longitude;
        public $metro_code;

        /**
         * Constructor to create Location object
         * @param $ip
         * @param $country_code
         * @param $country_name
         * @param $region_code
         * @param $region_name
         * @param $city
         * @param $zip_code
         * @param $time_zone
         * @param $latitude
         * @param $longitude
         * @param $metro_code
         */
        public function __construct($ip, $country_code, $country_name, $region_code, $region_name, $city, $zip_code, $time_zone, $latitude, $longitude, $metro_code)
        {
            $this->ip = $ip;
            $this->country_code = $country_code;
            $this->country_name = $country_name;
            $this->region_code = $region_code;
            $this->region_name = $region_name;
            $this->city = $city;
            $this->zip_code = $zip_code;
            $this->time_zone = $time_zone;
            $this->latitude = $latitude;
            $this->longitude = $longitude;
            $this->metro_code = $metro_code;
        }
    }
?>