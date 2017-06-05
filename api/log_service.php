<?php
    include("../config/Database.php");
    include('../data/CompareRepository.php');
    include('../data/LocationRepository.php');
    include('../data/LogRepository.php');
    include('../model/Log.php');
    include('../model/Location.php');
    include('../model/Related.php');

/**
 *
 * Webservice that sends back data on a specific ip
 * in the success log pane. return full location and all
 * the logs that pertain to that IP. 
 */
    if(isset($_POST['ip'])){
        $ip = trim($_POST['ip']);
        $logs = LogRepository::loadLogs();
        $ipAddresses = LocationRepository::listAllIPs();
        $locationAndLogs = CompareRepository::getList($ipAddresses,$logs);

        foreach ($locationAndLogs as $location){
            if($location->location->ip === $ip){
                echo json_encode($location);
            }
        }

    }
    if(isset($_POST['logs'])){
        $ip = trim($_POST['logs']);
        $logs = LogRepository::loadLogs();
        $ipAddresses = LocationRepository::listAllIPs();
        $locationAndLogs = CompareRepository::getList($ipAddresses,$logs);

        echo json_encode($locationAndLogs);


    }

?>
