<?php
/**
 * Class CompareRepository
 */
    class CompareRepository{
        /**
         * compares ips from logs and sees if it is in the
         * locationArray if so it adds it to an array where
         * the IP is the Key and the Log or Logs is the VALUE
         * @param $locationArray
         * @param $logArray
         * @return array
         */
    private static function getCountOfLocationAndLogs($locationArray, $logArray)
    {
        $hashMap = array();
        foreach ($logArray as $log){
            $ip = $log->ip;
            $httpResponse = $log->httpResponse;
            //splits up the $ip to compare against array
            $temp = explode('.',$ip);
            //if there is only one http response and it is equal to 404
            if(strpos($httpResponse, '404') !== false && strlen($httpResponse)<=3){
                continue;
            }
            //if ip of log is in locationArray
            $search1 = array_search($ip,$locationArray);
            if($search1||in_array($ip, $locationArray)){

                $hashMap[$locationArray[$search1]][] = $log;
            }
            //if has 1 wild cards
            $search2 = array_search($temp[0].".".$temp[1].".".$temp[2].".*",$locationArray);
            if($search2){

                $hashMap[$locationArray[$search2]][] = $log;
            }
            //if has 2 wild cards
            $search3 = array_search($temp[0].".".$temp[1].".*.*",$locationArray);
            if($search3){

                $hashMap[$locationArray[$search3]][] = $log;
            }
            //if has 3 wild cards
            $search4 = array_search($temp[0].".*.*.*",$locationArray);
            if($search4){

                $hashMap[$locationArray[$search4]][] = $log;
            }
        }
            return $hashMap;

        }

        /**
         * Takes a Array of location Ip address and an Array
         * of Log objects to compare then returns an array of Related objects
         * @param $locationArray
         * @param $logArray
         * @return array
         */
        public static function getList($locationArray, $logArray){
            $list = [];
            //creates a collection of related logs and ips
            $compareList = self::getCountOfLocationAndLogs($locationArray,$logArray);
            //loops through the collection to get the proper Location information from the database
            foreach ($compareList as $index=>$value){
                //makes a Location object from the database
                $location = LocationRepository::getGeoIpByIP($index);
                //makes a array of Related objects
                $list[] = new Related($location,$value);
            }

            return $list;
        }
    }


?>