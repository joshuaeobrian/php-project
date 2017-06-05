<?php

/**
 * Class Related
 */
    class Related{

        public $logs = [];
        public $location;

        /**
         * Related constructor.
         * @param $location
         * @param $logs
         */
        public function __construct($location,$logs){
            $this->logs = $logs;
            $this->location = $location;
        }

    }



?>